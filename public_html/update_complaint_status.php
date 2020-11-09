<?php
session_start();
$_uid=$_SESSION['workerUid'];
  include_once("mysql-connection.php");
$cid=$_GET["txtCid"];
$compStatus=$_GET["txtCompStatus"];
$status=$_GET["txtStatus"];
$dateofvisit=$_GET["txtDate"];
$charges=$_GET["txtCharges"];

$query="update complaints set compStatus='$compStatus',status='$status',dateofvisit='$dateofvisit',charges='$charges' where cid='$cid'";   

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{

	echo "Status Updated Successfully...";
}

else
	echo $msg;
if($status=="0")
{
    $query2="update employee_sign_up set status=1 where uid='$_uid'";
    mysqli_query($dbcon,$query2);
}
?>