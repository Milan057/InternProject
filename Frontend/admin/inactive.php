<?php
session_start();
if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
include('../connection.php');
if(isset($_POST['inactiveactive'])){
	$id_to_active=$_POST["sellerid"];
	$active="UPDATE seller SET active=0 where id='$id_to_active'";
	mysqli_query($con,$active);
	 header('location:sellernameview.php');
}
?>
