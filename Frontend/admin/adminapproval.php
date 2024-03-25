<?php
include '../connection.php';
include ("adminhomepage.php");


$delivery_id= $_POST['delivery_id'];


$setreadyvendors="Update delivery set success_status=1 where id='$delivery_id';";
$setreadyvendorsquery=mysqli_query($con,$setreadyvendors);
header("location:orders.php");




?>
