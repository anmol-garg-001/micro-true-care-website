<?php
    session_start();
    if(!isset($_SESSION["workerUid"]))
        header("location:worker_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Update Complaint Status</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnClear").click(function() {
                $("#txtStatus").attr("disabled", "true");
                $("#txtCharges").attr("disabled", "true");
                $("#chkResolved").attr("disabled", "true");
                $("#chkPending").attr("disabled", "true");
                $("#txtDate").attr("disabled", "true");
                $("#btnUpdate").attr("disabled", "true");
            });
            //===========================================
            $("#btnFetch").click(function() {
                //alert();
                var cid = $("#txtCid").val();
                $.getJSON("get_complaint_status.php?txtCid=" + cid, function(jsomAry) {
                    if (jsomAry.length == 0)
                        alert("Invalid Complaint ID");
                    else {
                        $("#txtStatus").removeAttr("disabled");
                        $("#txtCharges").removeAttr("disabled");
                        $("#chkResolved").removeAttr("disabled");
                        $("#chkPending").removeAttr("disabled");
                        $("#txtDate").removeAttr("disabled");
                        $("#btnUpdate").removeAttr("disabled");
                        var status = jsomAry[0].status;
                        if (status == 0)
                            $("#chkResolved").prop("checked", "true");
                        else
                            $("#chkPending").prop("checked", "true");
                        //alert(status);
                        $("#txtStatus").val(jsomAry[0].compStatus);
                        $("#txtCharges").val(jsomAry[0].charges);
                        $("#txtDate").val(jsomAry[0].dateofvisit);
                    }
                });
            });
            //=============================================
            $("#btnUpdate").click(function() {
                //alert(); 
                var resp=confirm("Are You Sure?");
                if(resp==false)
                    return;
                var cid = $("#txtCid").val();
                var compStatus = $("#txtStatus").val();
                var status;
                if ($("#chkResolved").prop("checked") == true) {
                    status = $("#chkResolved").val();
                    //alert(status);
                }
                if ($("#chkPending").prop("checked") == true) {
                    status = $("#chkPending").val();
                    //alert(status);
                }
                var dateofvisit = $("#txtDate").val();
                var charges=$("#txtCharges").val();
                $.get("update_complaint_status.php?txtCid="+cid+"&txtCompStatus="+compStatus+"&txtStatus="+status+"&txtDate="+dateofvisit+"&txtCharges="+charges,function(response){
                    alert(response);
                });
            });
        });

    </script>

</head>

<body>

    <div class="container">
        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Update Status
            </a>
            <span style="display: inline;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="worker_dashboard.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </span>
        </nav>
        <div class="col-md-6" style="margin: auto">
            <form class="mt-4" method="post" enctype="multipart/form-data" id="complaint">

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="txtUid">Complaint ID</label>
                        <input type="button" class="btn btn-success mb-2" id="btnFetch" value="Search" required>

                        <input type="text" class="form-control" id="txtCid" name="txtCid" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtSpl">Complaint Status</label>
                        <textarea class="form-control" disabled id="txtStatus" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-radio-input" type="radio" name="problem" value="0" id="chkResolved">
                        <label class="form-radio-label" for="gridCheck">
                            Resolved
                        </label>


                        <input class="form-radio-input" value="-1" type="radio" name="problem" id="chkPending">
                        <label class="form-radio-label" for="gridCheck">
                            Pending
                        </label>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtDate">Date Of Visit</label>
                        <input type="date" disabled class="form-control" id="txtDate">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="txtCharges">Charges(Rs.)</label>
                        <input type="text" disabled class="form-control" id="txtCharges" value="0"  required>
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
                    <button type="button" class="btn btn-primary" id="btnUpdate" disabled>Update</button>
                    <input type="reset" class="btn btn-primary" id="btnClear" value="Clear">
                </center>

            </form>
        </div>
    </div>
</body>

</html>
