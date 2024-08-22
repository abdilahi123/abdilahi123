<?php
// Include database connection
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['applicantID']) && isset($_POST['acceptReason'])) {
    $applicantID = $_POST['applicantID'];
    $acceptReason = $_POST['acceptReason'];

    // Prepare the SQL query to update the status and save the reason
    $stmt = $conn->prepare("UPDATE applicants SET Status = 'Accepted', message = ? WHERE ApplicantID = ?");
    if ($stmt->execute([$acceptReason, $applicantID])) {
        echo '<script>alert("Application accepted successfully."); window.location.href="../pages/company/index.php";</script>';
    } else {
        echo '<script>alert("There was an error accepting the application."); window.history.back();</script>';
        
    }
} else {
    echo '<script>alert("Invalid request."); window.history.back();</script>';
}

