<?php 

if (isset($_SESSION['userid'])) {
	echo "<i><p style='float: right'> {$_SESSION['fname']} {$_SESSION['sname']} </i> / <i>Customer No: {$_SESSION['userid']} </p></i>";
}

?>