<?php
session_start();
include_once '../handler/DB.php';
$db = new DBhelper();

$loginId = $_SESSION['ActiveUser'];

$eml = $db->getData("credentials", "Email", "LoginID", $loginId);

$id = $db->getData("specialist", "SpecialistID", "Email", $eml);

$it = $db->getRows("specialist",  ['where' => ['SpecialistId' => $id]]);

$Opp = $db->getRows("opportunity");

$OppId = $db->getData("applicants", "opportunityID", "SpecialistId", $id);

$Opp_2 = $db->getRows("opportunity", ['where' => ['opportunityId' => $OppId]]);


?>
<?php
include '../assets/components/header.php';
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
    <div class="container">
        <div class="text-center mb-4">
            <h1>Zan-Tech Opportunities</h1>
            <h2 class="text-success">User Dashboard</h2>
        </div>

        <div class="tabs">
            <div class="tab">Profile</div>
            <div class="tab">Available Opportunities</div>
            <div class="tab">My Applications</div>
            <div class="tab">Messages</div>
            <a class="tab" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>

        </div>

        <div class="section">
            <h2>Profile</h2>
            <div class="profile-content">
                <div class="personal-details">
                    <h5 class="text-success">Personal Details</h5>

                    <ul>
                        <li>Name: <?php echo $it[0]['FullName']; ?></li>
                        <li>Email: <?php echo $it[0]['Email']; ?></li>
                        <li>Phone: <?php echo $it[0]['phone_Number']; ?></li>
                    </ul>


                </div>
                <!--<div class="education">
                    <h5 class="text-success">Education</h5>
                    <ul>
                        <li>Bachelor of Science in Computer Science - SUZA University, 2020</li>
                        <li>High School Diploma - ABC School, 2024</li>
                    </ul>
                </div>
                <div class="work-experience">
                    <h5 class="text-success">Work Experience</h5>
                    <ul>
                        <li>Software Engineer - Tech Solutions Ltd., 2020-Present</li>
                        <li>Intern - Innovation Hub, 2019-2020</li>
                    </ul>
                </div>-->
                <div class="github">
                    <h5 class="text-success">GitHub</h5>
                    <ul>
                        <li>GitHub: <a class="text-success" href="https://github.com/nahida" target="_blank">nahida</a></li>
                    </ul>
                </div>

                <div class="others">
                    <h5 class="text-success">Others</h5>
                    <ul>
                        <li>View CV: <a class="text-success" href="https://github.com/nahida" target="_blank">My CV</a></li>
                    </ul>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-success m-1 float-end">Update Profile</button>
                        <button class="btn btn-secondary m-1 float-end">Share Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Available Opportunities</h2>
            <ul class="list">
                <?php
                foreach ($Opp as $ops) {
                ?>
                    <li class="item">
                        <div class="details">
                            <div>
                                <div class="title"><?= $ops["Tittle"]; ?></div>
                                <div class="company"><?= $ops["Requirements"]; ?></div>
                                <p> <?= $ops["ApplicationDeadline"]; ?></p>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-apply btn-primary" data-toggle="modal" data-target="#applicationModal">Apply</button>
                            <!-- Application Modal -->
                            <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="applicationModalLabel">Apply for <?= $ops["Tittle"]; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form action="application_handler.php" id="applicationForm" method="post" enctype="multipart/form-data">
                                                <input name="opportunityID" type="hidden" value="<?= $ops['opportunityID'] ?>">
                                                <input name="SpecialistID" type="hidden" value="<?= $id ?>">

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


                <div class="col-4 float-right" id="msg">
                    <?php
                    if ($_GET['msg'] == "success") { ?>
                        <!-- <div class="p-2 alert-success">
                        <h6>File uploaded successfully<span class="fa fa-check-circle float-right ml-4"></span></h6>
                    </div>-->
                    <?php
                    }
                    if ($_GET['msg'] == "error") { ?>
                        <div class="p-2 mb-2 alert-danger">
                            <h6>Sorry Failed to upload file<span class="fa fa-times-circle float-right ml-4"></span></h6>
                        </div>
                    <?php
                    }

                    ?>
                </div>


                <!-- Additional opportunity items can be added here -->
            </ul>
        </div>
        <div class="section">
            <h2>My Applications</h2>
            <ul class="list">

                <?php
                foreach ($Opp_2 as $opp) {
                ?>
                    <li class="item" data-id="<?php echo $opp['opportunityID'] ?>">
                        <div class="details">
                            <div>
                                <div class="title">Title: <?php echo $opp['Tittle'] ?></div>
                                <div class="company">Type: <?php echo $opp['Type'] ?></div>
                                <div class="company">Requirements: <?php echo $opp['Requirements'] ?></div>
                                <div class="company">Start Date: <?php echo $opp['StartDate'] ?></div>
                                <div class="company">End Date: <?php echo $opp['EndDate'] ?></div>
                                <div class="company">Description: <?php echo $opp['Description'] ?></div>
                                <div class="company">Deadline: <?php echo $opp['ApplicationDeadline'] ?></div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
        <div class="section">
            <div class="row my-3">
                <div class="col-lg-6">
                    <h2>Messages</h2>
                </div>
            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="handler/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../assets/components/footer.php';
        ?>