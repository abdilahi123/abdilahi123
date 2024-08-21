<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Registration - Zanzibar Tech Opportunities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/style.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Main Content -->
    <section class="flex-grow-1">
        <div class="container p-5">
            <h2 class="py-5">Join <b class="text-success">Zanzibar Tech Opportunities</b> </h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-success p-5" id="company-card">
                        <div class="row">
                            <div class="col-4">
                                <img src="../assets/images/company.jpg" alt="Company" class="img-fluid">
                            </div>
                            <div class="col-8 d-flex align-items-center">
                                <h4>Join as a Company</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-success p-5" id="it-specialist-card">
                        <div class="row">
                            <div class="col-4">
                                <img src="../assets/images/it.png" alt="IT Specialist" class="img-fluid">
                            </div>
                            <div class="col-8 d-flex align-items-center">
                                <h4>Join as an IT Specialist</h4>
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

    <script src="../assets/script.js"></script>
    <script>
        document.getElementById('company-card').addEventListener('click', function () {
            window.location.href = 'company_registration.php'; // Redirect to the company page
        });

        document.getElementById('it-specialist-card').addEventListener('click', function () {
            window.location.href = 'it_specialist_registration.php'; // Redirect to the IT specialist page
        });
    </script>
</body>

</html>
