<?php
session_start();
include('../connection.php');
include('customerhomepage.php');
if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
if (isset($_POST['remove_id'])) {
	$id=$_POST["cart_id"];
	$data="DELETE from cart where id= $id";
	if(!$data){
		die(mysqli_error($con));
	}
	mysqli_query($con,$data);
	header('location:cart.php');
}
if(isset($_POST['buyall'])){
	include('functions.php');
	$customer_id=$_POST["customer_id"];
	$involved_vendors= involvedvendors($customer_id);
	$checkoutsql=buyallitems($customer_id);
	$checkoutvalues=runcheckoutsql($checkoutsql);
	$_SESSION['customer_id']=$customer_id;
	$_SESSION['involved_vendors']=$involved_vendors;
	include('checkout.php');
}
?>