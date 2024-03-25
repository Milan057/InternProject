<?php
session_start();
if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
session_destroy();
header('location:../home.php');
?>