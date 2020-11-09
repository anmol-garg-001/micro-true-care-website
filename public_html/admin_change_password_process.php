<?php
    include_once("mysql-connection.php");
    $uid=$_GET["txtUid"];
    $oldPwd=$_GET["txtOldPwd"];
    $newPwd=$_GET["txtNewPwd"];
    $query="select pwd from admin_login where uid='$uid'";
    $table=mysqli_query($dbcon,$query);
    $count=mysqli_num_rows($table);
    if($count==0)
        echo "Invalid ID";
    else{
      $arry=array();
      $arry= mysqli_fetch_array($table);
        if($arry['pwd']==$oldPwd)
        {
            $query="update admin_login set pwd='$newPwd' where uid='$uid'";
            mysqli_query($dbcon,$query);
            echo "Password Updated Successfully";
            
        }
        else{
            echo "Your entered old password is incorrect";
        }
    }
?>