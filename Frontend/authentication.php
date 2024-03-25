<?php
session_start();
include('connection.php');

$email = $_POST['email'] ;
$password = $_POST['password'];
$target=$_POST['target'];

if($target==1){
$sql = "SELECT * FROM admin where email = '$email' and password ='$password'";
$san = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($san);

if($san->num_rows==1){

    $_SESSION['adminid']=$row['id'];
    $_SESSION['adminemail']=$row['email'];
    header('location:admin/admindashboard.php');
}
else{
    echo("Login Credential Not Matched!!");
}
}
if($target==2){
	$sql = "SELECT * FROM seller where email = '$email' and password ='$password'";
    $statuscheck="SELECT * FROM seller where email = '$email' and password ='$password' and status=1";
    $activecheck="SELECT * FROM seller where email = '$email' and password ='$password' and active=1";
$san = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($san);
$status=mysqli_query($con,$statuscheck);
$active=mysqli_query($con,$activecheck);
if($san->num_rows==1){

    $_SESSION['sellerid']=$row['id'];
    $_SESSION['selleremail']=$row['email'];
    $_SESSION['sellername']=$row['name'];
    $_SESSION['sellerpassword']=$row['password'];
    if($status->num_rows==1){
        if($active->num_rows==1){
        header('location:seller/sellerdashboard.php');   
        }else{
            header('location:loginform.php?source=2?err=4');
        }
    }
        else{
            header('location:loginform.php?source=2?err=3');
        }
}else{
header('location:loginform.php?source=2?err=2');
}
}
if($target==3){
	$database="customer";
	$dashboard="customer/customerdashboard.php";
	$sql = "SELECT * FROM customer where email = '$email' and password ='$password'";
$san = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($san);

if($san->num_rows==1){

    $_SESSION['customerid']=$row['id'];
    $_SESSION['customeremail']=$row['email'];
    $_SESSION['customername']=$row['name'];
    $_SESSION['customerpassword']=$row['password'];

    header('location:customer/customerdashboard.php');

}
else{
    echo("Login Credential Not Matched!!");
}
}

 //location after authentication success




?>