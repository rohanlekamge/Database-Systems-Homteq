<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbName="w1715777";

//create a DB connection 
$conn = mysqli_connect($servername, $username, $password,$dbName);

//if the DB connection fails, display an error message and exit 
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn)); 
}

//select the database 
mysqli_select_db($conn, $dbName); 

//mysql_close($conn);
?> 