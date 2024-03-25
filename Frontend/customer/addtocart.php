<?php
include 'customerhomepage.php';
session_start();
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}

$quantity=$_POST["quantity"];
$customer_id=$_POST["customer_id"];
$product_id=$_POST["product_id"];
$order_quantity=$_POST["quantity"];
$getproduct_info="SELECT * from product where id =$product_id";
$getproduct_info_value= mysqli_query($con,$getproduct_info);
$fetch_getproduct_info_value=mysqli_fetch_assoc($getproduct_info_value);

$getcustomer_info="SELECT * from customer where id =$customer_id";
$getcustomer_info_value= mysqli_query($con,$getcustomer_info);
$fetch_getcustomer_info_value=mysqli_fetch_assoc($getcustomer_info_value);

$seller_id=$fetch_getproduct_info_value["seller_id"];
$price= $fetch_getproduct_info_value["price"];
$totalprice=$price*$quantity;
$delivery_location=$fetch_getcustomer_info_value["address"];
$order_date=date("Y-m-d");


$addtocart="INSERT into cart(customer_id,seller_id,product_id,order_date,order_quantity,total_price,delivery_address) VALUES($customer_id,$seller_id,$product_id,'$order_date',$order_quantity,$totalprice,'$delivery_location')";

$addtocartvalue=mysqli_query($con,$addtocart);
if(!$addtocartvalue){
	die(mysqli_error($con));
}
echo "<div id='message'>Operation Successful</div>";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
			.optionscontainer{
			
			height: 200px;
			margin-top: 20px;
			display: flex;
			padding-left: 570px;
			

		}
		.options{
			width: 200px;
			background-color: blue;
			border-radius: 30px;
			margin-left: 30px;
			background-size: cover;
			background-repeat: no-repeat;
			box-shadow: 3px 3px #888888;
			height: 100%;
			padding-top: 150px;
			font-size: 20px;

		}
		#shop{
			background-image: url(../images/shop.jpg);
			
		}
		#cart{
			background-image: url(../images/cart.jpg);
			
		}
		#message{
			text-align: center;
			font-size: 30px;
			margin-top: 200px;
			
		}
	</style>
</head>
<body>
	 <?php
foreach($getproduct_info_value as $value){?>

<div class="optionscontainer">
	<form method="POST" action="cart.php">
	<input type="hidden" name="id" value="<?php echo $value['id'] ;?>"><input type="submit" name="ViewMycart" value="Cart"class="options" id="cart">
</form>
	<form method="POST" action="product.php">
	<input type="submit" name="Shop More" value="Shop More" class="options" id="shop">
</form>



</div>



<?php
}
?>

</body>
</html>