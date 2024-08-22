<?php

include_once '../../handler/dbconfig.php';

if (isset($_GET['id'])) {
    $opportunityID = intval($_GET['id']);
    $query = "SELECT * FROM opportunity o 
              JOIN applicants a ON o.opportunityID = a.opportunityID 
              JOIN specialist s ON a.SpecialistID = s.SpecialistID 
              WHERE o.opportunityID = :opportunityID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':opportunityID', $opportunityID, PDO::PARAM_INT);

} else {
    $query = "SELECT * FROM opportunity o 
              JOIN applicants a ON o.opportunityID = a.opportunityID 
              JOIN specialist s ON a.SpecialistID = s.SpecialistID 
              WHERE o.companyID = :companyID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':companyID', $_SESSION['id'], PDO::PARAM_INT);
}

try {
    $stmt->execute();
    $App = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

