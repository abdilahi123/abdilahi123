<?php
// Include your database configuration file
include 'dbconfig.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'] ?? 0;
    $userId = $_POST['user_id'] ?? 0; // You can pass the user ID or any identifier

    try {
        $stmt = $conn->prepare("INSERT INTO ratings (loginID, rating) VALUES (:user_id, :rating)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();

        echo "Rating saved successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
