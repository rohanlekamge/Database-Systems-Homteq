<?php

session_start();

include("db.php");

$pagename="Smart Basket"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file

include ("detectlogin.php");

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


if (isset($_POST['h_prodid'])) {
	//capture the ID of selected product using the POST method and the $_POST superglobal variable
	//and store it in a new local variable called $newprodid
	$newprodid=$_POST['h_prodid'];

	//capture the required quantity of selected product using the POST method and $_POST superglobal variable
	//and store it in a new local variable called $reququantity
	$reququantity=$_POST['p_quantity'];

	//Display id of selected product
	//echo "<p>Selected product Id: ". $newprodid;
	//Display quantity of selected product
	//echo "<p>Quantity of selected product: ". $reququantity;

	//create a new cell in the basket session array. Index this cell with the new product id.
	//Inside the cell store the required product quantity
	$_SESSION['basket'][$newprodid]=$reququantity;

	//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
	echo "<p>1 item added to the basket";
} elseif (isset($_POST['r_prodId'])) {
	//capture the posted product id and assign it to a local variable $delprodid
	//unset the cell of the session for this posted product id variable
	//display a "1 item removed from the basket" message
	$delprodid=$_POST['r_prodId'];
	unset($delprodid);
	echo "1 item removed from the basket";
} else {
	echo "Current basket unchanged";
}

echo "<br>";

//Create a HTML table with a header to display the content of the shopping basket
//i.e. the product name, the price, the selected quantity and the subtotal
echo "<table>
 	 		<tr>
 	 			<th>Product Name</th>
 	 			<th>Unit Price</th>
 	 			<th>Quantity</th>
 	 			<th>Sub Total</th>
 	 			<th>Action</th>
 	 		</tr>";

	 	$total_amount=0;

		//if the session array $_SESSION['basket'] is set
		if(isset($_SESSION['basket'])){	

			if(isset($_POST['r_prodId'])){
				$deleteId=$_POST['r_prodId'];
			// echo $deleteId;
					unset($_SESSION['basket'][$deleteId]);
	
			}	  	

			//loop through the basket session array for each data item inside the session using a foreach loop
			//to split the session array between the index and the content of the cell
			//for each iteration of the loop
			//store the id in a local variable $index & store the required quantity into a local variable $value
	 	 	foreach($_SESSION['basket'] as $index => $value) {

	 	 		//SQL query to retrieve from Product table details of selected product for which id matches $index
		 	 	$SQL="select prodName,prodPrice from Product where prodId=$index";
				//run SQL query for connected DB or exit and display error message
				$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

				
				while ($arrayp=mysqli_fetch_array($exeSQL))
				{
		 	 		// $sql="INSERT INTO basket(prodId,qty) VALUES('$index','$value')";
		 	 		// $exeSQL=mysqli_query($conn, $sql) or die (mysqli_error());
		 	 		

		 	 		$subTotal=$value*$arrayp['prodPrice'];
		 	 		$total_amount+=$subTotal;

			  		echo "<form action=basket.php method=post>";
		 	 		echo "<tr>
	 	 				<td>".$arrayp['prodName']."</td>
	 	 				<td>".$arrayp['prodPrice']."</td>
	 	 				<td>".$value."</td>
	 	 				<td>".$subTotal."</td>
	 	 				<td><input type=submit value=Remove></input></td>
		 	 			</tr>";

		 	 	echo "<input type=hidden name=r_prodId value=" . $index . ">";
		 	 	echo "</form>";

				}
	 	 	} 	
		 }else{
		 	echo "<br><h4>Empty Basket</h4>";
		 }

		echo "<tr><td colspan='3'>Total Amount</td>
 	 				<td>".$total_amount."</td>
 	 				<td></td>";

 	 	echo "</table>";

echo "</br> <a href='clearbasket.php'> Clear Basket </a></br></br>";

if (isset($_SESSION['userid'])) {
	echo "</br> To finalise your order: <a href='checkout.php'> Checkout </a></br>";
} else {
	echo "</br> New hometeq customers: <a href='signup.php'> Sign Up </a></br>";
	echo "</br> Returning hometeq customers: <a href='login.php'> Login </a></br>";
}

include("footfile.html"); //include head layout

echo "</body>";
?>