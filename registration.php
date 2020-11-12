<!DOCTYPE html>
<html>
<head>
<title>Blood Donation Website</title>
<link rel="stylesheet" href="CSS/registration.css">
</head>
<body>

<div class="topnav-right">
	<div class="topnav">
		<a href="home.html">Home</a>
	</div>
</div>
<header class="Header">
    <h1>Registration Form</h1>
</header>
<div style="text-align:center">
<?php
$conn = mysqli_connect("localhost","root","","blood group");
if(! $conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

else
{
	if(isset($_POST['submit']))
{
	$firstname = mysqli_real_escape_string($conn,$_REQUEST['firstname']);
	$lastname = mysqli_real_escape_string($conn,$_REQUEST['lastname']);
	$dob = mysqli_real_escape_string($conn,$_REQUEST['dob']);
	$gender = mysqli_real_escape_string($conn,$_REQUEST['gender']);
	$bloodgroup = mysqli_real_escape_string($conn,$_REQUEST['bloodgroup']);
	$address1 = mysqli_real_escape_string($conn,$_REQUEST['address1']);
	$address2 = mysqli_real_escape_string($conn,$_REQUEST['address2']);
	$address3 = mysqli_real_escape_string($conn,$_REQUEST['address3']);
	$pincode = mysqli_real_escape_string($conn,$_REQUEST['pincode']);
	$state = mysqli_real_escape_string($conn,$_REQUEST['state']);
	$phone = mysqli_real_escape_string($conn,$_REQUEST['phone']);
	$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
	$username = mysqli_real_escape_string($conn,$_REQUEST['username']);
	$pwd = mysqli_real_escape_string($conn,$_REQUEST['pwd']);
		
	//Insert Query Execution
	$emailquery = "SELECT *FROM registered where email = '$email' "; 
	$query = mysqli_query($conn,$emailquery);
	
	$emailcount = mysqli_num_rows($query);
	
	if($emailcount > 0)
	{
		echo "<br><h3>Email ID is already Registered</h3>";
	}
	else
	{
		$userquery = "SELECT *FROM registered where username = '$username' "; 
		$uquery = mysqli_query($conn,$userquery);
	
		$usercount = mysqli_num_rows($uquery);
	
	if($usercount > 0)
	{
		echo "<br><h3>Username is already Taken</h3>";
	}
	else
	{
		$sql = "INSERT INTO registered(firstname, lastname, dob, gender, bloodgroup, address1, address2, address3, pincode, state, phone, email,username, pwd)
				VALUES ('$firstname', '$lastname', '$dob', '$gender', '$bloodgroup', '$address1', '$address2', '$address3', '$pincode', '$state', '$phone', '$email', '$username', '$pwd')";

	
	if($conn->query($sql) === TRUE)
	{
		echo "<br><h3>Registration successfull Added $username to database</h3>" ;
	}
	else
	{
		echo "Error :".$sql."<br>".$conn->error  ;
	}
	$log = "INSERT INTO login(email, username, pwd) VALUES ('$email', '$username', '$pwd')";

	
	if($conn->query($log) === TRUE)
	{
		echo " " ;
	}
	else
	{
		echo "Error :".$log."<br>".$conn->error  ;
	}
}
}
}
}
//Close Connectiom
mysqli_close($conn);
?>
<form class="modal-content animate" action=" " method="post">

<div class="grid-container">
	<br>
  <div class="left">
		<label for="fname"><b>First Name: </b></label><br>
		<input type="text" id="fname" name="firstname" placeholder="First Name"  required >
  </div>
  <br>
  <div class="right">
		<label for="lname"><b>Last Name: </b></label><br>
		<input type="text" id="lname" name="lastname" placeholder="Last Name" required >
  </div>
  <br>
  <div class="left">
		<label for="dob"><b>Date of Birth: </b></label><br>
		<input type="date" id="datemax" name="dob" max="2002-01-01">
  </div>  
  <br>
  <div class="right">
		<label for="gender"><b>Gender: </b></label><br>
			<select id="gender" name="gender" required>
				<option value="select">Select</option>
				<option value="M">Male</option>
				<option value="F">Female</option>
				<option value="O">Prefer Not To say</option>
			</select>
  </div>
  <br>
  <div class="left">
		<label for="bloodgroup"><b>Blood Group: </b></label><br>
			<select id="bloodgroup" name="bloodgroup" required>
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
  </div>
  <br>
  <div class="right">
		<label for="address1"><b>Room Number: </b></label><br>
		<input type="text" id="address1" name="address1" placeholder="Enter room no."  required>  
  </div>
  <br>
  <div class="left">
		<label for="address2"><b>Locality: </b></label><br>
		<input type="text" id="address2" name="address2" placeholder="Enter locality"  required>
  </div>  
  <br>
  <div class="right">
		<label for="address3"><b>Station: </b></label><br>
		<input type="text" id="address3" name="address3" placeholder="Station"  required>
  </div>
<br>
  <div class="left">
		<label for="pincode"><b>Pincode: </b></label><br>
		<input type="text" id="pincode" name="pincode" placeholder="Pincode"  required>
  </div>
<br>
  <div class="right">
		<label for="state"><b>State: </b></label>
		<br>
	<select id="state" name="state"  required>
		<option value="select">Select</option>
		<option value="Andra Pradesh">Andhra Pradesh</option>
		<option value="Arunachal Pradesh">Arunachal Pradesh</option>
		<option value="Assam">Assam</option>
		<option value="Bihar">Bihar</option>
		<option value="Chattisgarh">Chhattisgarh</option>
		<option value="Delhi">Delhi</option>
		<option value="Goa">Goa</option>
		<option value="Gujurat">Gujurat</option>
		<option value="Haryana">Haryana</option>
		<option value="Himachal Pradesh">Himachal Pradesh</option>
		<option value="Jharkhand">Jharkhand</option>
		<option value="Jammu and Kashmir">Jammu & Kashmir</option>
		<option value="Karnataka">Karnataka</option>
		<option value="Kerela">Kerela</option>
		<option value="Madhya Pradesh">Madhya Pradesh</option>
		<option value="Maharashtra">Maharashtra</option>
		<option value="Manipur">Manipur</option>
		<option value="Meghalaya">Meghalaya</option>
		<option value="Mizoram">Mizoram</option>
		<option value="Nagaland">Nagaland</option>
		<option value="Odisha">Odisha</option>
		<option value="Punjab">Punjab</option>
		<option value="Rajasthan">Rajasthan</option>
		<option value="Sikkim">Sikkim</option>
		<option value="Tamil Nadu">Tamil Nadu</option>
		<option value="Telengana">Telengana</option>
		<option value="Tripura">Tripura</option>
		<option value="Uttarakhand">Uttarakhand</option>
		<option value="Uttar Pradesh">Uttar Pradesh</option>
		<option value="West Bengal">West Bengal</option>	
    </select>
  </div>
  <br>
  <div class="left">

	<label for="phone"><b>Phone Number </b></label><br>
	<input type="text" id="phone" name="phone" placeholder="Phone Number" required>
  </div>
 <br> 
  <div class="right">
	<label for="email"><b>Email ID: </b></label><br>
	<input type="email" id="email" name="email" placeholder="Email ID" required>
  </div>
<br>
  <div class="left">
	<label for="username"><b>Username: </b></label><br>
	<input type="text" id="username" name="username" placeholder="Username" required>
  </div>
  <br>
  <div class="right">
	<label for="pwd"><b>Password: </b></label><br>
	<input type="password" id="password" name="pwd" placeholder="Password" required>
  </div>
</div>

<br><br><input type="submit" value="Submit" name="submit">
		<input type="reset" value="Reset" name="reset">
<br><br>

</form>
</div>

<footer class="Footer">
    <h1>Care For People Blood Center</h1>
</footer>
</body>
</html>