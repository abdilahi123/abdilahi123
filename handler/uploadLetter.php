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
        // Define the file path
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Validate file type (PDF only)
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        if ($fileType != 'pdf') {
            die('Sorry, only PDF files are allowed.');
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            $letterPath = $fileName;

            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO applicants (opportunityID, SpecialistID, LetterPath, Status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$opportunityID, $specialistID, $letterPath, $status]);

            // Redirect or respond with success message
            header('Location: your_redirect_page.php?msg=success'); // Adjust redirect page and message as needed
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
?>
