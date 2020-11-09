<?php
    session_start();
    if(isset($_SESSION["adminUid"]))
        header("location:admin_control_panel.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="pics/icons/favicon.ico" />
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
    <link rel="stylesheet" type="text/css" href="css/admin_login_util.css">
    <link rel="stylesheet" type="text/css" href="css/admin_login_main.css">
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
    <!--===============================================================================================-->
<!--
    <script>
        $(document).ready(function(){
            
            $("#btnLogin").click(function(){
                
               var uid=$("#txtUid").val(); 
               var pwd=$("#txtPwd").val();
                $.getJSON("admin_login_process.php",function(jsonAry){
                    var adminUid=jsonAry[0].uid;
                    var adminPwd=jsonAry[0].pwd;
                    if(uid==adminUid&&pwd==adminPwd){
                        //alert("you are in");
                        
                        window.location.assign("admin_control_panel.php");
                        //$("#anchor").attr("href","bootstrap-startup.txt");
                        //$("#btnLogin").click(true);
                    }
                    else if(uid==""||pwd==""){
                        //$("#errUid").html("Fill All data");
                        //$("#errUid").show();
                
                       alert("Fill all data");
                    }
                    else if(uid!=adminUid||pwd!=adminPwd)
                        alert("Wrong User Id or Password");
                });
            });
        });
    </script>
-->

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
                    $.get("admin_login_process.php?txtUid=" + uid + "&txtPwd=" + pwd, function(resp) {
                        
                       //alert(resp);
                        if(resp=="Valid"){
                            location.href="admin_control_panel.php";
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

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('pics/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Login
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" >

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="txtUid" id="txtUid" placeholder="User name">
                        <span class="focus-input100" id="errUid" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" id="txtPwd" name="txtPwd" placeholder="Password">
                        <span class="focus-input100" id="errPwd" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <!-- <a id="anchor"></a> -->
                            <button class="login100-form-btn" type="button" id="btnLogin">
                               Login
                            </button>                      
                    </div>
                </form>
            </div>
        </div>
    </div>


    

</body></html>