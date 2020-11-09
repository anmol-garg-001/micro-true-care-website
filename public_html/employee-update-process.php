<?php
    

include_once("mysql-connection.php");

$name=$_POST["txtName"];
$email=$_POST["txtEmail"];
$addr=$_POST["txtAddress"];
$city=$_POST["txtCity"];
$mobile=$_POST["txtMobile"];
$spl=$_POST["txtSpl"];
$exp=$_POST["txtExp"];
$Aadhaar=$_POST["txtAadhaar"];
$orgName=$_FILES["ppic"]["name"];
$tmpName=$_FILES["ppic"]["tmp_name"];
if($orgName=="")
{

$query="update employee_sign_up set ename='$name',email='$email',addr='$addr',city='$city',mobile='$mobile',exp=$exp,spl='$spl',aadhaar='$Aadhaar' where uid='$mobile'";   
}
else{
    

$query="update employee_sign_up set ename='$name',email='$email',addr='$addr',city='$city',mobile='$mobile',exp=$exp,spl='$spl',aadhaar='$Aadhaar',ppic='$orgName' where uid='$mobile'";
    	move_uploaded_file($tmpName,"uploads/".$orgName);
}
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
	echo "Updated";
}

else
	echo $msg;
?>
