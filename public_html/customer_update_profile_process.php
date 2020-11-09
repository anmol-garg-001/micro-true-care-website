<?php
  include_once("mysql-connection.php");
$uid=$_GET["txtUid"];
$name=$_GET["txtName"];
$email=$_GET["txtEmail"];

$city=$_GET["txtCity"];
$mobile=$_GET["txtMobile"];
$addr=$_GET["txtAddress"];
$landmark=$_GET["txtLandmark"];


$query="update customers_profile set cname='$name',email='$email',address='$addr',city='$city',landmark='$landmark' where uid='$mobile'";   

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{

	echo "Updated";
}

else
	echo $msg;
?>