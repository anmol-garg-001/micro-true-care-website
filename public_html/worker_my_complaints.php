<?php
    session_start();
    if(!isset($_SESSION["workerUid"]))
        header("location:worker_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>My Complaints</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        table img:hover {
            cursor: pointer;
            transform: scale(4);
            transition: ease all 0.5s;
            box-shadow: 5px 5px 5px grey;
        }
    </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnUpdate").click(function() {
                //alert(); 
                var resp = confirm("Are You Sure?");
                if (resp == false)
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
                var charges = $("#txtCharges").val();
                $.get("update_complaint_status.php?txtCid=" + cid + "&txtCompStatus=" + compStatus + "&txtStatus=" + status + "&txtDate=" + dateofvisit + "&txtCharges=" + charges, function(response) {
                    alert(response);
                    window.location.reload(true);
                });
            });
        });

    </script>
    <script>
        var module = angular.module("MyApp", []);
        module.controller("MyController", function($scope, $http) {
            $scope.jsonAry;
            $scope.addressAry;
            $scope.doFetch = function() {

                // alert($("#"+uid).val());
                var uid = $("#txtUid").val();
                //alert(uid);
                $http.get("worker_get_complaints.php?txtUid=<?php echo $_SESSION["workerUid"]?>").then(ok, notok);

                function ok(response) {

                    //alert(JSON.stringify(response.data));
                    if(JSON.stringify(response.data)=="[]")
                        {
                            $("#theTable").css("display","none");
                            $("#noComplaints").fadeIn();
                        }
                    else
                        {
                            $scope.jsonAry = response.data;
                            $("#noComplaints").css("display","none");
                            $("#theTable").fadeIn();
                        }
                }

                function notok(response) {
                    alert(response.data);
                }

            }
            //==============================

            $scope.doOpen = function(uid) {
                $http.get("worker_get_customer_details.php?txtUid=" + uid).then(ok, notok);

                function ok(response) {

                    //alert(JSON.stringify(response.data));
                    $scope.addressAry = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }
            }
            //==============================
            $scope.doUpdate=function(cid){
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
                        $("#txtCid").val(cid);
                        $("#txtStatus").val(jsomAry[0].compStatus);
                        $("#txtCharges").val(jsomAry[0].charges);
                        $("#txtDate").val(jsomAry[0].dateofvisit);
                    }
                });
            }
            $("#modalUpdateStatus").on('hidden.bs.modal', function() {
                $scope.doFetch();
            });
        });

    </script>
</head>

<body ng-app="MyApp" ng-controller="MyController" ng-init="doFetch();">
    <div class="container">
        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                My Complaints
            </a>
            <span style="display: inline;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="worker_dashboard.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </span>
        </nav>
        
        <div style="text-align: center;display: none" class="mt-5" id="noComplaints">
            <h2>No complaints assigned yet.</h2>
        </div>

        <div id="theTable" style="display:none">
            <table class="table table-hover table-borderless table-responsive-lg table-striped" rules="all" border="1">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Complaint ID</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Model No.</th>
                        <th>Bill</th>
                        <th>Problem</th>
                        <th>Time</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="obj in jsonAry">
                        <td>{{$index+1}}</td>
                        <td>{{obj.cid}}</td>
                        <td><a href="#" data-toggle="modal" data-toggle="tooltip" data-placement="right" title="Click Here to see customer details." ng-click="doOpen(obj.uid);" data-target="#modalCustomerDetails">{{obj.uid}}</a></td>
                        <td>{{obj.product}}</td>
                        <td>{{obj.model}}</td>
                        <td><a href="uploads/{{obj.billpic}}"><img src="uploads/{{obj.billpic}}" width="40px" height="40px"></a></td>
                        <td>{{obj.problem}}</td>
                        <td>{{obj.timings}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-toggle="tooltip" data-placement="right" title="Click Here to update complaint status." ng-click="doUpdate(obj.cid);" data-target="#modalUpdateStatus">Update Now</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modalCustomerDetails" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Customer Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-3">

                            <table class="table table-hover table-responsive-lg table-striped table-borderless" border="1">
                                <thead>
                                    <tr>

                                        <th>User ID</th>
                                        <th>Contact</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Landmark</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="obj in addressAry">

                                        <td>{{obj.uid}}</td>
                                        <td><a href="tel:{{obj.mobile}}">{{obj.mobile}}</a></td>
                                        <td>{{obj.cname}}</td>
                                        <td>{{obj.address}}</td>
                                        <td>{{obj.landmark}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modalUpdateStatus" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-10" style="margin: auto">
                            <form class="mt-4" method="post" enctype="multipart/form-data" id="complaint">

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="txtUid">Complaint ID</label>
                                        <input type="text" class="form-control" disabled id="txtCid" name="txtCid" required>
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
                                        <input type="text" disabled class="form-control" id="txtCharges" value="0" required>
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
                                </center>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
