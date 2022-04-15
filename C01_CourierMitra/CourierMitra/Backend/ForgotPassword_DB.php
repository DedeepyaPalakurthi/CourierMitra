<?php
	session_start();
	include("connection.php");
	error_reporting(0);   //Avoiding errors to print on screen
	if(isset($_POST['submit_and_login']))
	{
		$user_id=$_POST['user_id']; //[name]
		$pwd=$_POST['password'];
		$conpwd=$_POST['confirm_password'];
		if($pwd == $conpwd)
		{
			$query="SELECT * FROM USERS WHERE registration_ID ='$user_id'";
			$data=mysqli_query($conn, $query);
			if(mysqli_num_rows($data) > 0)
			{
				//Changing password
				$query="UPDATE USERS SET `password`='$pwd' WHERE registration_ID ='$user_id'";
				$data=mysqli_query($conn, $query);
				if($data > 0)
				{
					echo '<script type="text/javascript"> alert("Your new password '.$pwd.' is set.")</script>';
				}
			}
		}
		else
		{
			echo '<script type="text/javascript"> alert("Password doesnot match")</script>';
		}
	}
?>	
