<?php
// Start the session if needed
session_start();

// Include database configuration file
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Collect form data
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $githubUsername = $_POST['github'];
        $speciality = $_POST['speciality'];
        $experience = $_POST['expirience'];
        $password = $_POST['password'];

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
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute the SQL statement to insert new specialist
            $stmt = $conn->prepare("
                INSERT INTO specialist (FullName, Email, Password, phone_Number, GitHub_Username, Speciality, Expirience)
                VALUES (:fullName, :email, :hashedPassword, :phoneNumber, :githubUsername, :speciality, :experience)
            ");

            // Bind parameters
            $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
            $stmt->bindParam(':githubUsername', $githubUsername, PDO::PARAM_STR);
            $stmt->bindParam(':speciality', $speciality, PDO::PARAM_STR);
            $stmt->bindParam(':experience', $experience, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->rowCount() > 0) {
                echo "Specialist registered successfully.";
                // Redirect to a success page if needed
                // header("Location: success_page.php");
                // exit();
            } else {
                echo "Failed to register specialist.";
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
