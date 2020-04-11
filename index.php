<?php

session_start();

include ("db.php"); //include db.php file to connect to DB

$pagename="Make your home smart"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>" . $pagename . "</title>";

echo "<body>";

include ("headfile.html");
include ("detectlogin.php");

echo "<h4>" . $pagename . "</h4>";

//create a $SQL variable and populate it with a SQL statement that retrieves product details, product short descrptiion, product price
$SQL="select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice  from Product";

//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
	echo "<tr>";
	echo "<td style='border: 0px'>";
	//make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
	echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
	//display the small image whose name is contained in the array
	echo "<img src=images/" . $arrayp['prodPicNameSmall'] . " height=200 width=200>";
	echo "</a>";
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<p><h5>" . $arrayp['prodName'] . "</h5>"; //display product name as contained in the array
	echo "<p><h6>" . $arrayp['prodDescripShort'] . "</h6>"; //display product Short Description as contained in the array
	echo "<p><b>£" . $arrayp['prodPrice'] . "</b>"; //display product Price as contained in the array
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

include ("footfile.html");
echo "</body>";
?>