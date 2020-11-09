<?php	
    include_once("mysql-connection.php");
    $uid=$_GET["uid"];
    $query="delete from employee_sign_up where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error;
    if($msg=="")
        echo "Deleted";
    else
        echo $msg;
?>