<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zantech";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $title = $_POST['title'];
    $description = $_POST['descr'];
    $type = $_POST['type'];
    $requirements = $_POST['requir'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $applicationDeadline = $_POST['applica'];

    $query = "INSERT INTO opportunity (Tittle, Description, Type, Requirements, StartDate, EndDate, ApplicationDeadline) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Failed to prepare statement: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $title, $description, $type, $requirements, $startDate, $endDate, $applicationDeadline);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Opportunity posted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


<?php
include '../../assets/components/header.php';
include '../../assets/components/sidebar.php'; ?>

<div class="main-content">
    <?php
    include '../../assets/components/topbar.php'
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
            shdhsaj
        </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="oppoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Opportunity</h1>
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



    <?php
    include '../../assets/components/footer.php';

    ?>