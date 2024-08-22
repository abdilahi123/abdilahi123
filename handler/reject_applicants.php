<?php
// Include database connection
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['applicantID']) && isset($_POST['rejectReason'])) {
    $applicantID = $_POST['applicantID'];
    $rejectReason = $_POST['rejectReason'];

    // Prepare the SQL query to update the status and save the reason
    $stmt = $conn->prepare("UPDATE applicants SET Status = 'Rejected', message = ? WHERE ApplicantID = ?");
    if ($stmt->execute([$rejectReason, $applicantID])) {
        echo '<script>alert("Application rejected successfully."); window.location.href="../pages/company/index.php";</script>';
    } else {
        echo '<script>alert("There was an error accepting the application."); window.history.back();</script>';
        
    }
} else {
    echo '<script>alert("Invalid request."); window.history.back();</script>';
}

