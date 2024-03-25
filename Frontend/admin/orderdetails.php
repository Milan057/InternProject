<?php
include '../connection.php';
include ("adminhomepage.php");



if(isset($_POST['ordersubmit'])){
$delivery_id=$_POST['delivery_id'];
$moredetails="SELECT * from adminview where delivery_id=$delivery_id";
$moredetailsquery=mysqli_query($con,$moredetails);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
<tr>
<th>Product Name</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Delivery Address</th>
</tr>
<?php foreach ($moredetailsquery as $value) { ?>
<tr>
<td><?php echo $value['product_name'];?></td>
<td><?php echo $value['order_quantity'];?></td>
<td><?php echo $value['price'];?></td>
<td><?php echo $value['delivery_address'];?></td>
</tr>
<?php }}?>


</table>
</body>
</html>






