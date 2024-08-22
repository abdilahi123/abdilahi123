<?php
session_start();
include_once '../../handler/dbconfig.php';

if (isset($_GET['id'])) {
    $opportunityID = intval($_GET['id']);
    $query = "SELECT * 
              FROM applicants a 
              JOIN opportunity o ON a.opportunityID = o.opportunityID 
              JOIN specialist s ON a.SpecialistID = s.SpecialistID 
              WHERE o.opportunityID = :opportunityID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':opportunityID', $opportunityID, PDO::PARAM_INT);

} else {
    $query = "SELECT * 
              FROM applicants a 
              JOIN opportunity o ON a.opportunityID = o.opportunityID 
              JOIN specialist s ON a.SpecialistID = s.SpecialistID 
              WHERE o.companyID = :companyID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':companyID', $_SESSION['id'], PDO::PARAM_INT);
}

try {
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        foreach ($users as $user) {
?>
            <div class="col-md-4">
                <div class="card profile-card-4">
                    <div class="card-img-block">
                        <div class="info-box">
                            <?php echo htmlspecialchars($user['description']); ?>
                        </div>
                        <img class="img-fluid" src="../../assets/images/background.avif" alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="../../assets/images/avatar.png" alt="profile-image" class="profile" />
                        <h5 class="card-title text-center">
                            <?php echo htmlspecialchars($user['FullName']); ?>
                        </h5>
                        <p class="card-text text-center">
                            <?php echo htmlspecialchars($user['Tittle']); ?>
                        </p>
                        <div class="icon-block text-center">
                            <div class="icon-block text-center">
                                <a href="#">
                                    <i class="fa fa-github"></i> <?php echo htmlspecialchars($user['GitHub_Username']); ?>
                                </a>
                            </div>
                            <div class="icon-block text-center">
                                <!-- Display rating stars -->
                                <div class="rating">
                                    <?php
                                    // Fetch average rating for this specialist
                                    $ratingQuery = "SELECT AVG(rating) as avgRating FROM ratings WHERE SpecialistID = :SpecialistID";
                                    $ratingStmt = $conn->prepare($ratingQuery);
                                    $ratingStmt->bindParam(':SpecialistID', $user['SpecialistID'], PDO::PARAM_INT);
                                    $ratingStmt->execute();
                                    $ratingResult = $ratingStmt->fetch(PDO::FETCH_ASSOC);
                                    $averageRating = round($ratingResult['avgRating']);
                                    
                                    // Display stars
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo '<span class="fa fa-star"' . ($i <= $averageRating ? ' style="color: gold;"' : '') . '></span>';
                                    }
                                    ?>
                                </div>
                                <!-- Rating Submission Form -->
                                <form method="post" action="../../handler/save_rating.php">
                                    <input type="hidden" name="SpecialistID" value="<?php echo htmlspecialchars($user['SpecialistID']); ?>">
                                    <select class="form-select" name="rating" required>
                                        <option value="">Rate</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="5">5 Stars</option>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Submit Rating</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "No data found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
