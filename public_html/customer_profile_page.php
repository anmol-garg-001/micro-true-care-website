 <?php
     session_start();
     if(!isset($_SESSION['uid']))
         header("location:customer_login.php");
 ?>
<!doctype html>
<html lang="en">

<head>
    <title>Your Profile</title>
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
        body {

            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            background-attachment: fixed;
        }

        .register {
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

        #btnClear {
            width: 100px;
            margin-right: 10px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $.getJSON("customer-fetch-profile.php?uid=<?php echo $_SESSION['uid']?>", function(jsonAry) {
                    //alert(jsonAry);
                    //alert(JSON.stringify(jsonAry));
                    if (jsonAry.length == 0)
                        alert("Invalid ID");
                    else {
                        //$("#txtEmail").removeAttr("disabled");
                        //$("#txtAddress").removeAttr("disabled");
                        //$("#txtCity").removeAttr("disabled");
                        //$("#txtSpl").removeAttr("disabled");
                        //$("#txtExp").removeAttr("disabled");
                        //$("#txtAadhaar").removeAttr("disabled");
                        //$("#ppic").removeAttr("disabled");
                        //$("#ppic").removeAttr("disabled");
                        //$("#btnUpdate").removeAttr("disabled");
                        //=========================================
                        $("#txtName").val(jsonAry[0].cname);
                        $("#txtEmail").val(jsonAry[0].email);
                        $("#txtAddress").val(jsonAry[0].address);
                        $("#txtCity").val(jsonAry[0].city);
                        $("#txtMobile").val(jsonAry[0].mobile);
                        $("#txtLandmark").val(jsonAry[0].landmark);
                    }
                });
            
            //===============================================
            $("#btnUpdate").click(function() {
                
                var name=$("#txtName").val();
                var email=$("#txtEmail").val();
                var city=$("#txtCity").val();
                var mobile=$("#txtMobile").val();
                var address=$("#txtAddress").val();
                var landmark=$("#txtLandmark").val();
                $.get("customer_update_profile_process.php?txtUid=<?php echo $_SESSION['uid']?>+&txtName="+name+"&txtEmail="+email+"&txtCity="+city+"&txtMobile="+mobile+"&txtAddress="+address+"&txtLandmark="+landmark,function(resp){
                   alert(resp); 
                });
            });
        });
    </script>
</head>

<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="pics/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from completing your profile</p>
                <a href="customer_dashboard.php"><input type="button" value="Home" /></a><br />
            </div>

            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Your Profile </h3>
                        <form >
                            <div class="row register-form">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txtName">Name</label>
                                        <input type="text" class="form-control" placeholder="Your Name" id="txtName" name="txtName">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtCity">City</label>

                                        <input type="text" id="txtCity" name="txtCity" class="form-control" placeholder="Your City" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtAddress">Address</label>

                                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Your Address" value="">
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txtEmail">Email</label>
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Your Email" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="txtMobile">Mobile</label>

                                        <input type="tel" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone" value="" id="txtMobile" name="txtMobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLandmark">Landmark</label>

                                        <input type="text" class="form-control" id="txtLandmark" name="txtLandmark" placeholder="Landmark" value="">
                                    </div>

                                    <input type="button" class="btnRegister" value="Update Profile" id="btnUpdate" name="btnUpdate" formaction="customer_update_profile_process.php">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body></html>
