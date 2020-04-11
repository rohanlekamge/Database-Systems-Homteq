<?php

session_start();

$pagename="Sign Up"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

echo "<table border='0'>";
echo "<form action=signup_process.php method=post></br>";
	echo "
		<tr>
			<td>" . "*First Name" . "</td>
			<td>" . "<input type=text name=fName size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Last Name" . "</td>
			<td>" . "<input type=text name=lName size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Address" . "</td>
			<td>" . "<input type=text name=address size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Post Code" . "</td>
			<td>" . "<input type=text name=pCode size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Tel No" . "</td>
			<td>" . "<input type=text name=tNo size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Email Address" . "</td>
			<td>" . "<input type=text name=eAddress size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Password" . "</td>
			<td>" . "<input type=password name=pwrd size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "*Confirm Password" . "</td>
			<td>" . "<input type=password name=cPwrd size=50 maxlength=50>" . "</td>
		</tr>" . 
		"<tr>
			<td>" . "<input type=submit value='Sign Up'>" . "</td>
			<td>" . "<input type=reset value='Clear Form'>" . "</td>
		</tr>";

echo "</form>";
echo "</table>";

include("footfile.html"); //include head layout

echo "</body>";
?>