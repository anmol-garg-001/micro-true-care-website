<?php
    session_start();
    include_once("mysql-connection.php");
    include_once("SMS_OK_sms.php");
    $uid=$_SESSION['uid'];
    $product=$_POST["txtProduct"];
    $model=$_POST["txtModel"];
    $dop=$_POST["datePurchase"];
    $timePref=$_POST["timePref"];
    $problem=$_POST["txtProblem"];
    $orgName=$_FILES["billpic"]["name"];
    $tmpName=$_FILES["billpic"]["tmp_name"];
    $query="insert into complaints(uid,product,model,dop,billpic,problem,timings,dateofcomplaint,status,charges,compStatus) values('$uid','$product','$model','$dop','$orgName','$problem','$timePref',current_date(),1,0,'Fresh Complaint')";
        mysqli_query($dbcon,$query);
        $msg=mysqli_error($dbcon);
        if($msg=="")
        {
            move_uploaded_file($tmpName,"uploads/".$orgName);
            SendSMS($uid,"Your Complaint has been successfully lodged. We will try to reach you as soon as possible");
            header('location:customer_dashboard.php?resp=Complaint Lodged Successfully...');
        }

        else
            echo $msg;
?>
