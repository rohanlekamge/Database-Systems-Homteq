<?php

session_start();

include("db.php");

$pagename="Login Process"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable
//Assign these values to 2 new local variables $email and $password
//Display the content of these 2 variables to ensure that the values have been posted properly
$email = $_POST['email'];
$pwrd = $_POST['pwrd'];

if (!empty($pwrd) && !empty($email)) {
	$SQL = "SELECT * FROM users WHERE userEmail = '{$email}'";
	$resultSet = mysqli_query($conn, $SQL);
	$associativeArray = mysqli_fetch_assoc($resultSet);

	function valid_email($str) {
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	if (valid_email($email)) {
		if ($associativeArray['userEmail'] != $email) {
			echo "The Email you entered was not recognised<br><br>";
			echo "Go back to <a href='login.php'> Login </a><br>";
		} else { 
			if ($associativeArray['userPassword'] != $pwrd) {
				echo "The Password you entered is not recognised<br><br>";
				echo "Go back to <a href='login.php'> Login </a><br>";
			} else {
				echo "<b>Login Success!</b><br><br>";
				
				$_SESSION['userid'] = $associativeArray['userId'];
				$_SESSION['usertype'] = $associativeArray['userType'];
				$_SESSION['fname'] = $associativeArray['userFName'];
				$_SESSION['sname'] = $associativeArray['userSName'];

				echo "Hello, {$_SESSION['fname']} {$_SESSION['sname']}<br><br>";
				echo "You have successfully logged in as a hometeq Customer!<br><br>";
				echo "Continue Shopping for <a href='index.php'> Home Tech </a><br><br>";
				echo "View Your <a href='basket.php'> Smart Basket </a><br><br>";

			}
		}
	} else {
		echo "Email not valid <br>";
		echo "Make sure you enter the correct Email Address <br><br>";
		echo "Go back to <a href='login.php.php'> Login </a><br>";
	}
	
} else {
	echo "Your login form is incomplete <br>";
	echo "Make sure you provide all the required details<br><br>";
	echo "Go back to <a href='login.php'> Login </a><br>";
}

include("footfile.html"); //include head layout

echo "</body>";
?>