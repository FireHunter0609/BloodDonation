<?php
$conn = mysqli_connect("localhost","root","","blood group");
if(! $conn)
{
	die("Connection Failed:".mysqli_connect_error());
}
?>

<html>
<head>
<title>Blood Donation Website</title>
<link rel="stylesheet" href="CSS/search_donor.css">
<link rel="stylesheet" href="CSS/myProfile.css">
<!--
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="home1.css">
<link rel="stylesheet" href="form.css">
-->
</head>

<body>
<div class="topnav-right">
	<a href="home.html">Log Out</a>
    <a href="queryform.php">Contact Us</a>
	<div class="topnav">
	<a href="loged_homePage.html">Home</a>
	</div>	
</div>

<header class="Header">
            <h1>Search Blood Donor</h1>
</header>

<div style = "text-align:center">
<form action="" method="POST">
<label for="bg"></label><br>
			<select id="bg" name="bg" required>
			<option value="select">Select</option>
				<option value="A +ve">A +ve</option>
				<option value="AB +ve">AB +ve</option>
				<option value="B +ve">B +ve</option>
				<option value="O +ve">O +ve</option>
				<option value="A -ve">A -ve</option>
				<option value="AB -ve">AB -ve</option>
				<option value="B -ve">B -ve</option>
				<option value="O -ve">O -ve</option>
			</select>
<input type="submit" value="Search Blood Group" name="search">
</form>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$bg = mysqli_real_escape_string($conn,$_REQUEST['bg']);
		$bloodgroup ="";
		$query = "SELECT firstname, lastname, phone, email, username FROM registered where bloodgroup = '$bg' ";
		$bquery = mysqli_query($conn,$query);
		$count = mysqli_num_rows($bquery);
		if($bquery !== FALSE)
		{
			$html_table = "<table align='center' border = '1' cellspacing = '0' cellpadding = '5'>
						<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email ID</th><th>View Details</th></tr>";
			foreach($bquery as $row)
			{
				
				$html_table .= '<tr>
								<td>'.$row['username'].'</td>
								<td>'.$row['firstname'].'</td>
								<td>'.$row['lastname'].'</td>
								<td>'.$row['phone'].'</td>
								<td>'.$row['email'].'</td>
								<td><a href="ViewDetails.php"><input type="button" value="Full Details" name="Details"></a></td>
								</tr>';
				
			}
		}
		$html_table .= '</table>';
		echo "$html_table";
	}
?>
</div>
</body>
</html>