<?php
require '../handler/rCompany.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Registration - Zanzibar Tech Opportunities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Main Content -->
    <section class="flex-grow-1 d-flex align-items-center">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card card-success p-5 shadow">
                        <form action="" method="POST">
                            <h2 class="text-center mb-4">Company Registration</h2>
                            <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" name="companyname" required>
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirmPassword" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-success mt-3" type="submit" name="submit">Submit</button>
                                    <a href="signup.php" class="btn btn-secondary mt-3">Go Back</a>
                                </div>
                                <div class="col-lg-6">
                                    <span class="float-end mt-3">Already have an Account? <a class="text-success" href="index.php">Login</a></span>
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