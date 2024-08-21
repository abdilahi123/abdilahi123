<?php
// Include your database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("
        SELECT * 
        FROM applicants a
        JOIN opportunity o ON a.opportunityID = o.opportunityID
        JOIN specialist s ON a.SpecialistID = s.SpecialistID
        WHERE a.opportunityID = :opportunityID 
        AND status = 'Accepted'
    ");
    
    // Bind the parameter
    $stmt->bindParam(':opportunityID', $opportunityID, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch all results
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($users) {
        // Process the results (for example, display them)
        foreach ($users as $user) {
            ?>
            <div class="col-md-4">
            <div class="card profile-card-4">
                <div class="card-img-block">
                    <div class="info-box">
                        <?php echo htmlspecialchars($user['description']); ?> <!-- Replace with the appropriate field -->
                    </div>
                    <img class="img-fluid" src="../../assets/images/background.avif" alt="Card image cap"> 
                </div>
                <div class="card-body pt-5">
                    <img src="../../assets/images/profile.jpg" alt="profile-image" class="profile" /> <!-- Replace with the appropriate field for profile image -->
                    <h5 class="card-title text-center">
                        <?php echo htmlspecialchars($user['FullName']); ?> 
                    </h5>
                    <p class="card-text text-center">
                        <?php echo htmlspecialchars($user['Expirience']); ?> 
                    </p>
                    <div class="icon-block text-center">
                        <div class="icon-block text-center"><a href="#">
                            <i class="fa fa-github"></i></a>
                        </div>
                        <span class="fa fa-star" data-value="1"></span>
                        <span class="fa fa-star" data-value="2"></span>
                        <span class="fa fa-star" data-value="3"></span>
                        <span class="fa fa-star" data-value="4"></span>
                        <span class="fa fa-star" data-value="5"></span>
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
