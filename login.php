<?php

session_start();

$pagename="Login "; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

echo "<table border='0'>";
echo "<form action=login_process.php method=post></br>";
	echo "
		<tr>
			<td>" . "Email" . "</td>
			<td>" . "<input type=text name=email size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "Password" . "</td>
			<td>" . "<input type=password name=pwrd size=50 maxlength=50>" . "</td>
		</tr>" .
		"<tr>
			<td>" . "<input type=submit value='Login'>" . "</td>
			<td>" . "<input type=reset value='Clear Form'>" . "</td>
		</tr>";

echo "</form>";
echo "</table>";

include("footfile.html"); //include head layout

echo "</body>";
?>