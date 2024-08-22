
<?php
include_once 'dbconfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opportunityID = $_POST['opportunityID'] ?? null;

    if (!$opportunityID) {
        echo 'Opportunity ID not provided';
        exit;
    }

    try {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("
            DELETE FROM applicants
            WHERE opportunityID = :opportunityID
        ");
        $stmt->execute(['opportunityID' => $opportunityID]);
        echo 'Application deleted successfully';

        header('Location: ../pages/it/index.php');

        exit;
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
        exit;
    }
}
