<?php
    session_start();
    if(!isset($_SESSION["workerUid"]))
        header("location:worker_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Employee Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="pics/icons/download-search.ico">
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
                var txtUid = $("#txtUid").val();
                $.getJSON("employee-fetch-profile.php?uid=<?php echo $_SESSION['workerUid']?>", function(jsonAry) {
                    //alert(jsonAry);
                    //alert(JSON.stringify(jsonAry));
                    if (jsonAry.length == 0)
                        alert("Invalid ID");
                    else {
                        $("#txtName").removeAttr("disabled");
                        $("#txtEmail").removeAttr("disabled");
                        $("#txtAddress").removeAttr("disabled");
                        $("#txtCity").removeAttr("disabled");
                        $("#txtSpl").removeAttr("disabled");
                        $("#txtExp").removeAttr("disabled");
                        //$("#txtMobile").removeAttr("disabled");
                        $("#txtAadhaar").removeAttr("disabled");
                        $("#ppic").removeAttr("disabled");
                        $("#ppic").removeAttr("disabled");
                        $("#btnUpdate").removeAttr("disabled");
                        //=========================================
                        $("#txtUid").val(jsonAry[0].uid);
                        $("#txtName").val(jsonAry[0].ename);
                        $("#txtEmail").val(jsonAry[0].email);
                        $("#txtAddress").val(jsonAry[0].addr);
                        $("#txtCity").val(jsonAry[0].city);
                        $("#txtMobile").val(jsonAry[0].mobile);
                        $("#txtSpl").val(jsonAry[0].spl);
                        $("#txtExp").val(jsonAry[0].exp);
                        $("#txtAadhaar").val(jsonAry[0].aadhaar);
                        $("#prev").slideDown();
                        $("#prev").prop("src", "uploads/" + jsonAry[0].ppic);
                    }
                });
            //===============================================================================
            
        });

    </script>
     <script>
        $(document).ready(function() {
            if (<?php echo isset($_GET['response'])?>)
                $("#alertSuccess").modal("show");
            $('#alertSuccess').on('hidden.bs.modal', function() {
                window.location.replace("worker_update_profile.php");
            })
        });

    </script>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/download-search.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Update Profile
            </a>
            
             <span style="display: inline;" >
                 <ul class="navbar-nav" >
                    <li class="nav-item active" >
                        <a class="nav-link" href="worker_dashboard.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                 </ul>
            </span>
        </nav>
        <form class="mt-4" method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtUid">User ID</label>
                    <input type="text" style="margin-top:15px" readonly class="form-control" id="txtUid" name="txtUid">
                </div>

                <div class="form-group col-md-4">
                    <label for="txtUid">Profile Pic</label>
                    <input disabled type="file" class="mt-3" id="ppic" name="ppic" onchange="showpreview(this,prev)">

                </div>
                <div class="form-group col-md-2">
                    <img alt="" width="100" height="100" id="prev">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="txtName">Name</label>
                    <input type="text" disabled class="form-control" id="txtName" name="txtName">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtEmail">Email</label>
                    <input disabled type="email" class="form-control" id="txtEmail" name="txtEmail">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-4">
                    <label for="txtAddress">Address</label>
                    <input disabled type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="1234 Main St">
                </div>

                <div class="form-group col-md-4">
                    <label for="txtCity">City</label>
                    <input disabled type="text" class="form-control" id="txtCity" name="txtCity" placeholder="Bathinda,Barnala">
                </div>

                <div class="form-group col-md-4">
                    <label for="txtMobile">Mobile</label>
                    <input readonly type="text" class="form-control" id="txtMobile" name="txtMobile">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtSpl">Speciality</label>
                    <input disabled type="text" class="form-control" id="txtSpl" name="txtSpl">
                </div>
                <div class="form-group col-md-4">
                    <label for="txtAadhaar">Aadhaar</label>
                    <input disabled type="text" class="form-control" id="txtAadhaar" name="txtAadhaar">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Experience</label>
                    <input disabled type="text" class="form-control" id="txtExp" name="txtExp">

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
                <button disabled id="btnUpdate" class="btn btn-primary" formaction="worker-update-process.php">Update</button>
            </center>

        </form>
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
