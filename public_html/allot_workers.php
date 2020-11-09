<?php
    session_start();
    if(!isset($_SESSION["adminUid"]))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Allot Workers</title>
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
        var module = angular.module("MyApp", []);
        module.controller("MyController", function($scope, $http) {
            $scope.jsonAry;
            $scope.doFetch = function() {

                // alert();
                $http.get("get_complaints.php").then(ok, notok);

                function ok(response) {
                    //alert(JSON.stringify(response.data));
                    if (JSON.stringify(response.data) == "[]") {
                        //$("#theTable").css("display","none");
                        $("#noComplaints").fadeIn();
                    } else {
                        $scope.jsonAry = response.data;
                        $("#theTable").fadeIn();
                    }
                }

                function notok(response) {
                    alert(response.data);
                }
            }
            //==============================
            $scope.workers;
            $scope.doOpen = function(cid) {
                $scope.doFill = function() {
                    $("#txtCid").val(cid);
                }
                $scope.doFill();
                $http.get("get_workers.php").then(ok, notok);

                function ok(response) {
                    if (JSON.stringify(response.data) == "[]") {
                        //$("#theTable").css("display","none");
                        $("#noWorkers").fadeIn();
                    } else {
                        $scope.workers = response.data;
                        $("#theWorkers").fadeIn();
                    }
                }

                function notok(response) {
                    alert(response.data);
                }
            }
            //==============================
            $scope.doAllot = function(uid) {
                var response = confirm("Are you sure?");
                if (response == false)
                    return;
                var cid = $("#txtCid").val();
                //alert(uid+"  "+cid);
                $http.get("complaint_update_process.php?cid=" + cid + "&workerId=" + uid).then(ok, notok);

                function ok(success) {
                    alert("Worker Has Been Succesfully Assigned...");
                    $scope.doFetch();
                }

                function notok(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="MyApp" ng-controller="MyController" ng-init="doFetch();">
    <div class="container">
        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Complaints
            </a>
            <span style="display: inline;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin_control_panel.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </span>
        </nav>
        <div style="text-align: center;display: none" class="mt-5" id="noComplaints">
            <h2>No complaints lodged yet.</h2>
        </div>

        <div id="theTable" style="display:none">
            <table class="table table-hover table-borderless table-responsive-lg table-striped" rules="all" border="1">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Complaint ID</th>
                        <th>User ID</th>
                        <th>Product</th>
                        <th>Model No.</th>
                        <th>Bill</th>
                        <th>Problem</th>
                        <th>Time</th>
                        <th>Allot</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="obj in jsonAry">
                        <td>{{$index+1}}</td>
                        <td>{{obj.cid}}</td>
                        <td>{{obj.uid}}</td>
                        <td>{{obj.product}}</td>
                        <td>{{obj.model}}</td>
                        <td><a href="uploads/{{obj.billpic}}"><img src="uploads/{{obj.billpic}}" width="40px" height="40px"></a></td>
                        <td>{{obj.problem}}</td>
                        <td>{{obj.timings}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" ng-click="doOpen(obj.cid);" data-target=".bd-example-modal-lg">Allot Now</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Allot Worker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="">Complaint ID:</label>
                            <input type="text" id="txtCid" readonly class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="">Available Workers:</label>
                            <div style="display:none" id="theWorkers">
                                <table class="table table-hover table-responsive-lg table-striped table-borderless" border="1">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>User ID</th>
                                            <th>Speciality</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Allot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="obj in workers">
                                            <td>{{$index+1}}</td>
                                            <td>{{obj.uid}}</td>
                                            <td>{{obj.spl}}</td>
                                            <td>{{obj.ename}}</td>
                                            <td>{{obj.mobile}}</td>
                                            <td><button class="btn btn-primary" ng-click="doAllot(obj.uid);">Allot</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="display:none;text-align:center" id="noWorkers">
                                <h2>No Workers Available Now</h2>
                            </div>
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
