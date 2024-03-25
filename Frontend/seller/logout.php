<?php
session_start();
if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
session_destroy();
header('location:../home.php');
?>