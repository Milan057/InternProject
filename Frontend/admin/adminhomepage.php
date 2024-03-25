<!DOCTYPE html>
<html lang="en">
<head>
    <?php
session_start();
if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php>Click Here</a>"); 
}
include ('../Fonts/roboto.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    
              <?php
include ('adminstyle.php');
      ?>
</style>

</head>
<body>
<div class="content1">
	
    <div class="nav">
        
    
    <div class="nav-logo">
    <h2>Mero Store</h2>
    </div>
    <div class="nav-search">
        <div class="search" style= "display:<?php if(isset($searchneeded)&&$searchneeded=1){echo "block";}else{echo "none";}?>;">  
<form method="POST">
    <input type="text" name="keyword" id="keyword" placeholder="......................Type Here To Search.....................................">
    <input type="submit" name="searchbtn" value="GO" id="searchbtn">

</form>


</div>
    </div>
    <div class="nav-links">
        <ul>
             
        <li><a href="addcategory.php">Add Category</a></li>
        <li><a href="sellernameview.php">Seller Details</a></li>
        <li><a href="newregistercontrol.php">New Register</a></li>
        <li><a href="customerdetail.php">Customer Details</a></li>
        <li><a href="orders.php">Orders</a></li>
        </ul>   
    </div>
 <div class="buttons">
    <button type="button" class="button" name="ok" id="account"><a href="login_logout.php">Log Out</a></button>
    </div>

</div>
    
</body>


</html>