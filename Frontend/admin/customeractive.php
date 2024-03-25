<?php

include '../connection.php';
include ("adminhomepage.php");

if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php'>Click Here</a>"); 


}
$idtoedit=$_POST['customerid'];

$idtoeditquery="Select status from customer where id=$idtoedit";


$idtoeditvalue=mysqli_query($con,$idtoeditquery);
$fetchedvalue=mysqli_fetch_assoc($idtoeditvalue);
$currentstatus=$fetchedvalue['status'];

if($currentstatus==1){
    mysqli_query($con,"Update customer set status=0 where id=$idtoedit");
}else{
    mysqli_query($con,"Update customer set status=1 where id=$idtoedit");
}

echo "Processing";
header('location:customerdetail.php');
?>

