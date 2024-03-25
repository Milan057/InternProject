<?php

include '../connection.php';
include ("adminhomepage.php");

if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php'>Click Here</a>"); 


}
$idtoedit=$_POST['sellerid'];

$idtoeditquery="Select active from seller where id=$idtoedit";


$idtoeditvalue=mysqli_query($con,$idtoeditquery);
$fetchedvalue=mysqli_fetch_assoc($idtoeditvalue);
$currentstatus=$fetchedvalue['active'];

if($currentstatus==1){
    mysqli_query($con,"Update seller set active=0 where id=$idtoedit");
}else{
    mysqli_query($con,"Update seller set active=1 where id=$idtoedit");
}

echo "Processing";
header('location:sellernameview.php');
?>

