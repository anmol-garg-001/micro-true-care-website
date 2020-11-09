<?php
	include_once("mysql-connection.php");
$cid=$_GET['txtCid'];
$query="select * from complaints where cid='$cid'";
$arry=array();
$table=mysqli_query($dbcon,$query);


while($row=mysqli_fetch_array($table))
{
	$arry[]=$row;
}
echo json_encode($arry);
	

?>