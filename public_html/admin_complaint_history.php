<?php
    session_start();
    if(!isset($_SESSION["adminUid"]))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Complaints History</title>
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
            $scope.addressAry;
            $scope.doFetch = function() {

                $http.get("admin_get_complaints_history.php").then(ok, notok);

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

        });

    </script>
</head>

<body ng-app="MyApp" ng-controller="MyController" ng-init="doFetch();">
    <div class="container">
        <nav class="navbar navbar-light bg-light mt-3">
            <a class="navbar-brand" href="#">
                <img src="pics/205-2058429_make-complaints-svg-png-icon-free-download-complaints.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Complaints History
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
                        <th>Complaint Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="obj in jsonAry">
                        <td>{{$index+1}}.</td>
                        <td>{{obj.cid}}</td>
                        <td><a href="#" data-toggle="modal" ng-click="doOpen(obj.uid);" data-target=".bd-example-modal-lg">{{obj.uid}}</a></td>
                        <td>{{obj.product}}</td>
                        <td>{{obj.model}}</td>
                        <td><a href="uploads/{{obj.billpic}}"><img src="uploads/{{obj.billpic}}" width="40px" height="40px"></a></td>
                        <td>{{obj.problem}}</td>
                        <td>{{obj.timings}}</td>
                        <td>{{obj.compStatus}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false">
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="obj in addressAry">

                                        <td>{{obj.uid}}</td>
                                        <td>{{obj.mobile}}</td>
                                        <td>{{obj.cname}}</td>
                                        <td>{{obj.address}}</td>

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

    </div>
</body>

</html>
