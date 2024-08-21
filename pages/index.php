<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Registration - Zanzibar Tech Opportunities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="./assets/style.css" rel="stylesheet"> -->
    <link href="../assets/css/toastr.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css
" rel="stylesheet">

    <link href="../assets/css/login.css" rel="stylesheet">

</head>


<body class="bg-light d-flex flex-column min-vh-100">

    <?php require '../handler/login.php'; ?>

    <!-- Main Content -->
    <section class="flex-grow-1 d-flex align-items-center">
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="" method="POST">
                    <h1>Sign in</h1>
                    <span>or use your account</span>
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <!-- <a href="#">Forgot your password?</a> -->
                    <input type="submit" class="login_btn" value="Sign In">
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                         <a href="signup.php"><button class="login_btn" id="signUp">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../bootstrap/jquery/jquery.slim.min.js"></script>
    <script src="../assets/js/myScript.js"></script>
    <script src="../assets/js/toastr.js"></script>
</body>

</html>