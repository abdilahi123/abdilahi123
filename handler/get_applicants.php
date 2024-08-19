<?php
include_once '../../handler/dbconfig.php';

// Check if opportunityID is provided
if (isset($_GET['id'])) {
    $opportunityID = intval($_GET['id']);

    // Fetch applicants for the specific opportunity ID
    $query = "SELECT * FROM opportunity  WHERE opportunityID = :opportunityID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':opportunityID', $opportunityID, PDO::PARAM_INT);
} else {
    // Fetch all applicants if no opportunity ID is provided
    $query = "SELECT * FROM credentials";
    $stmt = $conn->prepare($query);
}

$stmt->execute();
$App = $stmt->fetchAll(PDO::FETCH_ASSOC);