<?php
include '../../assets/components/itSession.php';
include '../../handler/specialist.php';
include '../../assets/components/header.php';
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll(".tab");
        const sections = document.querySelectorAll(".section");

        function deactivateAll() {
            tabs.forEach(tab => tab.classList.remove("active"));
            sections.forEach(section => section.classList.remove("active"));
        }

        tabs.forEach((tab, index) => {
            tab.addEventListener("click", () => {
                deactivateAll();
                tab.classList.add("active");
                sections[index].classList.add("active");
            });
        });

        // Set default active tab and section
        tabs[0].classList.add("active");
        sections[0].classList.add("active");
    });
</script>
</head>

<body>
    <div class="container specialist-container">
        <div class="text-center mb-4">
            <h1>Zan-Tech Opportunities</h1>
            <h2 class="text-success">User Dashboard</h2>
        </div>

        <div class="tabs">
            <div class="tab">Profile</div>
            <div class="tab">Available Opportunities</div>
            <div class="tab">My Applications</div>
            <a class="tab" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>

        <div class="section text-center">
            <h2 class="text-center mb-4">Profile</h2>
            <div class="rating">
                <?php
                // Fetch average rating for this specialist
                $ratingQuery = "SELECT AVG(rating) as avgRating FROM ratings WHERE SpecialistID = :SpecialistID";
                $ratingStmt = $conn->prepare($ratingQuery);
                $ratingStmt->bindParam(':SpecialistID', $_SESSION['id'], PDO::PARAM_INT);
                $ratingStmt->execute();
                $ratingResult = $ratingStmt->fetch(PDO::FETCH_ASSOC);
                $averageRating = round($ratingResult['avgRating']);

                // Display stars
                for ($i = 1; $i <= 5; $i++) {
                    echo '<span class="fa fa-star"' . ($i <= $averageRating ? ' style="color: gold;"' : '') . '></span>';
                }
                ?>
            </div>
            <div class="mb-4">
                <img src="../../assets/images/avatar.png" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
            </div>
            <div class="profile-content">
                <div class="personal-details mb-4">
                    <h5 class="text-success">Personal Details</h5>
                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> <?php echo htmlspecialchars($it[0]['FullName']); ?></li>
                        <li><strong>Email:</strong> <?php echo htmlspecialchars($it[0]['Email']); ?></li>
                        <li><strong>Phone:</strong> <?php echo htmlspecialchars($it[0]['phone_Number']); ?></li>
                    </ul>
                </div>

                <div class="github mb-4">
                    <h5 class="text-success">GitHub</h5>
                    <ul class="list-unstyled">
                        <li><strong>GitHub:</strong> <a class="text-success" href="https://github.com/nahida" target="_blank"> <?php echo htmlspecialchars($it[0]['GitHub_Username']); ?></a></li>
                    </ul>
                </div>

                <div class="others mb-4">
                    <h5 class="text-success">Others</h5>
                    <ul class="list-unstyled">
                        <li><strong>View CV:</strong> <a class="text-success" href="https://github.com/nahida" target="_blank">My CV</a></li>
                    </ul>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-success m-1">Update Profile</button>
                    <button class="btn btn-secondary m-1">Share Profile</button>
                </div>
            </div>
        </div>



        <div class="section">
            <h2>Available Opportunities</h2>
            <ul class="list">
                <?php foreach ($Opp as $ops) { ?>

                    <li class="item">
                        <div class="details">
                            <div>
                                <div class="title"><?= htmlspecialchars($ops["Tittle"]); ?></div>
                                <div class="company"><?= htmlspecialchars($ops["Requirements"]); ?></div>
                                <p><?= htmlspecialchars($ops["ApplicationDeadline"]); ?></p>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-apply btn-primary" data-bs-toggle="modal" data-bs-target="#applicationModal<?= htmlspecialchars($ops['opportunityID']) ?>">Apply</button>


                            <!-- Application Modal -->
                            <div class="modal fade" id="applicationModal<?= htmlspecialchars($ops['opportunityID']) ?>" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="applicationModalLabel">Apply for <?= htmlspecialchars($ops["Tittle"]); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../../handler/uploadLetter.php" id="applicationForm" method="post" enctype="multipart/form-data">
                                                <input name="opportunityID" type="hidden" value="<?= htmlspecialchars($ops['opportunityID']) ?>">
                                                <input name="SpecialistID" type="hidden" value="<?= htmlspecialchars($id) ?>">
                                                <div class="form-group">
                                                    <label for="coverLetter">Upload Application Letter:</label>
                                                    <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" accept="application/pdf" required>
                                                </div>
                                                <button type="submit" name="confirm" class="btn btn-primary">Confirm Application</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="section">
            <h2>My Applications</h2>
            <ul class="list">
                <?php

                if (!empty($applicants)) {
                    foreach ($applicants as $opp) {
                ?>
                        <li class="item" data-id="<?php echo htmlspecialchars($opp['opportunityID']); ?>">
                            <div class="details">
                                <div>
                                    <div class="title">Title: <?php echo htmlspecialchars($opp['Tittle']); ?></div>
                                    <div class="company">Type: <?php echo htmlspecialchars($opp['Type']); ?></div>
                                    <div class="company">Requirements: <?php echo htmlspecialchars($opp['Requirements']); ?></div>
                                    <div class="company">Description: <?php echo htmlspecialchars($opp['Description']); ?></div>
                                    <div class="company"><b> Feedback: </b> <?php echo htmlspecialchars($opp['message']); ?></div>

                                </div>
                            </div>
                            <div class="actions">
                                <input type="submit" disabled class="btn btn-success" value="<?php echo htmlspecialchars($opp['Status']); ?>">

                                <form action="../../handler/deleteApp.php" method="post" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                    <input type="hidden" name="opportunityID" value="<?php echo htmlspecialchars($opp['opportunityID']); ?>">
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </div>
                        </li>
                <?php
                    }
                } else {
                    echo '<li>No applications found.</li>';
                }
                ?>
            </ul>
        </div>

        <!-- Logout Confirmation Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="../../handler/logout.php" method="post" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../assets/components/footer.php';
