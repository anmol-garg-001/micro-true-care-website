<?php
    session_start();
    if(!isset($_SESSION["adminUid"]))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Control Panel</title>
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
        #box {
            display: webkit-box;
            webkit-box-pack: center;
            webkit-box-align: center;
        }

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
            if (<?php echo isset($_GET['response'])?>)
                $("#alertSuccess").modal("show");
            $('#alertSuccess').on('hidden.bs.modal', function() {
                window.location.replace("admin_control_panel.php");
            })
        });

    </script>

</head>

<body>

    <div class="container" id="box">
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
                        <a class="nav-link" href="admin_settings.php">Settings</a>
                    </li>

                </ul>
                <form action="admin_logout.php" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
        <div class="form-row mt-5 ">

            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/ezgif.com-webp-to-jpg%20(1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Customer Complaints</h5>
                            <p class="card-text">See the complaints of the customers and assign workers.</p>
                            <a href="allot_workers.php" class="btn btn-primary">View Now</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/How-to-Recruit-for-Seasonal-Workers-More-Effectively.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Details Of Workers</h5>
                            <p class="card-text">Get details of all the workers you have currently.</p>
                            <a href="employee_get_all_details.php" class="btn btn-primary">Get Details</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/customer_details.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Customer Details </h5>
                            <p class="card-text">Get details of all the customers you have currently.</p>
                            <a href="customer_get_all_details.php" class="btn btn-primary">Get Details</a>
                        </div>
                    </div>
                </center>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/3-e1505105897902.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Recruit Workers </h5>
                            <p class="card-text">Add a new worker in your company.</p>
                            <a href="employee-sign-up-form.php" class="btn btn-primary">Recruit Workers</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/b5b7ea231d7749cadf39cdc479513181_19891-factory-worker-cliparts-stock-vector-and-royalty-free-_450-360.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Update Worker Profile</h5>
                            <p class="card-text">Update personal details of a worker.</p>
                            <a href="employee_get_details.php" class="btn btn-primary">Update Now</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/unnamed_history.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Complaints History</h5>
                            <p class="card-text">View the history of complaints lodged till date.</p>
                            <a href="admin_complaint_history.php" class="btn btn-primary">View History</a>
                        </div>
                    </div>
                </center>
            </div>
        </div>

        <div class="modal fade" id="alertSuccess" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php if(isset($_GET['response'])) echo $_GET['response']?></h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
