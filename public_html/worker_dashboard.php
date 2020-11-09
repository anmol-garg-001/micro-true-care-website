<?php
    session_start();
    if(!isset($_SESSION["workerUid"]))
        header("location:worker_login.php");
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
        /*
        #box {
            display: webkit-box;
            webkit-box-pack: center;
            webkit-box-align: center;
        }
*/

        .card img {
            height: 25vh;
        }

        .card {
            border: 0px;
        }

        .card-text {
            height: 50px;
            text-align: center;
        }

    </style>

</head>

<body>

    <div class="container">
        <div class="form-row mt-5 ">
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/customer_my_compalints.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">My Complaints</h5>
                            <p class="card-text">View all the complaints of the customers assigned to you.</p>
                            <a href="worker_my_complaints.php" class="btn btn-primary">See Complaints</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/Update-300x158.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Update Profile</h5>
                            <p class="card-text">Update your personal details you have entered during signup.</p>
                            <a href="worker_update_profile.php" class="btn btn-primary">Update Now</a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-5">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/5bb3272d2000003000002306.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Complaint History</h5>
                            <p class="card-text">See the history of complaints you have solved till date.</p>
                            <a href="worker_complaint_history.php" class="btn btn-primary">See History</a>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
