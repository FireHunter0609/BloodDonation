<!DOCTYPE html>
<html>
<head>
<title>Blood Donation Website</title>
<link rel="stylesheet" href="CSS/home1.css">
<link rel="stylesheet" href="CSS/pass.css">
</head>
<body>

<div class="topnav">
  <a href="home.html">Home</a>
</div>
<br>
<div style="text-align:center">
<?php
$conn = mysqli_connect("localhost","root","","blood group");
if(! $conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

else
{
	if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
	$pwd = mysqli_real_escape_string($conn,$_REQUEST['password']);
	$cpwd = mysqli_real_escape_string($conn,$_REQUEST['cpassword']);

	$emailquery = "SELECT *FROM registered where email = '$email' ";
	$query = mysqli_query($conn,$emailquery);
	
	$emailcount = mysqli_num_rows($query);
		if($emailcount)
		{
			if($pwd == $cpwd)
			{
				$pquery = "UPDATE registered SET pwd = '$pwd'";
				if($conn->query($pquery) === TRUE)
				{
					echo "<br><h3>Your Password has been changed successfully</h3>" ;
					$log = " UPDATE login SET pwd = '$pwd'";
					
					if($conn->query($log) === TRUE)
					{
						echo " " ;
					}
					else
					{
						echo "Error :".$log."<br>".$conn->error  ;
					}
					
				}
				else
				{
					echo "Error :".$pquery."<br>".$conn->error  ;
				}
			}
			else
			{
				echo "<h3>Password does not match</h3>";
			}
		}
		else
		{
			echo "<h3>Email ID not registered</h3>";
		}
	
}
}
//Close Connectiom
mysqli_close($conn);
?>
<br>
<div class="modal-content animate">
<h3>Reset Your Password</h3>
<form action="" method="post">
<p>Enter your Registered Email ID</p>
<input type="email" placeholder="Email ID" name="email" id="email" required><br>
<p>Enter Your Pasword</p>
<input type="password" placeholder="Password" name="password" id="password" required><br>
<p>Confirm Pasword</p>
<input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required><br><br>
<input type="submit" value="Reset Your Password" name="reset"><br><br>
</form>
</div>
</div>
</body>
</html>
