<!DOCTYPE html>
<html lang="en">
<head>
    <?php
include ('Fonts/roboto.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Upachar</title>
<style type="text/css">
    
              <?php
include ('style.php');
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
             <li><a href="home.php">Home</a></li>
        <li><a href="customer/product.php">Product</a></li>
        </ul>   
    </div>
 <div class="buttons">
    <button type="button" class="button" name="ok"><a href="signupandlogin.php">Login</a></button>
    </div>

</div>
    
</body>


</html>