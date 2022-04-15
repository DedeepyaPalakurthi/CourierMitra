<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "registration_form";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if($conn)
{
	//echo "Connection OK";
}
else
{
	echo "Connection Failed".mysqli_connect_error();
}
?>