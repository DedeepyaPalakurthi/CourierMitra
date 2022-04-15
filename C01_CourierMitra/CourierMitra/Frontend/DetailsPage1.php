<?php
	session_start();
	include("connection.php");
	$user_id = $_SESSION['user_id'];
?>
	
<html>
	<head>
		<title>
			Registration Form>
		</title>
		<style>
		#background
		{
		background-repeat: no-repeat;
		background-size: 100% 100%;
		}
		table
		{
			color:black;
			background-color:transparent;
		}
		p.thicker
		{
			font-weight:900;
			font-size:30px;
		}
		p.thick
		{
			font-weight:530;
			font-size:27px;
		}
		p.bold
		{
			font-weight:900;
			font-size:23px;
		}
		#submit_btn
		{
			background-color:#22A7F0;
			height:30px;
			width:120px;
			border-radius:0px;
		}
		input.largerCheckbox {
			color:green;
            width: 20px;
            height: 20px;
        }
		</style>
	</head>
	<body background="Background.png" id = background>
		<br><br><br><br><br><br><br><br>
		<form action="Courier_DB.php" method="POST">
			<table align="center" border="0" width = 400 cellspacing="10" style="font-size:20px">
					<td align="center" colspan="2"><p class="thicker">Welcome 
						<?php echo $_SESSION['user_id'] ?></p>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><img src="Userpic1.png" height="110" width="110"></td>
				</tr>
				<tr>
					<td align="center" colspan="2" style="font-size:25px"><p class="thick">Fill the courier details</p></td>
				</tr>
				<tr>
					<td><p class="bold">Courier Name</p><td><input type="text" placeholder="What is the courier" name="courier_name" required></td>
				</tr>
				<tr>
					<td><p class="bold">Courier ID</p><td><input type="text" placeholder="What is the courier" name="courier_id" required></td>
				</tr>
				<tr>
					<td><p class="bold">Date of arrival</p><td><input type="text" placeholder="Date of arrival" name="date_of_arrival"></td>
				</tr>				
				<tr>
					<td><p class="bold">Contact no</p><td><input type="text" placeholder="Contact no" name="contact_no" required></td>
				<tr>
					<td align="center" colspan="2">
					<input type="submit" onclick="submit()" value="Submit" id="submit_btn" name="submit" style="font-size:20px">
					</td>
				</tr>
				<tr>
					<td align="left">
						<a href="logout.php">
						<p class="bold"><font color="#FF7300">Logout</p></a>
					</td>
					<td align="center" style="font-size:20px">
						<?php
							$query1="SELECT * FROM COURIERS WHERE registration_ID='$user_id'";
							$data1=mysqli_query($conn, $query1);
						    $query2="SELECT * FROM COURIERSTATUS WHERE registration_ID='$user_id'";
							$data2=mysqli_query($conn, $query2);
							if((mysqli_num_rows($data1) > 0) OR (mysqli_num_rows($data2) > 0))
							{
								echo '<a href="DetailsPage2.php">
								<p class="bold"><font color="#FF7300">Check courier status</p></a>';
							}
						?>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
	</body>
</html>