<?php
	include_once("mysql-connection.php");
$uid=$_GET["uid"];
$query="select * from customers_profile where uid='$uid'";
$arry=array();
$table=mysqli_query($dbcon,$query);


while($row=mysqli_fetch_array($table))
{
	$arry[]=$row;
}
echo json_encode($arry);
	

?>