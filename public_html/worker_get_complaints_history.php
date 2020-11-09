<?php
	include_once("mysql-connection.php");
$uid=$_GET["txtUid"];
$query="select * from complaints where  worker='$uid'";
$arry=array();
$table=mysqli_query($dbcon,$query);


while($row=mysqli_fetch_array($table))
{
	$arry[]=$row;
}
echo json_encode($arry);
	

?>