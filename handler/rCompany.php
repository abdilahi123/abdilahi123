<?php
// Start the session if needed
session_start();

// Include database configuration file
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Collect form data
        $companyName = $_POST['companyname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Check if email exists in either specialist or company table
        $stmt = $conn->prepare("
            SELECT Email FROM specialist WHERE Email = :email
            UNION
            SELECT email FROM company WHERE email = :email
        ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Email already exists in either table
            echo "Registration failed: Email already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Prepare and execute the SQL statement to insert new company
            $stmt = $conn->prepare("
                INSERT INTO company (Company_Name, email, Password, Phone, Address)
                VALUES (:companyName, :email, :password, :phone, :address)
            ");

            // Bind parameters
            $stmt->bindParam(':companyName', $companyName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->rowCount() > 0) {
                echo "Company registered successfully.";
                // Redirect to a success page if needed
                // header("Location: success_page.php");
                // exit();
            } else {
                echo "Failed to register company.";
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
