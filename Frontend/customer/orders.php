<?php
session_start();
include 'customerhomepage.php';
include '../connection.php';

if(!isset($_SESSION['customerid'])){
	die("Login Required! <a href='"."../loginform.php?source=3'>Click Here</a>"); 
}
$customer_id=$_SESSION['customerid'];
$selectorder="SELECT delivery.id as delivery_id,delivery.purchase_date,delivery.success_status as success_status,cart.id as cart_id,cart.seller_id as sellerid,cart.total_price as price,cart.status as cartstatus,product.id as product_id,product.name as product_name, seller.name as seller_name ,cart.order_quantity as quantity,delivery.involved_vendors as involved_vendors,delivery.ready_vendors as ready_vendors from delivery RIGHT JOIN orders on delivery.id=orders.delivery_id RIGHT JOIN cart on cart.id=orders.cart_id RIGHT JOIN product on cart.product_id= product.id RIGHT JOIN seller on cart.seller_id=seller.id where cart.customer_id=$customer_id;";
$selectorderquery=mysqli_query($con,$selectorder);
if(!$selectorderquery){
                die(mysqli_error($con));
              
              }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table,td,tr,th{
	border: 1px solid black;
	border-collapse: collapse;
	margin-top: 30px;
	margin-left: 50px;



}
tr{
	height: 60px;
}

	</style>
	 </head>
	  <body>
	  <h1>My Orders</h1> 
	  	<table>
	  	 <tr style="background-color: lightgreen"> 
	  	 	<th style="width:300px;">Product Name</th> <th style="width:100px;">Quanity</th>
			<th style="width:180px;">Purchase Date</th> <th style="width:100px;
text-align: center;">Price</th> <th style="width:300px;">Seller Name</th> <th
style="width: 180px;">Delivery Status</th> </tr> <?php foreach($selectorderquery as
$value){ if(!$value['cartstatus']==0){ ?> <tr style="background-color: <?php if($value['success_status']!=1){echo "#fc5474";}?>"> <td><?php echo
$value['product_name'] ;?></td> <td style="width:100px; text-align:
center;"><?php echo $value['quantity'] ;?></td> <td><?php echo
$value['purchase_date'] ;?></td> <td style="width:100px; text-align:
center;"><?php echo $value['price'] ;?></td> <td><?php echo
$value['seller_name'] ;?></td> <td><?php 
if($value['involved_vendors']==$value['ready_vendors'] &&
$value['success_status']==0){echo "Order Processing";  }
if($value['success_status']==1){echo "Delivered"; }
if($value['involved_vendors']!=$value['ready_vendors']) {echo "Order
Processing";} ?></td> </tr> <?php }} ?> </table>

</body>
</html>
