
<?php
include('../connection.php');
if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
//"SELECT * from cart where id=$singleorderid";
// function singleordersql($singleorderid){
// 	$checkoutitem="SELECT cart.id,cart.total_price,product.name,cart.product_id from cart INNER JOIN product on cart.product_id=product.id where cart.id=$singleorderid";
// 	return $checkoutitem;
// }
//"SELECT * from cart where customer_id='$customerid'"
function involvedvendors($customerid){
	global $con;
	$involvedvendors="SELECT DISTINCT seller_id from cart where cart.customer_id=$customerid && cart.status=0";
	$involvedvendorsquery=mysqli_query($con,$involvedvendors);
	$total= mysqli_num_rows($involvedvendorsquery);
	return $total;
}

function buyallitems($customerid){
	$checkoutitem="SELECT cart.id,cart.total_price,product.name,cart.product_id,cart.status from cart INNER JOIN product on cart.product_id=product.id where cart.customer_id=$customerid && cart.status=0";
	return $checkoutitem;
}


function runcheckoutsql($sql){
	global $con;
	$value=mysqli_query($con,$sql);
	if(!$value){
		mysqli_error($con);
	}
	return $value;

}
function addtodatabase($mysqliobject){
global $con;

}


?>