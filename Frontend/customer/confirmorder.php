<?php
session_start();
include('customerhomepage.php');
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
date_default_timezone_set("Asia/Kathmandu");
$currentdate=date("Y-m-d h:i:sa");
$totalprice=$_SESSION['totalprice'];
$involved_vendors=$_SESSION['involved_vendors'];
$sql="INSERT into delivery(payment,purchase_date,involved_vendors) values('$totalprice','$currentdate','$involved_vendors')";
$query=mysqli_query($con,$sql);
if(!$query){
	die(mysqli_error($con));
}
$selectdeliveryid="SELECT id from delivery where purchase_date='$currentdate'";
$querydeliveryid=mysqli_query($con,$selectdeliveryid);
$deliveryidresult=mysqli_fetch_assoc($querydeliveryid);
$deliveryid=$deliveryidresult["id"];
// edited
$insertintodatabase= "INSERT into orders(cart_id,order_date,delivery_id) values";
$changecartstatus="";
include('functions.php');
	$customer_id=$_SESSION["customer_id"];
	$checkoutsql=buyallitems($customer_id);
	$checkoutvalues=runcheckoutsql($checkoutsql);
foreach ($checkoutvalues as $value) { 
    $currentdate=date("Y-m-d");
    $currentvalue=$value["id"]; 
    $insertintodatabase.= "($currentvalue,'$currentdate',$deliveryid),";
    $changecartstatus.="Update cart set status=1 where id=$currentvalue;";
}
$insertintodatabase=rtrim($insertintodatabase,",");
mysqli_query($con,$insertintodatabase);
$changestatusvalue=mysqli_multi_query($con,$changecartstatus);
if(!$changestatusvalue){
	die(mysqli_error($con));
}
echo "Operation Sucessful";
?>

