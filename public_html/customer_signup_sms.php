<?php
include_once("SMS_OK_sms.php");

$mobile=$_GET["txtMobile"];
$msg=$_GET["msg"];

$msg=SendSMS($mobile,$msg);
echo $msg;
?>