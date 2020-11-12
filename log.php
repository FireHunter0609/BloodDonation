<html>
<head>
<title>Blood Donation Website</title>
<link rel="stylesheet" href="CSS/home1.css">
<link rel="stylesheet" href="CSS/form.css">

</head>
<body>
<div class="topnav">
  <a href="home.html">Home</a>
</div>
<div style = "text-align:center">
<div class="grid-container">	
<div class="grid-item">
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
		$uname = mysqli_real_escape_string($conn,$_REQUEST['uname']);
		$psw = mysqli_real_escape_string($conn,$_REQUEST['psw']);
		
		$sql = "SELECT *FROM login where username = '$uname' and pwd = '$psw' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$count = mysqli_num_rows($query);
		 if($count == 1) 
		 {			
			header('location: loged_homePage.html');
			 
		 }
		 else 
		 {
			echo "<h3>Your Login Name or Password is invalid<h3>";
		 }
	}
}
mysqli_close($conn);
?>
</div>
</div>
</div>
</div>
</body>
</html>
