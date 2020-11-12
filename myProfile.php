<!DOCTYPE html>
<html>
    <head>
        <title>Blood Donation Center</title>
        <link rel="stylesheet" href="CSS/myProfile.css">
		<link rel="stylesheet" href="CSS/donate.css">
        <script src="JavaScript/donate.js"></script>

    <head>
    <body>
        <div class="topnav-right">
            <a href="home.html">Log Out</a>
            <a href="queryform.php">Contact Us</a>
			<div class="topnav">
				<a href="loged_homePage.html">Home</a>
			</div>
        </div>
        <header class="Header">
            <h1>My Profile</h1>
        </header>
        <br>
		<form action="myProfile.php" method="POST">
		<div id="">
        <center>
        <strong>
        <label for="username">Enter your Username: </label>
        <input type="text" id="username" name="username" placeholder="Username" required>
		<br>
        <center><button onclick="checkbox()" value="submit" name="submit">Sumbit</button></center>
        </strong>
        </center>
    </div>
	</form>
<?php
$conn = mysqli_connect("localhost","root","","blood group");
if(! $conn)
{
	die("Connection Failed:".mysqli_connect_error());
}
?>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = mysqli_real_escape_string($conn,$_REQUEST['username']);
		$sql = "SELECT firstname, dob, lastname, gender, bloodgroup, address1, address2, address3, pincode, state, phone, email, username FROM registered where username = '$username' ";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		if ($count > 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$html_table = "<table align='center' border = '0' cellspacing = '0' cellpadding = '5'>
						<tr><th> </th><th> </th></tr>";
			foreach($result as $row)
			{
				$html_table .= '<tr>	<td><b>UserName </b></td>	<td>'.$row['username'].'</td>	</tr>
								<tr>	<td><b>First Name </b></td>	<td>'.$row['firstname'].'</td>	</tr>
								<tr>	<td><b>Last Name </b></td>	<td>'.$row['lastname'].'</td>	</tr>
								<tr>	<td><b>Date of Birth </b></td>	<td>'.$row['dob'].'</td>	</tr>
								<tr>	<td><b>Gender </b></td>	<td>'.$row['gender'].'</td>	</tr>
								<tr>	<td><b>Blood Group </b></td>	<td>'.$row['bloodgroup'].'</td>	</tr>
								<tr>	<td><b>Room Number </b></td>	<td>'.$row['address1'].'</td>	</tr>
								<tr>	<td><b>Locality </b></td>	<td>'.$row['address2'].'</td>	</tr>
								<tr>	<td><b>Station </b></td>	<td>'.$row['address3'].'</td>	</tr>
								<tr>	<td><b>Pincode </b></td>	<td>'.$row['pincode'].'</td>	</tr>
								<tr>	<td><b>State </b></td>	<td>'.$row['state'].'</td>	</tr>
								<tr>	<td><b>Phone Number </b></td>	<td>'.$row['phone'].'</td>	</tr>
								<tr>	<td><b>Email ID </b></td>	<td>'.$row['email'].'</td>	</tr><br><br>';
				
			}
			}
			$html_table .= '</table>';
			echo "$html_table";	
		} 
		else 
		{
			echo "0 results";
		}
		
	}
	
?>