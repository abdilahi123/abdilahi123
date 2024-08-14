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
        <div class="container p-5 ">
            <h2 class="py-5">Join <b class="text-success">Zanzibar Tech Opportunities</b> </h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-success p-5">
                        <div class="row">
                            <div class="col-10">
                                <h4>Join as a company</h4>
                            </div>
                            <div class="col-2">
                                <input id="company-radio" class="float-end" type="radio" name="join-option" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-success p-5">
                        <div class="row">
                            <div class="col-10">
                                <h4>Join as an IT Specialist</h4>
                            </div>
                            <div class="col-2">
                                <input id="it-specialist-radio" class="float-end" type="radio" name="join-option" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <h5 class="text-center py-2">Already have an Account?
                        <a href="./index.php" class="w-25 text-center">Login</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/script.js"></script>
    <script>
        document.getElementById('company-radio').addEventListener('change', function() {
            if (this.checked) {
                window.location.href = 'company_registration.php'; // Redirect to the company page
            }
        });

        document.getElementById('it-specialist-radio').addEventListener('change', function() {
            if (this.checked) {
                window.location.href = 'it_specialist_registration.php'; // Redirect to the IT specialist page
            }
        });
    </script>
</body>

</html>