<?php
// Include database connection
include 'dbconfig.php'; // Adjust the path if needed

// Initialize variables
$opportunityID = $_POST['opportunityID'];
$specialistID = $_POST['SpecialistID'];
$letterPath = '';
$status = 'Pending';

// Define the target directory
$targetDir = "../uploads/"; // Adjust the path as needed

// Create the directory if it does not exist
if (!file_exists($targetDir)) {
    if (!mkdir($targetDir, 0777, true)) {
        die('Failed to create directories.');
    }
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
        // Get the file extension
        $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

        // Validate file type (PDF only)
        if ($fileType != 'pdf') {
            die('Sorry, only PDF files are allowed.');
        }

        // Generate a unique file name
        $uniqueFileName = uniqid('file_', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            $letterPath = $uniqueFileName;

            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO applicants (opportunityID, SpecialistID, LetterPath, Status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$opportunityID, $specialistID, $letterPath, $status]);

            echo '<script> alert("Application applied successfully"); </script>';
            header('Location: ../pages/it/index.php');
            exit;
        } else {
            die('Sorry, there was an error uploading your file.');
        }
    } else {
        die('No file uploaded or upload error.');
    }
} else {
    die('Invalid request method.');
}