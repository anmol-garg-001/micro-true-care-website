<?php
    session_start();
    if(!isset($_SESSION["uid"]))
        header("location:customer_login.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>My Complaints </title>
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

                // alert($("#"+uid).val());

                //alert(uid);
                $http.get("customer_get_complaints.php?txtUid=<?php echo $_SESSION['uid']?>").then(ok, notok);

                function ok(response) {

                    //alert(JSON.stringify(response.data));
                    if(JSON.stringify(response.data)=="[]")
                        {
                            //$("#theTable").css("display","none");
                            $("#noComplaints").fadeIn();
                        }
                    else
                        {
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
                My Complaints
            </a>
            <span style="display: inline;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="customer_dashboard.php"><button class="btn btn-outline-primary">Home</button> <span class="sr-only">(current)</span></a>
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

                        <th>Product</th>
                        <th>Model No.</th>
                        <th>Bill</th>
                        <th>Problem</th>
                        <th>Timing</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="obj in jsonAry">
                        <td>{{$index+1}}</td>
                        <td>{{obj.cid}}</td>

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

    </div>
</body>

</html>
