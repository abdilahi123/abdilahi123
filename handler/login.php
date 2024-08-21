<?php
// Include database configuration
include 'dbconfig.php';

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        // Initialize user variable
        $user = null;

        // Check in the specialist table
        $stmt = $conn->prepare('SELECT * FROM specialist WHERE Email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If no user found, check in the company table
        if (!$user) {
            $stmt = $conn->prepare('SELECT * FROM company WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // If a user is found, verify the password
        if ($user) {
            if (password_verify($password, $user['Password'])) {
                // Determine the role and set session variables accordingly
                if (isset($user['CompanyID'])) {
                    // User is a company
                    $_SESSION['id'] = $user['CompanyID'];
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = 'Company';
                    header('Location: ../pages/company/index.php');
                } elseif (isset($user['SpecialistID'])) {
                    // User is a specialist
                    $_SESSION['id'] = $user['SpecialistID'];
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = 'IT';
                    header('Location: ../pages/it/index.php');
                } else {
                    echo 'Login Failed: Undefined Role';
                }
            } else {
                echo 'Login Failed: Wrong Password';
            }
        } else {
            echo 'Login Failed: User not found';
        }
    } catch (PDOException $e) {
        echo 'Database Error: ' . htmlspecialchars($e->getMessage());
    }
}
