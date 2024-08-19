<?php
include_once 'dbconfig.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = "SELECT * FROM opportunity WHERE opportunityID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $opportunity = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($opportunity) {
            echo json_encode($opportunity);
        } else {
            echo json_encode(['error' => 'Opportunity not found']);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = "DELETE FROM opportunity WHERE opportunityID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Opportunity deleted successfully']);
        } else {
            echo json_encode(['error' => 'Opportunity not found or could not be deleted']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
