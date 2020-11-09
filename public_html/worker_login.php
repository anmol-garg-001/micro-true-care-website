<?php
    session_start();
    if(isset($_SESSION["workerUid"]))
        header("location:worker_dashboard.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Worker Login</title>
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
            background-image: url(pics/12303719364_c25cecdc28_b.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
        }


        .card-signin {
            border: 0;
            top: 30%;
            border-radius: 1rem;
            box-shadow: 0px 0px 10px white;
        }

        .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
        }

        .card-signin .card-body {
            padding: 2rem;
        }

        .form-signin {
            width: 100%;
        }

        .form-signin .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input {
            height: auto;
            border-radius: 2rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }

    </style>
    <!--
    <script>
        $(document).ready(function() {

            $("#btnLogin").click(function() {

                var uid = $("#txtUid").val();
                var pwd = $("#txtPwd").val();
                $.getJSON("worker_login_process.php", function(jsonAry) {
                    var adminUid = jsonAry[0].uid;
                    var adminPwd = jsonAry[0].pwd;
                    if (uid == adminUid && pwd == adminPwd) {
                        //alert("you are in");

                        window.location.assign("worker_dashboard.php");
                        //$("#anchor").attr("href","bootstrap-startup.txt");
                        //$("#btnLogin").click(true);
                    } else if (uid == "" || pwd == "") {
                        //$("#errUid").html("Fill All data");
                        //$("#errUid").show();

                        alert("Fill all data");
                    } else if (uid != adminUid || pwd != adminPwd)
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
                    $.get("worker_login_process.php?txtUid=" + uid + "&txtPwd=" + pwd, function(resp) {

                        //alert(resp);
                        if (resp == "Valid") {
                            location.href = "worker_dashboard.php";
                        } else if (resp == "Invalid") {
                            alert("Invalid User ID or Password");
                        }
                    });
                }
            });
            //===================================================
            $("#txtPwd").keypress(function(jasus) {
                var key = jasus.which;
                if (key == 13) {
                    $("#btnLogin").click();
                }
            });
        });

    </script>

</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center"><b>Worker Login</b></h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="txtUid" class="form-control" placeholder="User ID" required autofocus>
                                <label for="txtUid">User ID</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="txtPwd" class="form-control" placeholder="Password" required>
                                <label for="txtPwd">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" id="btnLogin">Sign in</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
