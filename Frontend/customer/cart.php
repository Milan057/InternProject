<?php
session_start();
include '../connection.php';
include 'customerhomepage.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}

$getscustomer_id=$_SESSION['customerid'];
$data=mysqli_query($con,"SELECT * from cart where customer_id='$getscustomer_id'");
$product="SELECT cart.id,product.name, product.photo, cart.order_date,cart.total_price,cart.order_quantity,cart.delivery_address,cart.status FROM product LEFT JOIN cart ON product.id = cart.product_id where customer_id='$getscustomer_id' && cart.status='0'";
$fetch=mysqli_query($con,$product);
if (!$fetch) {
	die(mysqli_error($con));
}
$numrows=mysqli_num_rows($fetch);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
  	*{
  		font-family: 'Roboto Slab', serif;
  	}


  		#all_items{
		width: 1680px;
  		height: 100%;
  		margin-top:15px;

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

  	}
  	#cart_btn{
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
    #message{
      text-align: center;
      color: red;
      margin-top: 280px;
      font-size: 30px;
    }
  	#purchase_item{
			font-size: 20px;
			height: 60px;
			width: 200px;
			display: inline-block;	
			border-radius: 25px;
			background: lightgreen;
			margin-top: 10px;
			box-shadow: 3px 3px #888888;	
     display: inline;
			animation: buttonanimation 3s infinite ease-in-out;
      margin-top: -70px;
      margin-left: 150px;
      position: absolute;
		}
		@keyframes buttonanimation{
			0%{	
				
				
				box-shadow: 0px 0px #888888;
			}
			50%{
				
				
				box-shadow: 0px 0px 1px 1px #888888;
			}
			100%{
				
			
				box-shadow: 0px 0px #888888;
			}

		}

  </style>
</head>

<body>
<h1>My Cart</h1>  <?php if($numrows!=0){?>
  <form method="POST" action="cartoptions.php" >
    <input type="hidden" name="customer_id" value="<?php echo $getscustomer_id?>">
    <input type="submit" id="purchase_item" class="purchase_item" name="buyall" value="Checkout" >
</form>
  <?php }else{?>
<div id="message">Cart is Empty</div>
  
<?php }?>
<h1>--------------------------------------------------------------------------------------------------------------------------------</h1>
	<div id="all_items">

  <?php
foreach($fetch as $value){?>
<div id="product_container">

<div id="product_image_container">
	<div id="product_image" style="background-image:url(<?php echo $value["photo"]  ?>); "></div>
	<div id="product_price"> Rs:<?php echo $value["total_price"]  ?></div>
</div>
<div id="product_name"><?php echo $value["name"]?></div>
<div id="product_options">
<div id="product_details"><form method="POST" action="cartproductdetails.php"><input type="hidden" name="Order_Date" value="<?php echo $value["order_date"]  ?>"><input type="hidden" name="Description" value="<?php echo $value["description"]  ?>"><input type="hidden" name="Expiry_Date" value="<?php echo $value["expiry_date"]  ?>"><input type="hidden" name="Order_Quantity" value="<?php echo $value["order_quantity"]  ?>"><input type="hidden" name="Delivery_Location" value="<?php echo $value["delivery_address"]  ?>"><input type="submit" id="details_btn" name="Details" value="Details"></form></div>	<div id="product_cart">
	<form method="post" action="cartoptions	.php">

  
  <input type="hidden" name="customer_id" value="<?php echo $customer_id?>">
  <input type="hidden" name="cart_id" value="<?php echo  $value["id"] ?>"><input type="submit" id="cart_btn" name="remove_id" value="Remove" >
  <input type="submit" name="quantity" id="quantity" value="Qt: <?php echo $value["order_quantity"]?>" onclick="return false">
   </form>

  <form method="post" action="addtocart.php"> <input type="hidden" name="id" value="<?php echo  $value["id"] ?>">
<input type="hidden" name="Item_Name" value="<?php echo $value["product"]?>">
<input type="hidden" name="Price" value="<?php echo $value["price"]?>">
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