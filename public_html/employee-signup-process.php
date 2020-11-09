<?php
    

include_once("mysql-connection.php");
include_once("SMS_OK_sms.php");
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

$query="insert into employee_sign_up values('$mobile','$name','$name','$email','$addr','$city','$mobile','$exp','$spl','$Aadhaar','$orgName',1,current_date())";

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
	move_uploaded_file($tmpName,"uploads/".$orgName);
//	echo "Saved";
    SendSMS($mobile,"You have successfully signed up on MicroTrueCare.com as a employee Your User ID='$mobile' and Password='$name'");
    header('location:admin_control_panel.php?response=Employee Added Successfully...');
}

else
	echo $msg;
?>
