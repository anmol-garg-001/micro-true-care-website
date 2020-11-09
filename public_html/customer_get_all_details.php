<?php
    session_start();
    if(!isset($_SESSION["adminUid"]))
        header("location:admin_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        var module = angular.module("MyApp", []);
        module.controller("MyController", function($scope, $http) {
            $scope.doFetch = function() {
                // alert();
                $http.get("customer_get_details_process.php").then(ok, notok);

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
            $scope.doDelete = function(uid) {
                //alert(uid);
                var response = confirm("Are you sure?");
                if (response == false)
                    return;
                $http.get("delete_from_customer.php?uid=" + uid).then(ok, notok);

                function ok(response) {
                    $scope.doFetch();
                }

                function notok(response) {
                    alert(response);
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
                Customer Details
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
            <table class="table table-hover table-responsive table-borderless table-striped" rules="all" border="1">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Landmark</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="obj in jsonAry">
                        <td>{{$index+1}}</td>
                        <td>{{obj.uid}}</td>
                        <td>{{obj.pwd}}</td>
                        <td>{{obj.cname}}</td>
                        <td>{{obj.address}}</td>
                        <td>{{obj.landmark}}</td>
                        <td>{{obj.city}}</td>
                        <td>{{obj.mobile}}</td>
                        <td>{{obj.email}}</td>
                        <td><button class="btn btn-primary" ng-click="doDelete(obj.uid);">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
