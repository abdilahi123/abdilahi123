<?php
// Include DB connection
include_once '../../handler/dbconfig.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {


        if (isset($_POST['edit_opportunity_id']) && !empty($_POST['edit_opportunity_id'])) {
            // Update existing record
            $id = $_POST['edit_opportunity_id'];
            $query = "UPDATE opportunity SET Tittle=:title, Description=:descr, Type=:type, Requirements=:requir, StartDate=:start_date, EndDate=:end_date, ApplicationDeadline=:applica WHERE opportunityID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $_POST['title']);
            $stmt->bindParam(':descr', $_POST['descr']);
            $stmt->bindParam(':type', $_POST['type']);
            $stmt->bindParam(':requir', $_POST['requir']);
            $stmt->bindParam(':start_date', $_POST['start_date']);
            $stmt->bindParam(':end_date', $_POST['end_date']);
            $stmt->bindParam(':applica', $_POST['applica']);
            $stmt->bindParam(':id', $id);
        } else {
            // Insert new record
            $query = "INSERT INTO opportunity (Tittle, Description, Type, Requirements, StartDate, EndDate, ApplicationDeadline) VALUES (:title, :descr, :type, :requir, :start_date, :end_date, :applica)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $_POST['title']);
            $stmt->bindParam(':descr', $_POST['descr']);
            $stmt->bindParam(':type', $_POST['type']);
            $stmt->bindParam(':requir', $_POST['requir']);
            $stmt->bindParam(':start_date', $_POST['start_date']);
            $stmt->bindParam(':end_date', $_POST['end_date']);
            $stmt->bindParam(':applica', $_POST['applica']);
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo "Operation completed successfully!";
        } else {
            echo "Error: Could not execute the query.";
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
    }
}

// Fetch opportunities
try {
    $query2 = "SELECT * FROM opportunity";
    $stmt = $conn->prepare($query2);
    $stmt->execute();
    $Opp = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;

include '../../assets/components/header.php';
include '../../assets/components/sidebar.php'; ?>
<div class="main-content">
    <?php
    include '../../assets/components/topbar.php';
    ?>
    <div class="content">
        <div class="card">
            <div class="oppoTab">
                My Opportunity

                <button class="btn btn-primary oppoBtn" data-bs-toggle="modal" data-bs-target="#oppoModal">
                    Add Opportunity
                </button>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if (!empty($Opp)) {
                        foreach ($Opp as $ops) {
                    ?>
                            <div class="col-sm-3 col-md-6 col-lg-3">
                                <div class="card" style="width: 23rem; position: relative;">
                                    <div class="card-body text-center">
                                        <!-- Delete Button (X) -->
                                        <button type="button" class="btn-close" aria-label="Delete" style="position: absolute; top: 10px; right: 10px;" onclick="deleteOpportunity(<?php echo $ops['opportunityID']; ?>, '<?php echo htmlspecialchars($ops['Tittle'], ENT_QUOTES); ?>')">
                                        </button>

                                        <h3 class="card-title"><?php echo htmlspecialchars($ops['Tittle']); ?></h3>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($ops['Type']); ?></h6>
                                        <p class="card-text"><?php echo htmlspecialchars($ops['Description']); ?></p>
                                        <p><strong>Requirements:</strong> <?php echo htmlspecialchars($ops['Requirements']); ?></p>
                                        <p><strong>Start Date:</strong> <?php echo htmlspecialchars($ops['StartDate']); ?></p>
                                        <p><strong>End Date:</strong> <?php echo htmlspecialchars($ops['EndDate']); ?></p>
                                        <p><strong>Application Deadline:</strong> <?php echo htmlspecialchars($ops['ApplicationDeadline']); ?></p>
                                        <!-- Buttons -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editOpportunityModal" data-id="<?php echo $ops['opportunityID']; ?>" onclick="loadOpportunityData(<?php echo $ops['opportunityID']; ?>)">
                                            Edit
                                        </button>
                                        <a href="view-applicants.php?id=<?php echo $ops['opportunityID']; ?>"><button type="button" class="btn btn-secondary">View Applicants </button></a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "<p>No opportunities found for this company.</p>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="oppoModal" tabindex="-1" aria-labelledby="oppoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="oppoModalLabel">Add a New Opportunity</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" name="descr" id="description" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <input type="text" name="type" id="type" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="requirements">Requirements:</label>
                                    <input type="text" name="requir" id="requirements" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start-date">Start Date:</label>
                                    <input type="date" name="start_date" id="start-date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end-date">End Date:</label>
                                    <input type="date" name="end_date" id="end-date" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="application-deadline">Application Deadline:</label>
                                    <input type="date" name="applica" id="application-deadline" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Opportunity Modal -->
    <div class="modal fade" id="editOpportunityModal" tabindex="-1" aria-labelledby="editOpportunityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOpportunityModalLabel">Edit Opportunity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="edit_opportunity_id" id="editOpportunityId"> <!-- Hidden field for opportunity ID -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editOpportunityTitle">Title</label>
                                    <input type="text" class="form-control" name="title" id="editOpportunityTitle" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editOpportunityType">Type</label>
                                    <input type="text" class="form-control" name="type" id="editOpportunityType" placeholder="Enter type">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="editOpportunityDescription">Description</label>
                                    <textarea class="form-control" name="descr" id="editOpportunityDescription" rows="3" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="editOpportunityRequirements">Requirements</label>
                                    <textarea class="form-control" name="requir" id="editOpportunityRequirements" rows="2" placeholder="Enter requirements"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editOpportunityStartDate">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="editOpportunityStartDate">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editOpportunityEndDate">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="editOpportunityEndDate">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editOpportunityDeadline">Application Deadline</label>
                            <input type="date" class="form-control" name="applica" id="editOpportunityDeadline">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadOpportunityData(id) {
            fetch(`../../handler/get_opportunity.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editOpportunityId').value = data.opportunityID;
                    document.getElementById('editOpportunityTitle').value = data.Tittle;
                    document.getElementById('editOpportunityType').value = data.Type;
                    document.getElementById('editOpportunityDescription').value = data.Description;
                    document.getElementById('editOpportunityRequirements').value = data.Requirements;
                    document.getElementById('editOpportunityStartDate').value = data.StartDate;
                    document.getElementById('editOpportunityEndDate').value = data.EndDate;
                    document.getElementById('editOpportunityDeadline').value = data.ApplicationDeadline;
                })
                .catch(error => console.error('Error fetching opportunity data:', error));
        }

        function deleteOpportunity(id, name) {
            if (confirm(`Are you sure you want to delete this ${name}?`)) {
                fetch(`../../handler/get_opportunity.php?id=${id}`, {
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Opportunity deleted successfully');
                            location.reload(); // Refresh the page to reflect changes
                        } else {
                            alert('Error deleting opportunity: ' + data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>

</div>

<?php include '../../assets/components/footer.php'; ?>