<?php
session_start();

// Include your database configuration file
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['SpecialistID']) && isset($_POST['rating'])) {
    $SpecialistID = intval($_POST['SpecialistID']);
    $rating = intval($_POST['rating']);
    
    // Validate the rating value
    if ($rating < 1 || $rating > 5) {
        echo "Invalid rating value.";
        exit();
    }

    try {
        // Prepare the SQL statement to insert or update the rating
        $stmt = $conn->prepare("
            INSERT INTO ratings (SpecialistID, rating) 
            VALUES (:SpecialistID, :rating)
            ON DUPLICATE KEY UPDATE rating = VALUES(rating)
        ");
        // Bind the parameters
        $stmt->bindParam(':SpecialistID', $SpecialistID, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to the previous page
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error submitting rating.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
