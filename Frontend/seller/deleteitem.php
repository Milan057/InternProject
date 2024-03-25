<?php
session_start();
include '../connection.php';

if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 


}
$idtodelete=$_POST['itemid'];

$deletequery="Delete from product where id=$idtodelete";
echo "Processing";
$deletequery=mysqli_query($con,$deletequery);

header("location:myitems.php");
?>