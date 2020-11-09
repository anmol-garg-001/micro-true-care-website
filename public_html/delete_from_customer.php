<?php	
    include_once("mysql-connection.php");
    $uid=$_GET["uid"];
    $query="delete from customers_profile where uid='$uid'";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "Deleted";
    else
        echo $msg;
?>