<?php
include '../connection.php';
include 'sellerhomepage.php';
session_start();
if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
$seller_id=$_SESSION['sellerid'];
$seller_name= $_SESSION['sellername'];
$seller_email=$_SESSION['selleremail'];
$seller_username="seller";
$seller_username.=$seller_id;
$_SESSION['seller_username']=$seller_username;

$create_order_view="CREATE or Replace view $seller_username as SELECT delivery.id as delivery_id,delivery.purchase_date,cart.id as cart_id,cart.seller_id as sellerid,cart.total_price as price,product.id as product_id,product.name as product_name, customer.name as customer_name,cart.order_quantity,cart.delivery_address,cart.status as cartstatus, delivery.involved_vendors as involved_vendors,delivery.ready_vendors as ready_vendors,delivery.success_status as success_status from delivery RIGHT JOIN orders on delivery.id=orders.delivery_id RIGHT JOIN cart on cart.id=orders.cart_id RIGHT JOIN product on cart.product_id= product.id RIGHT JOIN customer on cart.customer_id=customer.id where cart.seller_id=$seller_id";

$create_order_view_query=mysqli_query($con,$create_order_view);
if(!$create_order_view_query){
	die(mysqli_error($con));
}
$select_distinct_delivery="Select distinct delivery_id,purchase_date,customer_name,ready_vendors,involved_vendors,success_status,cartstatus  from $seller_username;";
$select_distinct_delivery_query=mysqli_query($con,$select_distinct_delivery);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	table,tr,td,th{
		border:1px solid black;
		border-collapse: collapse;
		font-size: 17px;
	}	
	th{
		width: 200px;
	}
	tr{
		height: 40px;
	}
	#Moretd{
		width:20px;

	}
	#Actiontd{
		border:1px solid white;
		background-color: white;
	}
	
	

	</style>
</head>
<body>
	<h1>Orders</h1>
<table>
<tr>
<th>Costumer Name</th>
<th>Order Date</th>
<th>Status</th>
<th id="Moretd">Options</th>
<th id="Actiontd" ></th>
</tr>
<?php foreach ($select_distinct_delivery_query as $value) { 
	if(!$value['cartstatus']==0){
$delivery_id= $value['delivery_id'];
$testsentstatus="SELECT id from vendorapproval where delivery_id='$delivery_id' AND vendor_id='$seller_id';";
$testsentstatusquery=mysqli_query($con,$testsentstatus);
$numrows=mysqli_num_rows($testsentstatusquery);
	?>
<tr style="background-color: <?php if($value['success_status']!=1){echo "#fc5474";}?>">
<td><?php echo $value['customer_name'];?></td>
<td><?php echo $value['purchase_date'];?></td>
<td>
	
	<?php 
		if($value['involved_vendors']==$value['ready_vendors'] && $value['success_status']==0){echo "Order Processing";  }
			if($value['success_status']==1){echo "Delivered";
		}
			 if($value['involved_vendors']!=$value['ready_vendors']) {echo "Order Processing";} ?></td>
<td style="text-align: center;"><form method="POST" action="orderdetails.php">
	<input type="hidden" name="delivery_id" value="<?php echo $value['delivery_id'];?>">
	<input type="submit" style="background-color: lightyellow;border:1px solid black;" name="ordersubmit" value="More Details" id="More">
</form></td>
<td id="Actiontd">
	<form method="POST" action="vendorapproval.php">
	<input type="hidden" name="delivery_id" value="<?php echo $value['delivery_id'];?>">
	<input type="hidden" name="seller_id" value="<?php echo $seller_id;?>">
<input type="submit"  name="sent" value="Approve" style="background-color: lightgreen;border:1px solid black;display:<?php if($numrows==1){echo "none;";}?>">
</form>
</td>


</tr>
<?php }}?>


</table>
</body>
</html>