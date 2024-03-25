<?php
include 'customerhomepage.php';
$description= $_POST['Description'];
$name=$_POST['name'];
$expiry_date=$_POST['expiry_date'];
$quantity=$_POST['qty'];
$seller=$_POST['seller_name'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	table, th, td {
  	border: 1px solid black;
   border-collapse: collapse;
}
table{
	margin: 10px;
	min-width: 300px;
	text-align: left;
	padding: 10px;

	}
	</style>

</head>
<body>
<table>
<tr>
<th>Name</th>
<td><?php echo $name ?></td>
</tr>
<tr>
<th>Description</th>
<td><?php echo $description;?></td>
</tr>
<tr>
<th>Expiry Date</th>
<td><?php echo $expiry_date;?></td>
</tr>
<tr>
<th>Stock</th>
<td><?php echo $quantity;?></td>
</tr>
</tr>
<tr>
<th>Seller</th>
<td><?php echo $seller;?></td>
</tr>
</table>
</body>
</html>