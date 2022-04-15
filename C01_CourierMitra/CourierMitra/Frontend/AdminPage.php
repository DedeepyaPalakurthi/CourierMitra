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
			font-color:violet;
			font-weight:800;
			font-size:27px;
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
	error_reporting();
	require("Courier_DB.php");
	$query = "SELECT * FROM COURIERS ORDER BY date_of_arrival ASC";
	$data = mysqli_query($conn, $query);
	$user_id = $_SESSION['user_id'];
?>
<table border="" id="table1" width = 100% cellspacing="0" cellpadding="5"> 
      <tr><td align="center" colspan="2"><p class="thicker"><font color="#FF520F">Welcome <?php echo $user_id ?></p></td>
		<td align="right" colspan="2">
			<a href="logout.php">
			<p class="bold"><font color="red">Logout</p></a>
		</td>
		<td align="center">
		<a href="UsersPageDemo2.php">
		<p class="bold"><font color="red">Users record</p></a>
		</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><img src="AdminPic.png" height="110" width="110"</td>		
		</tr>
</table>
<?php
error_reporting(0);
if ($result = mysqli_query($conn, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $field1name = $row["registration_ID"];
		$_SESSION['field1name']=$field1name;
        $field2name = $row["courier_id"];
		$_SESSION['field2name']=$field2name;
        $field3name = $row["courier_name"];
        $field4name = $row["contact_no"];  
		$field5name = $row["date_of_arrival"];
		echo '<table border="" id="table1" width = 100% cellspacing="5" cellpadding="5">
		    <tr> 
				<form action="" method="POST">
				<td align="left"><p class="normal">'.$field1name.'<br><br><font color="#FF520F">Expected date of arrival : <font color="#3B3B98">'.$field5name.'</td>
				<td align="left">
				<table align:"center" border="0" id="table2" width=50%>		
				<tr><td><p class="bold"><font color="#FF520F">Details : </td></tr>
                <tr><td><p class="normal"><font color="#FF520F">Courier ID</td>
					<td align="center"><p class="normal"><font color="#FF520F">:</td>
					<td><p class="normal"><font color="#FF520F"></td>
					<td><p class="normal"><font color="#FF520F"></td>

					<td><p class="normal">'.$field2name.'</td>
				</tr>
				<tr><td><p class="normal"><font color="#FF520F">Courier Name</td>
					<td align="center"><p class="normal"><font color="#FF520F">:</td>
					<td><p class="normal"><font color="#FF520F"></td>
					<td><p class="normal"><font color="#FF520F"></td>
					
					<td><p class="normal">'.$field3name.'</td>
				</tr>
				<tr><td><p class="normal"><font color="#FF520F">Contact no</td>
					<td align="center"><p class="normal"><font color="#FF520F">:</td>
					<td><p class="normal"><font color="#FF520F"></td>
					<td><p class="normal"><font color="#FF520F"></td>
					
					<td><p class="normal">'.$field4name.'</td>
				</tr>
				<tr>
					<td><p class="normal"><font color="#FF520F"></td>
					<td align="center" colspan="2">
					<a href = "Admin_DB1.php?regd_id='.$field1name.' & cour_id='.$field2name.' & cour_name='.$field3name.'">
					<input type="button" name="update" id="update_btn" value="Received" style="font-size:17px"></input></a>
					</a></td>
				</tr>
				<tr>
					<td><p class="normal"><font color="#FF520F"></td>
					<td align="center" colspan="2">
					<a href = "Admin_DB2.php?regd_id='.$field1name.' & cour_id='.$field2name.' & cour_name='.$field3name.' & mobile_no='.$field4name.'">
					<input type="button" name="update" id="update_btn" value="Delivered" style="font-size:17px"></input></a>
					</a></td>
				</tr>
				</table>
				</td>   				
				</form>   
				
            </tr></table>';
    }
    $result->free();
}

?>
</body>
</html>
