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
	$mobile_no = $_GET['mobile_no'];
	$courier_status = "Delivered";
		$query = "UPDATE COURIERSTATUS SET courier_status='$courier_status' WHERE courier_id='$cour_ID'";
		$data = mysqli_query($conn, $query);
		if($data > 0)
		{
			$query = "UPDATE USERS_RECORD SET courier_status='$courier_status', date_of_delivered=CURRENT_TIMESTAMP WHERE courier_id='$cour_ID'";
			$data = mysqli_query($conn, $query);
			echo '<script type="text/javascript"> alert("Courier status updated")</script><br>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Failed to update")</script><br>';
		}
		$query = "DELETE FROM COURIERS WHERE courier_id='$cour_ID'";
		$data = mysqli_query($conn, $query);
		if($data > 0)
		{
			echo '<script type="text/javascript"> alert("Data deleted from couriers table")</script><br>';
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
			$subject = "Courier status : Delivered";
			$body = "Hi $regd_ID,
			From CourierMitra
			You have collected your courier $cour_name of courier ID : $cour_ID recently.
			We are happy to serve you. Hope you like our service. 
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
			echo '<script type="text/javascript"> alert("Failed to delete")</script><br>';
		}
		$url = "www.way2sms.com/api/v1/sendCampaign";
		//$message = urlencode($str);
		$message = "Greetings $regd_ID. Your courier : $cour_name of $cour_ID has arrived. Please come and fetch it";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=AIzaSyDDW9op2BIZFJsBcQOrMwZkAKPjjDP0T3o & usetype=stage & phone=$mobile_no & senderid=dedeepyapalakurthi@gmail.com & message=$message");
		
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
?>
	