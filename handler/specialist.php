<?php
session_start();
include_once 'dbconfig.php';

// Assuming $conn is the PDO instance from dbconfig.php
$id = $_SESSION['id'];

// Fetch specialist details
$stmt = $conn->prepare("SELECT * FROM specialist WHERE SpecialistID = :id");
$stmt->execute([':id' => $id]);
$it = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all opportunities
$stmt = $conn->query("SELECT * FROM opportunity");
$Opp = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Opportunity IDs for the specialist
$stmt = $conn->prepare("SELECT opportunityID FROM applicants WHERE SpecialistId = :id");
$stmt->execute([':id' => $id]);
$oppIds = $stmt->fetchAll(PDO::FETCH_COLUMN);


if (!$id) {
    echo 'Specialist ID not found';
    exit;
}

try {

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("
        SELECT applicants.*, opportunity.*
        FROM applicants
        JOIN opportunity ON applicants.opportunityID = opportunity.opportunityID
        WHERE applicants.specialistID = :specialistID
    ");
    $stmt->execute(['specialistID' => $id]);

    // Fetch the results
    $applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
    exit;
}

