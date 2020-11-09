<?php
include_once("SMS_OK_sms.php");

$mobile=$_GET["mobile"];
$msg=$_GET["msg"];

$msg=SendSMS($mobile,$msg);
echo $msg;
?>