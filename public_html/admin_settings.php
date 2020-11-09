<?php
    session_start();
    $uid=$_SESSION['adminUid'];
    if(!isset($uid))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Settings</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="pics/icons/112-1121340_settings-logo-png-white-png-download-setting-icon%20(1).ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
                $("#btnSubmit").click(function() {
                // var uid=$("#txtUid").val();
                var res = confirm("Are You Sure?");
                if (res == false)
                    return;
                var oldPwd = $("#txtOldPwd").val();
                var newPwd = $("#txtNewPwd").val();
                $.get("admin_change_password_process.php?txtUid=<?php echo $uid?>&txtOldPwd=" + oldPwd + "&txtNewPwd=" + newPwd, function(resp) {
                    alert(resp);
                });
            });
        });

    </script>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/112-1121340_settings-logo-png-white-png-download-setting-icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Settings  
            </a>
            
             <span style="display: inline;" >
                 <ul class="navbar-nav" >
                    <li class="nav-item active" >
                        <a class="nav-link" href="admin_control_panel.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                 </ul>
            </span>
        </nav>
        <form>
            <div class="form-row">

                <div class="col-md-8" style="margin: auto">

                    <div class="form-group mt-5">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" class="form-control" id="txtOldPwd" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="txtNewPwd" placeholder="New Password">
                    </div>
                    <button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Clear</button>
                </div>

            </div>
        </form>
    </div>
</body>

</html>
