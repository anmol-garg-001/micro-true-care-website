<?php
	include_once("mysql-connection.php");
$query="select * from employee_sign_up where status=1";
$arry=array();
$table=mysqli_query($dbcon,$query);


while($row=mysqli_fetch_array($table))
{
	$arry[]=$row;
}
echo json_encode($arry);
	

?>