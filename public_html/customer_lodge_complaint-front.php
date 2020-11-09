<?php
    session_start();
    if(!isset($_SESSION["uid"]))
        header("location:customer_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Lodge complaint</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="pics/icons/205-2058429_make-complaints-svg-png-icon-free-download-complaints.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
        label {
            font-weight: bold;
        }

    </style>
    <script>
        function showpreview(file, Id) {

            if (file.files && file.files[0]) {
                $("#prev").slideDown();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(Id).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>
    <script>
        $(document).ready(function() {
              $("#complaint").css("display", "none");
            //===============================================================================
            $.get("customer_complaint_profile_check.php?txtUid=<?php echo $_SESSION['uid']?>", function(resp) {
                if (resp == "Invalid ID")
                    alert(resp);
                else if (resp == "Incomplete Profile") {
                    $("#complaint").css("display", "none");
                    $("#errProfile").css("display", "block");
                }
                else{
                    $("#complaint").css("display", "block");   
                }
            });

            //alert($("#txtProblem").val());
            //===============================================================================
            $("#btnClear").click(function() {
                $("#btnSignUp").removeAttr("disabled");
                $("#prev").removeAttr("src");
                $("#prev").show();
            });


        });

    </script>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Lodge Complaint
            </a>
            <span style="display: inline;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="customer_dashboard.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </span>
        </nav>
        <form class="mt-4" method="post" enctype="multipart/form-data" id="complaint">

            <div class="form-row">

                <div class="form-group col-md-12" >
                    <label for="txtEmail">Product</label>
                    <input type="text" class="form-control" id="txtProduct" name="txtProduct" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-9 ">
                    <label for="ppic">Bill Image</label>
                    <input type="file" id="billpic" name="billpic" class="form-control-file" onchange="showpreview(this,prev)">
                </div>
                <div class="form-group col-md-3">
                    <img alt="" width="100" height="100" id="prev">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-4">
                    <label for="txtAddress">Model Number</label>
                    <input type="text" class="form-control" id="txtModel" name="txtModel" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="txtCity">Date Of Purchase</label>
                    <input type="date" class="form-control" id="datePurchase" name="datePurchase" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="txtCity">Preferrable Timing For Assistance</label>
                    <input type="time" class="form-control" id="timePref" name="timePref" required>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="txtSpl">What's the problem?</label>
                    <textarea class="form-control" aria-label="What's the problem?" name="txtProblem" id="txtProblem" required></textarea>
                </div>
            </div>
            <!-- 
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
             -->
            <center>
<!--                <a href="customer_dashboard.php"><input type="button" class="btn btn-primary" value="Back"></a>-->
                <button type="submit" class="btn btn-primary" formaction="customer_lodge_complaint_process.php" id="btnSubmit">Submit</button>
                <input type="reset" class="btn btn-primary" id="btnClear" value="Clear">
            </center>

        </form>
        <div style="text-align: center;display: none" class="mt-5" id="errProfile">
            <h2>You have not completed your profile yet. Please complete it first to lodge your complaint. </h2>
            <a href="customer_profile_page.php">Redirect to the profile page</a>
        </div>
    </div>

</body>

</html>
