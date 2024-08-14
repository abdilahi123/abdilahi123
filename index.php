<?php
include_once './handler/DB.php';
$db = new DBhelper();
$it = $db->getRows("specialist");
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
                <div class="col-lg-5 mx-auto">
                    <div class="card p-5 shadow">
                        <form id="signin-form" action="authenticate.php" method="POST">
                            <h2 class="text-center">Sign In</h2>
                            <div class="form-group">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <p class="mt-3">Forgot Password?</p>
                            <button name="signin" type="submit" class="btn w-100 btn-primary btn-success mt-1">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a class="text-success" href="signup.php">Sign Up</a></p>
                        </div>
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