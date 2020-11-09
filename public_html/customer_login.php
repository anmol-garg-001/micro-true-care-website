<?php
    session_start();
    if(isset($_SESSION["uid"]))
        header("location:customer_dashborad.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/customer_login_util.css">
    <link rel="stylesheet" type="text/css" href="css/customer_login_main.css">
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnLogin").click(function() {
                var uid = $("#txtUid").val();
                var pwd = $("#txtPwd").val();
                if (uid == "" || pwd == "") {
                    alert("Fill all data");
                    //$("#errUid").html("Fill All data");
                    //$("#errUid").show();
                } else {
                    $.get("customer_login_process.php?txtUid=" + uid + "&txtPwd=" + pwd, function(resp) {
                        
                       //alert(resp);
                        if(resp=="Valid"){
                            location.href="customer_dashboard.php";
                        }
                        else if(resp=="Invalid"){
                            alert("Invalid User ID or Password");
                        }
                    });
                }
            });
            //===================================================
            $("#txtPwd").keypress(function(jasus){
                var key=jasus.which;
                if(key==13)
                    {
                        $("#btnLogin").click();
                    }
            });
        });

    </script>

</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" id="txtUid" placeholder="User ID" name="txtUid">
                        <span class="focus-input100"></span>
                        <!-- 
                        <span class="label-input100">User ID</span> -->
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="txtPwd" placeholder="Password" name="txtPwd">
                        <span class="focus-input100"></span>
                        <!-- 
                        <span class="label-input100">Password</span> -->
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" checked name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="customer_signup.php" class="txt1">
                                New User? Sign up now.
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn pointer" id="btnLogin" type="button">
                            Login
                        </button>
                    </div>

                </form>

                <div class="login100-more" style="background-image: url('pics/bg-customer-login-01.jpg');">
                </div>
            </div>
        </div>
    </div>




</body>

</html>
