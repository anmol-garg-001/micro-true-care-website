 <?php
     session_start();
     if(!isset($_SESSION["uid"]))
         header("location:customer_login.php");
 ?>
<!doctype html>
<html lang="en">

<head>
    <title>Your Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
        .card img {
            height: 25vh;
        }

        .card-text {
            height: 50px;
            text-align: center;
        }

    </style>
    <script>
        $(document).ready(function() {
            if (<?php echo isset($_GET['resp'])?>)
                $("#alertSuccess").modal("show");
            $('#alertSuccess').on('hidden.bs.modal', function() {
                window.location.replace("customer_dashboard.php");
            })
        });

    </script>
</head>

<body>
    <div class="container">
        <div id="box">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Your Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="customer_settings.php">Settings</a>
                        </li>

                    </ul>
                    <form action="customer_logout.php" class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </div>

            </nav>
            <div class="form-row mt-5">
                <div class="col-md-4 mb-5">
                    <center>
                        <div class="card " style="width: 18rem;">
                            <img src="pics/avatar-generators-994x400%20(1).jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Profile Page </h5>
                                <p class="card-text">You can manage your personal details here.</p>
                                <a href="customer_profile_page.php" class="btn btn-primary">Go to profile</a>
                            </div>
                        </div>
                    </center>
                </div>

                <div class="col-md-4 mb-5">
                    <center>
                        <div class="card" style="width: 18rem;">
                            <img src="pics/ezgif.com-webp-to-jpg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">My Complaints</h5>
                                <p class="card-text">See the status of the complaints you have lodged.</p>
                                <a href="customer_my_complaints.php" class="btn btn-primary">See Complaints</a>
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col-md-4 mb-5">
                    <center>
                        <div class="card" style="width: 18rem;">
                            <img src="pics/How-to-Write-a-Letter-of-Complaint_720x370.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Lodge a complaint</h5>
                                <p class="card-text">Give a brief desciption of the product and your problem.</p>
                                <a href="customer_lodge_complaint-front.php" class="btn btn-primary">Submit Complaint</a>
                            </div>
                        </div>
                    </center>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="alertSuccess" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php if(isset($_GET['resp'])) echo $_GET['resp']?></h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
