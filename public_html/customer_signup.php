<!doctype html>
<html lang="en">

<head>
    <title>Register Here</title>
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
            background-image: url(pics/bgcustomersignup.jpg);
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .note {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        .form-content {
            padding: 5%;

            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: -webkit-linear-gradient(right, #0072ff, #8811c5);

            /*background: #0062cc;*/
            color: #fff;
        }

        .btnSubmit:hover {
            transition: ease-in-out all 1s;
            /*background:darkslateblue;*/
            background: -webkit-linear-gradient(left, #0872ff, #8811c5);

        }

        .form-group small {
            color: red;
        }

        * {
            margin: auto;
        }

        /*.box-center {
            position: absolute;
            vertical-align: middle;
            display: webkit-box;
            webkit-box-pack: center;
            webkit-box-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }*/

    </style>
    <script>
        $(document).ready(function() {
            $("#btnClear").click(function() {
                $("#txtName").val("");
                $("#txtMobile").val("");
                $("#txtPwd").val("");
                $("#txtConfirmPwd").val("");
                $("#errPwd").fadeOut();
            });
            //===================================
            $("#txtConfirmPwd").keyup(function() {
                var pwd = $("#txtPwd").val();
                var confirmPwd = $("#txtConfirmPwd").val();
                if (pwd != confirmPwd) {
                    $("#errPwd").fadeIn();
                    $("#btnSubmit").attr("disabled", "true");
                } else if (pwd == confirmPwd) {
                    $("#errPwd").fadeOut();
                    $("#btnSubmit").removeAttr("disabled");
                }
            });

            //===================================
            $("#btnSubmit").click(function() {
                //alert();
                var name = $("#txtName").val();
                var mobile = $("#txtMobile").val();
                var pwd = $("#txtPwd").val();
                var confirmPwd = $("#txtConfirmPwd").val();
                var response;
                if (name == "" || mobile == "" || pwd == "" || confirmPwd == "")
                         alert("Fill all data");
                else if (pwd != confirmPwd)
                         alert("Passwords do not match !");
                else {
                $.get("customer_signup_process.php?txtName=" + name + "&txtMobile=" + mobile + "&txtPwd=" + pwd, function(resp) {
                    if (resp == "Signed Up Successfully...")
                    ("#btnClear").click();  
                    response = resp;
                    alert(response);
                });
                }
            });
        });

    </script>
    <!--<script>
        //===================================
        $(document).ajaxStart(function() {
            /*$("#Processing").addClass("in");
            $(".modal-backdrop").add();*/
            $("#Processing").modal('show');
        });
        //===================================
        $(document).ajaxStop(function() {
            $("#Processing").modal('hide');
            /*$("#Processing").hide();
            $("#Processing").css("display","none");
            $("#Proocessing").removeClass("in");
            $(".modal-backdrop").remove();
            $("#Processing").hide();
            */
        });
        //====================================

    </script>-->
</head>

<body>
    <div class="container  register-form ">
        <div class="form mt-5  box-center">
            <div class="note">
                <p>Register On MicroTrueCare.com</p>
            </div>
            <div class="form-content " style="background-color: white">
                <div class="">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="txtName" required autofocus placeholder="e.g. Anmol Garg">
                    </div>
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="tel" class="form-control" id="txtMobile" required placeholder="Your Contact will be your User ID">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="txtPwd" required placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="txtConfirmPwd" required placeholder="" value="">
                        <small id="errPwd" style="display:none"> Passwords do not match !</small>
                    </div>
                </div>
                <center>
                    <button type="reset" class="btnSubmit" id="btnClear">Clear</button>
                    <button type="button" class="btnSubmit" id="btnSubmit">Submit</button>
                    <a href="customer_login.php" target="_blank">
                        <button type="button" class="btnSubmit" id="">Login</button>
                    </a>
                </center>
            </div>
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="Processing" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="pics/processing.gif" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!--if (response=="Saved") {
     //alert("rfgbhjnkm");
    var msg = "You have successfully signed up on MicroTrueCare.com. Your User ID=" + mobile + "and Password=" + pwd;                    $.get("customer_signup_sms.php?txtMobile=" + mobile + "&msg=" + msg, function(resp) {
    alert(resp);
    });
 }-->
