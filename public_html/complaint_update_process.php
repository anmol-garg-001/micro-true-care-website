<?php
    include_once("mysql-connection.php");
    $cid=$_GET["cid"];
    $wid=$_GET["workerId"];
    $query="update complaints set worker='$wid',status=2 where cid='$cid'";
    mysqli_query($dbcon,$query);
    
    $query2="update employee_sign_up set status=0 where uid='$wid'";
    mysqli_query($dbcon,$query2);

    $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "Successfull";
    else 
        echo $msg;
?>