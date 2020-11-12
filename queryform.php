<!DOCTYPE html>
<html>
<head>
<title>Blood Donation Website</title>
<!--
<link rel="stylesheet" href="home1.css">
<link rel="stylesheet" href="form1.css">
-->
<link rel="stylesheet" href="CSS/queryForm.css">
</head>
<body>

<div class="topnav-right">
	<a href="home.html">Log Out</a>
    <a class="active">Contact Us</a>
	<div class="topnav">
	<a href="myProfile.php">My Profile</a>
</div>
</div>


<header class="Header">
    <h1>Contact Form</h1>
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
	$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
	$queries=mysqli_real_escape_string($conn,$_REQUEST['queries']);
	
	$sql = "INSERT INTO contact(firstname, lastname, email, queries) VALUES('$firstname', '$lastname', '$email', '$queries')";
	
	if($conn->query($sql) === TRUE)
	{
		echo "<br><h3>$firstname $lastname, Your Query Has Been Registered.</h3><br>";
	}
	else
	{
		echo "Error :".$conatct."<br>".$conn->error;
	}
}
}
?>
  <form  class="modal-content animate" action=" " method="post">
    <br><label for="fname"><b>First Name</b></label><br>
    <input type="text" id="fname" name="firstname" required>

    <br><label for="lname"><b>Last Name</b></label><br>
    <input type="text" id="lname" name="lastname" required>

    <br><label for="email"><b>Email Id</b></label><br>
	<input type="email" id="email" name="email" required>

    <br><label for="subject"><b>Submit Your Queries</b></label><br>
    <textarea id="queries" name="queries" style="height:100px" required></textarea><br><br>

    <input type="submit" value="Submit" name="submit" ><br><br>	
  </form>
</div>

<footer class="Footer">
            <h1>Care For People Blood Center</h1>
</footer>

</body>
</html>
