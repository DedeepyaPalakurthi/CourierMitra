<?php
	session_start();
	include("connection.php");
	//error_reporting(0);   //Avoiding errors to print on screen
	
	if(isset($_POST['submit']))
	{
		$user_id = $_SESSION['user_id'];
		$courier_name=$_POST['courier_name']; //[name]
		$courier_id=$_POST['courier_id'];
		$_SESSION['courier_id'] = $courier_id;
		$date_of_arrival=$_POST['date_of_arrival'];
		$contact_no=$_POST['contact_no'];
		$query="INSERT INTO COURIERS VALUES('$user_id', '$courier_id', '$courier_name', '$date_of_arrival', '$contact_no', CURRENT_TIMESTAMP)";
		$data=mysqli_query($conn, $query);
		if($data > 0)
		{
			$default_courier_id=123456789;
			$query="SELECT * FROM USERS_RECORD WHERE registration_ID='$user_id'";
			$data=mysqli_query($conn, $query);
			if(mysqli_num_rows($data))
			{
				$query = "SELECT * FROM USERS WHERE Registration_ID='$user_id'";
				if($result = mysqli_query($conn, $query))
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$field2name = $row["full_name"];
						$field3name = $row["college_name"];
						$field4name = $row["department"];
						$field5name = $row["mail_id"];
						$email = $field5name;
					}
				}
				
				$null=null;
				$query="INSERT INTO USERS_RECORD VALUES('$user_id', '$field2name', '$field3name', '$field4name', '$field5name', '$contact_no', '$courier_id', '$courier_name', CURRENT_TIMESTAMP, '$null', '$null', '$null')";
				$data=mysqli_query($conn, $query);
				if($data > 0)
				{
					//echo $user_id, $field2name;
					$query="DELETE FROM USERS_RECORD WHERE courier_id='$default_courier_id'";
				    $data=mysqli_query($conn, $query);
					echo '<script type="text/javascript"> alert("Data inserted into the database")</script>';
					//$email = $_SESSION['$email'];
					$to_email= $email;
					$subject = "Courier details are successfully saved";
					$body = "Hi $user_id,
					Courier Details :
					Name : $courier_name
					Courier ID : $courier_id
					are noted. Wait for further status";
					$headers = "From: dedeepyapalakurthi@gmail.com";

					if (mail($to_email, $subject, $body, $headers)) {
					echo '<script type="text/javascript"> alert("Email successfully sent to ... '.$to_email.'")</script>';
					} 
					else {
					    echo "<h2>Email sending failed...to_email</h2>";
					}

					//https://myaccount.google.com/u/3/security?pli=1&nlr=1
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Failed to update")</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error! Please fill the details again")</script>';
		}
	}
?>
