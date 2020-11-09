<?php
    include_once("mysql-connection.php");
    $uid=$_GET["txtUid"];
    $query="select * from customers_profile where uid='$uid'";
    $table=mysqli_query($dbcon,$query);
    $count=mysqli_num_rows($table);
    if($count==0)
        echo "Invalid ID";
    else{
              
        while($row=mysqli_fetch_array($table))
        {
            
            $address=$row['address'];
            $landmark=$row['landmark'];
            $city=$row['city'];
        }
        //$jsonAry=json_encode($arry);
        //echo $jsonAry;
        //echo $adr;
        
        //$json=json_decode($jsonAry,true);
        //echo $json;
        if($address==null||$landmark==null||city==null)
        {
            echo "Incomplete Profile";   
        }
    }
?>