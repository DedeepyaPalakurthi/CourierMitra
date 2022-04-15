<?php
include("connection.php");
session_start();
error_reporting(0);   //Avoiding errors to print on screen
?>
<?php
if(isset($_POST['submit']))
{
	$fn=$_POST['full_name'];
	$_SESSION['fn']=$fn;
	$user_id=$_POST['user_id'];
	$clg_name=$_POST['clg_name'];
	$_SESSION['clg_name']=$clg_name;
	$department=$_POST['dept'];
	$_SESSION['department']=$department;
	$email=$_POST['email'];
	$_SESSION['email'] = $email;
	$pwd=$_POST['password'];
	$conpwd=$_POST['confirm_password'];
	if($pwd == $conpwd)
	{
		$query="SELECT * FROM USERS WHERE registration_ID ='$user_id'";
		$data=mysqli_query($conn, $query);
		if(mysqli_num_rows($data) > 0)
		{
			//User already exists
			echo '<script type="text/javascript"> alert("User already exists... Try another user_id")</script>';
		}
		else
		{
			$default_contact = 0000000000;
			$default_courier_id = 123456789;
			$null = null;
			$query1="INSERT INTO USERS VALUES('$user_id', '$fn', '$clg_name', '$department', '$email', '$pwd')";
			$data1=mysqli_query($conn, $query1);
			if($data1 > 0)
			{
				$query2="INSERT INTO USERS_RECORD VALUES('$user_id', '$fn', '$clg_name', '$department', '$email', '$default_contact', '$default_courier_id', '$null', '$null', '$null', '$null', '$null')";
				$data2=mysqli_query($conn, $query2);
				if($data2 > 0)
				{
					echo '<script type="text/javascript"> alert("User registered... Go to the login page to login")</script>';
					$to_email= "$email";
					$subject = "Successful Registration for CourierMitra";
					$body = "Hi $fn, You have registered succesfully.
					Welcome to CourierMitra. 
					Now you can use our courier services. Thankyou.";
					$headers = "From: dedeepyapalakurthi@gmail.com";

					if (mail($to_email, $subject, $body, $headers)) {
					    echo '<script type="text/javascript"> alert("Email successfully sent to ... '.$to_email.'")</script>';
					} else {
					    echo "<h2>Email sending failed...to_email</h2>";
					}
					//https://myaccount.google.com/u/3/security?pli=1&nlr=1
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Error!")</script>';
			}
		}
	}
	else
	{
		echo '<script type="text/javascript"> alert("Password doesnot match")</script>';
	}
}
?>
