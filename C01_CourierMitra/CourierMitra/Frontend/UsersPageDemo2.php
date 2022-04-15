<html>
<body id="background">
<style>
		#background
		{
		background-color:white;
		background-repeat:no-repeat;
		background-size:100% 100%;
		}
		#table1
		{
			color:#3B3B98;
			background-color:transparent;
			border:2px solid black;
			border-collapse:collapse;
		}
		#table2
		{
			color:#3B3B98;
			background-color:transparent;
		}
		td 
		{
			border:none;
		}
		p.normal
		{
			font-weight:530;
			font-size:22px
		}
		p.thicker
		{
			font-weight:900;
			font-size:30px;
		}
		p.thick
		{
			font-color:#FF520F;
			font-weight:600;
			font-size:21px;
		}
		p.bold
		{
			font-weight:700;
			font-size:23px;
		}
		input.largerCheckbox {
			color:green;
            width: 20px;
            height: 20px;
        }
		#update_btn
		{
			background-color:#1BA1E6;
			height:30px;
			width:120px;
			border-radius:0px;
		}
		</style>
<?php
	//error_reporting(0);
	include("connection.php");
	require("Courier_DB.php");
	$user_id = $_SESSION['user_id'];
?>
<table border="1" id="table1" width = 100% cellspacing="0" cellpadding="5"> 
    <tr><td align="center" colspan="2"><p class="thicker"><font color="#FF520F">Welcome <?php echo $user_id ?></p></td>
		<td align="center" colspan="2">
			<a href="logout.php">
			<p class="bold"><font color="#FF520F">Logout</p></a>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><img src="AdminPic.png" height="110" width="110"</td>		
	</tr>
	</table>
	<table border="1" id="table1" width = 100% height = 60% cellspacing="0" cellpadding="5">
	<tr>
		<th><p class="thick"><font color="#FF520F">Registration ID</th>
		<th><p class="thick"><font color="#FF520F">Full Name</th>
		<th><p class="thick"><font color="#FF520F">College Name</th>
		<th><p class="thick"><font color="#FF520F">Department</th>
		<th><p class="thick"><font color="#FF520F">Email</th>
		<th><p class="thick"><font color="#FF520F">Contact number</th>
		<th><p class="thick"><font color="#FF520F">Courier ID</th>
		<th><p class="thick"><font color="#FF520F">Courier Name</th>
		<th><p class="thick"><font color="#FF520F">Courier Status</th>
		<th><p class="thick"><font color="#FF520F">Received Date</th>
		<th><p class="thick"><font color="#FF520F">Delivered Date</th>
	</tr>
<?php
//error_reporting(0);
$query = "SELECT * FROM USERS_RECORD ORDER BY registration_ID ASC";
$data = mysqli_query($conn, $query);
if($result = mysqli_query($conn, $query)) {
    while($row = mysqli_fetch_assoc($result)) {
        $field1name = $row["registration_ID"];
		$_SESSION['field1name']=$field1name;
        $field2name = $row["full_name"];
		$_SESSION['field2name']=$field2name;
        $field3name = $row["college_name"];
        $field4name = $row["department"];
		$field5name = $row["email"];
		$field6name = $row["contact_no"];
		$field7name = $row["courier_id"];
		$field8name = $row["courier_name"];
		$field9name = $row["courier_status"];
		$field10name = $row["date_of_received"];
		$field11name = $row["date_of_delivered"];
		echo '
		<tr>
		<th>'.$field1name.'</th>
		<th>'.$field2name.'</th>
		<th>'.$field3name.'</th>
		<th>'.$field4name.'</th>
		<th>'.$field5name.'</th>
		<th>'.$field6name.'</th>
		<th>'.$field7name.'</th>
		<th>'.$field8name.'</th>
		<th>'.$field9name.'</th>
		<th>'.$field10name.'</th>
		<th>'.$field11name.'</th>
		</tr>';
    }
}
?>
</table>
</body>
</html>
