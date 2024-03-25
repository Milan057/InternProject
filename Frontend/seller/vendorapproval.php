<?php
session_start();
include '../connection.php';

if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}

$seller_id= $_POST['seller_id'];
$delivery_id= $_POST['delivery_id'];

$sentsql="Insert into vendorapproval(delivery_id,vendor_id) values($delivery_id,$seller_id)";
$sentsqlquery=mysqli_query($con,$sentsql);
if(!$sentsqlquery){
	die(mysqli_error($con));
}
$getreadyvendors="Select ready_vendors from delivery where id='$delivery_id'";
$getreadyvendorsquery=mysqli_query($con,$getreadyvendors);
$getreadyvendorsqueryassoc=mysqli_fetch_assoc($getreadyvendorsquery);
$value=$getreadyvendorsqueryassoc['ready_vendors'];
$value=$value+1;

$setreadyvendors="Update delivery set ready_vendors='$value' where id='$delivery_id';";
$setreadyvendorsquery=mysqli_query($con,$setreadyvendors);
header("location:orders.php");




?>
