<?php
	session_start();
	include("connection.php");
	//require "connection.php";
	//error_reporting(0);   //Avoiding errors to print on screen
	if(isset($_POST['login']))
	{
		$user_id=$_POST['user_id']; //[name]
		$pwd=$_POST['password'];
		$query="SELECT * FROM USERS WHERE registration_ID='$user_id' AND password='$pwd'";
		$data=mysqli_query($conn, $query);
		if(mysqli_num_rows($data)>0)
		{
			$query1="SELECT * FROM COURIERS WHERE registration_ID='$user_id'";
			$data1=mysqli_query($conn, $query);
			$_SESSION['user_id']=$user_id;
			$query2="SELECT * FROM COURIERSTATUS WHERE registration_ID='$user_id'";
			$data2=mysqli_query($conn, $query);
			if($_SESSION['user_id']==="admin@CourierMitra")
			{
				header('location:AdminPage.php');
			}
			//Valid
			else if((mysqli_num_rows($data1)>0) or (mysqli_num_rows($data2)>0))
			{
				header('location:DetailsPage2.php');
			}
			else
			{
				header('location:DetailsPage1.php');
			}
		}
		else
		{
			//Invalid
			echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
		}
	}
?>