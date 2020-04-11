<?php

session_start();

include("db.php");

$pagename="Template"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$address = $_POST['address'];
$pCode = $_POST['pCode'];
$tNo = $_POST['tNo'];
$eAddress = $_POST['eAddress'];
$pwrd = $_POST['pwrd'];
$cPwrd = $_POST['cPwrd'];


//run SQL query for connected DB or exit and display error message
//$result = mysqli_query($conn, $SQL);

if (!empty($fName) && !empty($lName) && !empty($address) && !empty($pCode) && !empty($tNo) && !empty($eAddress) && !empty($cPwrd) && !empty($cPwrd)) {
	if ($pwrd != $cPwrd) {
		echo "The 2 passswords are not matching <br>";
		echo "Make sure you enter them  correctly <br><br>";
		echo "Go back to <a href='signup.php'> SignUp </a><br>";
	} else {
		function valid_email($str) {
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
		}
		if (valid_email($eAddress)) {
			$SQL="INSERT INTO users (userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('{$fName}', '{$lName}', '{$address}', '{$pCode}', '{$tNo}', '{$eAddress}', '{$cPwrd}')";

			mysqli_query($conn, $SQL);

			if (mysqli_errno($conn) == 0) {
				echo "<b> SignUp successfil! </b><br><br>";
				echo "To continue, Please <a href='login.php'> login </a><br>";
			} else {
				if (mysqli_errno($conn) == 1062) {
					echo("Email already in use<br>");
					echo "You may be already registered or try another email address<br><br> ";
					echo "Go back to <a href='signup.php'> SignUp </a><br>";
				} 
				if (mysqli_errno($conn) == 1064) {
					echo "Invalid charactrs entered inthe form<br>";
					echo "Make sure you avoid the following characters like ['] and backslashes like [\]<br><br>";
					echo "Go back to <a href='signup.php'> SignUp </a><br>";
				}
			}
		} else {
			echo "Email not valid <br>";
			echo "Make sure you enter the correct Email Address <br><br>";
			echo "Go back to <a href='signup.php'> SignUp </a><br>";
		}

	}
} else {
	echo "all mandatory fields need to be filled in <br><br>";
	echo "Go back to <a href='signup.php'> SignUp </a><br>";
}


// //run SQL query for connected DB or exit and display error message
// $result = mysqli_query($conn, $SQL);

// //Execute the INSERT INTO SQL query
// if (mysqli_errno($conn) == 1062) {
// 	echo "This email address is being used before. <br>";
// } if (!valid_email($eAddress)) {
// 	echo "Invalid email address. <br>";
// } if ($pwrd != $cPwrd) {
// 	echo "Password do not match <br>";
// } else if ($result && ($pwrd == $cPwrd) && (valid_email($eAddress))) {
// 	echo "1 record added";
// }



include("footfile.html"); //include head layout

echo "</body>";
?>