<?php
include_once("mysql-connection.php");
$uid=$_GET["txtUid"];
$pwd=$_GET["txtPwd"];
$query="select uid,pwd from employee_sign_up where uid='$uid'";
$table=mysqli_query($dbcon,$query);
$arry=array();
while($row=mysqli_fetch_array($table))
{
	$cuid=$row['uid'];
	$cpwd=$row['pwd'];
}
if($uid==$cuid&&$pwd==$cpwd)
{
    echo "Valid";
    session_start();
    $_SESSION['workerUid']=$uid;
}
elseif($uid!=$cuid||$pwd!=$cpwd)
{
    echo "Invalid";
}

?>