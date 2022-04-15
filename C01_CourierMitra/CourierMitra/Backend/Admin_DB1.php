<?php
	include("connection.php");
	session_start();
	//error_reporting(0);   //Avoiding errors to print on screen
	//echo $_GET["update"];
?>
<?php
	$regd_ID = $_GET['regd_id'];
	$cour_ID = $_GET['cour_id'];
	$cour_name = $_GET['cour_name'];
	$courier_status = "Received";
		$query = "INSERT INTO COURIERSTATUS VALUES('$regd_ID', '$cour_ID', '$courier_status', '$cour_name')";
		$data = mysqli_query($conn, $query);
		if($data > 0)
		{
			$query = "UPDATE USERS_RECORD SET courier_status='$courier_status', date_of_received=CURRENT_TIMESTAMP WHERE courier_id='$cour_ID'";
			$data = mysqli_query($conn, $query);
			echo '<script type="text/javascript"> alert("Data updated")</script><br>';
			$query = "SELECT * FROM USERS WHERE Registration_ID='$regd_ID'";
			if($result = mysqli_query($conn, $query))
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$field5name = $row["mail_id"];
					$email = $field5name;
				}
			}
			$to_email= "$email";
			$subject = "Courier status : Received";
			$body = "Hi $regd_ID,
			From CourierMitra
			Your courier $cour_name of courier ID : $cour_ID is receieved.
			Please come and collect it.
			Thankyou.";
			$headers = "From: dedeepyapalakurthi@gmail.com";

			if (mail($to_email, $subject, $body, $headers)) {
 			   echo '<script type="text/javascript"> alert("Email successfully sent to ... '.$to_email.'")</script>';
			} 
			else {
			    echo "<h2>Email sending failed...to_email</h2>";
			}
			//https://myaccount.google.com/u/3/security?pli=1&nlr=1
		}
		else
		{
			echo '<script type="text/javascript"> alert("Failed to update")</script><br>';
		}
?>
	