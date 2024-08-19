<?php
include_once '../../handler/dbconfig.php';

// Check if opportunityID is provided
if (isset($_GET['id'])) {
    $opportunityID = intval($_GET['id']);
    $query = "SELECT * FROM opportunity o, applicants a WHERE o.opportunityID = o.opportunityID AND o.opportunityID :opportunityID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':opportunityID', $opportunityID, PDO::PARAM_INT);

} else {
    $query = "SELECT * FROM applicants";
    $stmt = $conn->prepare($query);

}

$stmt->execute();
$App = $stmt->fetchAll(PDO::FETCH_ASSOC);