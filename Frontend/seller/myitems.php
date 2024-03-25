<?php
session_start();
include '../connection.php';
include 'sellerhomepage.php';

if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
$myid=$_SESSION['sellerid'];
$getallitems="Select * from product where seller_id=$myid";

$getallitemsvalue=mysqli_query($con,$getallitems);
if(!$getallitems){
	die(mysqli_error($con));
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style> 	*{
  		font-family: 'Roboto Slab', serif;
  	}


  		#all_items{
		width: 1680px;
  		height: 100%;

  	}
  	#product_container{
  	display: inline-block;
  	border-radius: 10px;
  	margin:10px;
  	margin-left: 40px;
  	height:340px;
  	width: 350px;
  	 box-shadow: 3px 3px #888888;
  	

  	
  	}
  	#product_image_container{
  		height: 210px;
  		width: 320px;
  		margin-left:15px;
  	}
  	#product_image{
  	height:200px;
  	width: 300px;
  	margin: auto;
  	display: block;
  	background-size: cover;
  	background-position: center;
  	
  

  	}
  	#product_price{
  		background: lightgreen;
  		width:120px;
  		height:30px;
  		margin-top:-29px;
  		border-radius:5px;
  		text-align: center;
  		margin-left:10px;
  		font-size:25px;

  	}
  	#product_name{
  		
  		height:40px;
  		text-align: center;
  		font-size: 25px;
  		border-radius: 5px;
  		

  	}
  
  	#details_btn{
  		width:110px;
  		height:40px;
  		border-radius:5px;
  		background: lightyellow;
  	}
  	#product_options{
  		display: flex;
  		height: 40px;
  		margin-top:2px;
  		margin-bottom: 2px;
      margin-left: 60px;

  	}
  	#active{
  		width: 110px;
  		height:40px;
  		margin-left:4px;
  		border-radius:5px;
  		background:lightblue;

  	}
  	#quantity{
  		width:110px;
  		height:35px;
  		border-radius:5px;
  	}
  </style>
</head>




<body>
	<div id="all_items">
  <?php
foreach($getallitemsvalue as $value){$status=$value["status"]?>
<div id="product_container">

<div id="product_image_container">
	<div id="product_image" style="background-image:url(<?php echo $value["photo"]  ?>); "></div>
	<div id="product_price"> Rs:<?php echo $value["price"]  ?></div>
</div>
<div id="product_name"><?php echo $value["name"]?></div>
<div id="product_options">
<div id="product_details">

	<form method="POST" action="additem.php?option=2">
  <input type="hidden" name="itemid" value="<?php print_r($value['id'])?>">
  <input type="submit" id="details_btn" name="Details" value="Edit"></form>
</div>	<div id="product_cart">

<form method="post" action="activeinactive.php">
   <input type="hidden" name="itemid" value="<?php print_r($value['id'])?>">
  <input type="submit" id="active" name="Add_To_Cart" value="Active/Inactive" 
  style="background-color:<?php if($status==0){echo '#fc5474';}else{echo 'lightgreen';}?>">
 </form>



</div>

</div>

<div >

</tr></div>
  </div>
<?php
}
?>
</div>
</body>
</html>