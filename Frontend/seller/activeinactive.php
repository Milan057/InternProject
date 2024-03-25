<?php
session_start();
include '../connection.php';

if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 


}
$idtoedit=$_POST['itemid'];

$idtoeditquery="Select status from product where id=$idtoedit";


$idtoeditvalue=mysqli_query($con,$idtoeditquery);
$fetchedvalue=mysqli_fetch_assoc($idtoeditvalue);
$currentstatus=$fetchedvalue['status'];

if($currentstatus==1){
	mysqli_query($con,"Update product set status=0 where id=$idtoedit");
}else{
	mysqli_query($con,"Update product set status=1 where id=$idtoedit");
}

echo "Processing";
header('location:myitems.php');
?>