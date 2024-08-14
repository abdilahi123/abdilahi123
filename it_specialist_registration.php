<?php

include_once 'handler/DB.php';
$db = new DBhelper();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Registration - Zanzibar Tech Opportunities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./assets/style.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Main Content -->
    <section class="flex-grow-1">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card card-success p-5 shadow">
                        <form id="it-specialist-registration-form" action="it_register.php" method="POST">
                            <h2 class="py-5">IT Specialist Registration</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="github" class="form-label">GitHub Username</label>
                                        <input type="text" class="form-control" id="github" name="git">
                                    </div>
                                    <div class="form-group">
                                        <label for="specialty" class="form-label">Specialty</label>
                                        <input type="text" class="form-control" id="speciality" name="special">
                                    </div>
                                    <div class="form-group">
                                        <label for="experience" class="form-label">Experience (years)</label>
                                        <input type="number" class="form-control" id="experience" name="experi">
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-secondary">Register</button>
                                    <!-- <a href="it_specialist_dashboard.php"  name="register" type="register" class="btn btn-success">Register</a> -->
                                    <a href="signup.php" class="btn btn-secondary">Go back</a>
                                </div>
                                <div class="col-lg-6">
                                    <span class="float-end">Already have an Account? <a class="text-success" href="index.php">Login</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>