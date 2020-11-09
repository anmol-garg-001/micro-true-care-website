<?php
    session_start();
    if(!isset($_SESSION["adminUid"]))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Employee Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="pics/icons/157-1573079_add-employee-svg-png-icon-free-download-new.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
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
            
            //===============================================================================
            $("#btnClear").click(function() {
                $("#btnSignUp").removeAttr("disabled");
                $("#prev").removeAttr("src");
                $("#prev").show();
                $("#txtName").removeAttr("readonly");
                $("#txtMobile").removeAttr("readonly");
            });
        });

    </script>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/157-1573079_add-employee-svg-png-icon-free-download-new.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Emloyee Recruitment
            </a>
            
             <span style="display: inline;" >
                 <ul class="navbar-nav" >
                    <li class="nav-item active" >
                        <a class="nav-link" href="admin_control_panel.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                 </ul>
            </span>
        </nav>
        <form class="mt-4" method="post" enctype="multipart/form-data">

            <div class="form-row">

                <div class="form-group col-md-6 mt-3 offset-2">
                    <label for="txtUid">Profile Pic</label>
                    <input type="file" class="mt-3" id="ppic" name="ppic" onchange="showpreview(this,prev)">

                </div>
                <div class="form-group col-md-4">
                    <img alt="" width="100" height="100" id="prev">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="txtName">Name</label>
                    <input type="text" class="form-control" id="txtName" name="txtName">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtEmail">Email</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-4">
                    <label for="txtAddress">Address</label>
                    <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="1234 Main St">
                </div>

                <div class="form-group col-md-4">
                    <label for="txtCity">City</label>
                    <input type="text" class="form-control" id="txtCity" name="txtCity" placeholder="Bathinda,Barnala">
                </div>

                <div class="form-group col-md-4">
                    <label for="txtMobile">Mobile</label>
                    <input type="text" class="form-control" id="txtMobile" name="txtMobile">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtSpl">Speciality</label>
                    <input type="text" class="form-control" id="txtSpl" name="txtSpl">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Experience</label>
                    <input type="text" class="form-control" id="txtExp" name="txtExp">

                </div>
                <div class="form-group col-md-2">
                    <label for="txtAadhaar">Aadhaar</label>
                    <input type="text" class="form-control" id="txtAadhaar" name="txtAadhaar">
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
                <button type="submit" class="btn btn-primary" formaction="employee-signup-process.php" id="btnSignUp">Sign Up</button>
                <input type="reset" class="btn btn-primary" id="btnClear" value="Clear">
            </center>

        </form>
    </div>
</body>

</html>
