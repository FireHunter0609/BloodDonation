<!DOCTYPE html>
<html>
    <head>
        <title>Blood Donation Center</title>
        <link rel="stylesheet" href="CSS/donate.css">
		<link rel="stylesheet" href="CSS/myProfile.css">
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


        <header class="Before">
            <h1>Donate Blood Page</h1>
        </header>
        
        <br>
        
        <div id="info">
            <h2> Who Can not donate Blood?</h2>
            <ol>
                <li>Anyone who has ever used injection drugs not prescribed by a doctor, 
                such as illegal injection drugs or steroids not prescribed by a doctor</li>
                <li>Anyone who has a congenital coagulation factor deficiency.</li>
                <li>Anyone with a positive test for HIV</li>
                <li>Anyone who, in the past 12 months, has had close contact with — lived with 
                or had sexual contact with — a person who has viral hepatitis</li>
                <li>Anyone who has had babesiosis, a rare and severe tick-borne disease,
                 or the parasitic infection Chagas' disease</li>
                <li>Anyone who has taken etretinate (Tegison) for psoriasis</li>
                <li>Anyone who has risk factors for the degenerative brain disorder
                 Creutzfeldt-Jakob disease (CJD) or who has a blood relative with CJD</li>
            </ol>

            <h2>Points To Remember Before Donating Blood</h2>
            <ol>
                <li>Get plenty of sleep the night before you plan to donate.</li>
                <li>Eat a healthy meal before your donation.</li>
                <li>Avoid fatty foods, such as hamburgers, french friesor ice cream before donating.
                Tests for infections done on all donated 
                blood can be affected by fats that appear in your blood for several hours after eating fatty foods.</li>
                    <li>Drink an extra 16 ounces (473 milliliters) of water and other fluids before the donation.</li>
                <li>If you are a platelet donor, remember that you must not take aspirin for two days prior to donating.
                 Otherwise, you can take your normal medications as prescribed.</li>
            </ol>

            <h2>Points to  remember after donating blood</h2>
            <ol>
                <li>After donating you sit in an observation area, where you rest and eat a light snack. After 15 minutes, you can leave.</li>
                <li>Drink extra fluids for the next day or two.</li>
                <li>Avoid strenuous physical activity or heavy lifting for the next five hours.</li>
                <li>If you feel lightheaded, lie down with your feet up until the feeling passes.</li>
                <li>Keep the bandage on your arm and dry for five hours.</li>
                <li>If you have bleeding after removing the bandage
                , put pressure on the site and raise your arm until the bleeding stops.</li>
                <li>If bleeding or bruising occurs under the skin,
                 apply a cold pack to the area periodically during the first 24 hours.</li>
                 <li>If your arm is sore, take a pain reliever such as acetaminophen (Tylenol, others).
                 Avoid taking aspirin or ibuprofen (Advil, Motrin IB, others) for the first 24 to 48 hours after donation.</li>
            </ol>
        </div>
        <br>
		<form action="donate.php" method="POST">
		<div id="">
        <center>
        <strong>
        <label for="username">Enter your Username: </label>
        <input type="text" id="username" name="username" placeholder="Username" required>
        </strong>
        </center>
    </div>
	<br><center><input id="mycheck" type="checkbox"> I have read all the Rules before submitting application.</center><br>
        <center><p id="msg"> </p></center>
        <br>
        <center><button onclick="checkbox()" value="submit" name="submit">Sumbit</button></center>
		</form>
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
		$username = mysqli_real_escape_string($conn,$_REQUEST['username']);
			$userquery = "SELECT *FROM donation where username = '$username' "; 
			$uquery = mysqli_query($conn,$userquery);
			$usercount = mysqli_num_rows($uquery);	
			if($usercount > 0)
			{
				echo "<br><h3>Username is already Taken</h3>";
			}
			else
			{
				$sql= "INSERT INTO donation (firstname, lastname, bloodgroup, username, email, phone) 
						SELECT firstname, lastname, bloodgroup, username, email, phone FROM registered where username='$username'";
				$qsql= mysqli_query($conn,$sql);
				if ($qsql === TRUE)
				{
					echo "done";
				}
				else
				{
					echo "Error :".$sql."<br>".$conn->error  ;
				}
		}
	}
}
?>
 <footer class="Before">
            <h1>Care For People Blood Center</h1>
        </footer>
    </body>
</html>