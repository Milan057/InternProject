<?php
session_start();
include '../connection.php';


;
if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
header("location:product.php");
?>
