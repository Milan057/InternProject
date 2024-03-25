<?php
session_start();
$searchneeded=1;

include '../connection.php';
include 'customerhomepage.php';
$serachkeyword  ="";
if(isset($_POST['searchbtn'])){
  $serachkeyword  =$_POST['keyword'];
}
if(isset($_SESSION['customerid'])){
$customer_id=$_SESSION['customerid'];
}else{
  $customer_id=-1;
}
if($serachkeyword!=""){
    $data=mysqli_query($con,"SELECT product.id as product_id,product.photo as photo, product.name as name,product.description as description, product.price as price, product.quantity as quantity, seller.id,seller.status,product.status, seller.active, product. category_id as category_id,product.expiry_date,seller.name as seller_name  from product left join seller on product.seller_id=seller.id where  tag like '%$serachkeyword%' and  seller.status=1 and product.status=1 and seller.active=1;");
   
}else{
$data=mysqli_query($con,"SELECT product.id as product_id,product.photo as photo, product.name as name,product.description as description, product.price as price, product.quantity as quantity, seller.id,seller.status,product.status, seller.active, product. category_id as category_id,product.expiry_date,seller.name as seller_name  from product left join seller on product.seller_id=seller.id where seller.status=1 and product.status=1 and seller.active=1;");

}
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

  </style>
</head>
<body>
	<div id="all_items">
  <?php
foreach($data as $value){?>
<div id="product_container">

<div id="product_image_container">
	<div id="product_image" style="background-image:url(<?php echo $value["photo"]  ?>); "></div>
	<div id="product_price"> Rs:<?php echo $value["price"]  ?></div>
</div>
<div id="product_name"><?php echo $value["name"]?></div>
<div id="product_options">
<div id="product_details"><form method="POST" action="productdetails.php">
  <input type="hidden" name="qty" value="<?php echo $value["quantity"]  ?>">
  <input type="hidden" name="Description" value="<?php echo $value["description"]  ?>">
  <input type="hidden" name="expiry_date" value="<?php echo $value["expiry_date"]  ?>">
  <input type="hidden" name="seller_name" value="<?php echo $value["seller_name"]  ?>">
  <input type="hidden" name="name" value="<?php echo $value["name"]?>">
  <input type="submit" id="details_btn" name="Details" value="Details"></form>
</div>	<div id="product_cart">

	<form method="post" action="<?php if($customer_id==-1){echo "../loginform.php?source=3";}else{echo "addtocart.php";}?>">
   <input type="hidden" name="customer_id" value="<?php echo $customer_id?>">
  <input type="hidden" name="product_id" value="<?php echo $value["product_id"] ?>">
  <input type="submit" id="cart_btn" name="Add_To_Cart" value="Add to cart">
  <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity" required>
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