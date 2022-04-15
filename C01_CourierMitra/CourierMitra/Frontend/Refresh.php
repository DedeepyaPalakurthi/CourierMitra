<?php
	include("connection.php");
	session_start();
	//error_reporting(0);   //Avoiding errors to print on screen
	//echo $_GET["update"];
?>
<?php
	$cour_ID = $_GET['cour_id'];
	$delivered = $_GET['delivered'];
		$query = "DELETE FROM COURIERSTATUS WHERE courier_id='$cour_ID' AND courier_status='$delivered'";
		$data = mysqli_query($conn, $query);
		if($data > 0)
		{
			//echo "Refreshed";
		}
		else
		{
			echo "error";
		}
?>