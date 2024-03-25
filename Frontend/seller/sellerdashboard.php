<?php
session_start();
include '../connection.php';
include 'sellerhomepage.php';

if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
header("location:myitems.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


</html>