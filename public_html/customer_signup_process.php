<?php
    include_once("mysql-connection.php");
    include_once("SMS_OK_sms.php");
    $name=$_GET["txtName"];  
    $mobile=$_GET["txtMobile"];  
    $pwd=$_GET["txtPwd"];
    $query="insert into customers_profile(uid,pwd,cname,mobile) values('$mobile','$pwd','$name','$mobile')";    
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
    {
        $success="Signed Up Successfully...";
        echo $success;
        SendSMS($mobile,"You have successfully signed up on MicroTrueCare.com Your User ID='$mobile' and Password='$pwd'");
    }

    else
        echo $msg;
    
?>

