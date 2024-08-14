<?php
session_start();
include_once '../../handler/DB.php';
$db = new DBhelper();

$App = $db->getRows("applicants");

require_once '../../assets/components/header.php';
require_once '../../assets/components/sidebar.php';
?>

<div class="main-content">
    <?php
    include '../../assets/components/topbar.php'
    ?>
    <div class="content">
        <div class="row">
            <?php foreach ($App as $a) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <h2>View Applications</h2>
                        <hr>
                        <p><b>Title:</b> <?= $db->getData("opportunity", "Tittle", "opportunityID", $a["opportunityID"]); ?></p>
                        <p><b>Status: </b><?= $a["Status"] ?></p>
                        <p><b>Applicant:</b> <?= $db->getData("specialist", "FullName", "SpecialistID", $a["SpecialistID"]); ?></p>
                        <div class="row mt-2">
                            <div class="col-6">

                                <button class="btn accept-btn">Accept</button>
                            </div>


                            <div class="col-6">
                                <button class="btn accept-btn">reject</button>

                            </div>
                        </div>
                        <hr>
                        <div class="row p-2 m-1">
                            <p><a href="assets/letters/<?= $a['LetterPath'] ?>" target="_blank" class="mt-3">Open Application Letter</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include '../../assets/components/footer.php' ?>