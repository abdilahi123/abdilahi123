<?php
session_start();
include_once '../../handler/dbconfig.php';
include_once '../../handler/get_applicants.php';
require_once '../../assets/components/header.php';
require_once '../../assets/components/sidebar.php';
?>

<div class="main-content">
    <?php include '../../assets/components/topbar.php'; ?>
    <div class="content">
        <div class="row">
            <?php if (!empty($App)) { ?>
                <?php foreach ($App as $a) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <h2>View Applications</h2>
                            <hr>
                            <p><b>Title:</b> <?= htmlspecialchars($a["Tittle"]); ?></p>
                            <p><b>Status: </b><?= htmlspecialchars($a["Status"]); ?></p>
                            <p><b>Applicant:</b> <?= htmlspecialchars($a["FullName"]); ?></p>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <button class="btn accept-btn">Accept</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn reject-btn">Reject</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-2 m-1">
                                <p><a href="../../assets/letters/<?= htmlspecialchars($a['LetterPath']); ?>" target="_blank" class="mt-3">Open Application Letter</a></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No applicants found.</p>
            <?php } ?>
        </div>
    </div>
</div>

<?php include '../../assets/components/footer.php'; ?>
