<?php
session_start();
if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
include('../connection.php');
if(isset($_POST['accept'])){
	$id_to_active=$_POST["sellerid"];
	$active="UPDATE seller SET status=1 where id='$id_to_active'";
	mysqli_query($con,$active);
	 header('location:newregistercontrol.php');
}
?>
