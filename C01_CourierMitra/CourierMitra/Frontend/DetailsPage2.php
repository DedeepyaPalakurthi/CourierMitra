<?php
	include("Courier_DB.php");
	$user = $_SESSION['user_id'];
	//$courier_id = $_SESSION['courier_id'];
	error_reporting(0);
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
			font-size:30px
		}
		p.thick
		{
			font-weight:900;
			font-size:27px;
		}
		p.bold
		{
			font-weight:900;
			font-size:23px;
		}
		p.Thank
		{
			font-weight:500;
			font-size:25px;
		}
		p.status
		{
			font-weight:400;
			font-size:20px;
		}
		#new_courier_btn
		{
			background-color:#22A7F0;
			height:30px;
			width:125px;
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
				<tr>
					<td align="center" colspan="2"><p class="thicker">Welcome 
						<?php echo $_SESSION['user_id'] ?></p>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><img src="Userpic1.png" height="110" width="110"></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><p class="Thank"> Thank you for using CourierMitra<br>
					<?php 
					$query1 = "SELECT * FROM COURIERS WHERE courier_id='$courier_id'";
					$data1 = mysqli_query($conn, $query1);
					$query2 = "SELECT * FROM COURIERSTATUS WHERE courier_id='$courier_id'";
					$data2 = mysqli_query($conn, $query2);
					if($data1 and !$data2)
					{
						echo "Your courier is not yet receieved<br>Please check after some time";
					}					
					?>
					</p></td>
				</tr>
				<tr><td align="center" colspan="2"><p>
				<?php
				//include("connection.php");
				//require("Courier_DB_Connection.php");
				$query = "SELECT * FROM COURIERSTATUS WHERE Registration_ID='$user'";
				if($result = mysqli_query($conn, $query))
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$field2name = $row["courier_id"];
						$_SESSION['field2name']=$field2name;
						$field3name = $row["courier_name"];
						$field4name = $row["courier_status"];
						if($field4name == "Delivered")
						{
							$delivery_id = $field2name;
							$delivered = $field4name;
						}
						echo '<table border="" id="table1" width = 100% cellspacing="5" cellpadding="5">
								<tr><td><p class="status">Courier_ID : '.$field2name.'</td></tr>
								<tr><td><p class="status">Your Courier '.$field3name.' is '.$field4name.'</td></tr>
							</table>';
					}$result->free();
				}
				?>
				</td></tr>	
				<tr>
				<td align="center" colspan="2">
					<a href="DetailsPage1.php">
					<input type="button" value="New Courier" id="new_courier_btn" style="font-size:20px">
				</a></td>
				</tr>
				<?php
				error_reporting(0);
				echo '<tr>
					<td align="center">
					<a href="logout.php">
					<p class="bold"><font color="#FF7300">Logout</p></a>
					</td>
					<td align="center">
					<a href="Refresh.php?cour_id='.$delivery_id.' & delivered='.$delivered.'">
					<p class="bold"><font color="#FF7300">Refresh</p></a>
					</td>
				</tr>';
				?>
				<tr>
				</tr>
			</table>
		</form>
	</body>
</html>