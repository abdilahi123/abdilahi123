<?php
session_start();
include '../../assets/components/compSession.php';
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
                            <h2><?= htmlspecialchars($a["Tittle"]); ?></h2>
                            <hr>
                            <p><b>Title:</b> <?= htmlspecialchars($a["Tittle"]); ?></p>
                            <p><b>Status: </b><?= htmlspecialchars($a["Status"]); ?></p>
                            <p><b>Applicant:</b> <?= htmlspecialchars($a["FullName"]); ?></p>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <!-- Form to handle status update -->
                                    <form method="POST" action="../../handler/accept_applicants.php">
                                        <input name="applicantID" type="hidden" value="<?= htmlspecialchars($a['ApplicantID']); ?>">
                                        <button type="button" class="btn accept-btn" data-bs-toggle="modal" data-bs-target="#acceptModal">Accept</button>

                                        <!-- Accept Modal -->
                                        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="acceptModalLabel">Accept Application</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="acceptReason" class="form-label">Reason for Acceptance</label>
                                                            <textarea class="form-control" id="acceptReason" name="acceptReason" rows="3" required></textarea>
                                                        </div>
                                                        Are you sure you want to accept this applicant?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Accept</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form method="POST" action="../../handler/reject_applicants.php">
                                        <input type="hidden" name="applicantID" value="<?= htmlspecialchars($a['ApplicantID']); ?>">
                                        <button type="submit" class="btn reject-btn" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                                        <!-- Reject Modal -->
                                        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="rejectReason" class="form-label">Reason for Rejection</label>
                                                            <textarea class="form-control" id="rejectReason" name="rejectReason" rows="3" required></textarea>
                                                        </div>
                                                        Are you sure you want to reject this applicant?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
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