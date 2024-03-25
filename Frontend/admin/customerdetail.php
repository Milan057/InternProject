<?php
include('../connection.php');
include ("adminhomepage.php");
$selectsql="SELECT * FROM customer";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
				#form{
			border:1px solid black;
			width: 600px;
			margin-left: 500px;
			margin-top: 100px;
			box-shadow: 3px 3px #888888;
			border-radius: 15px;
			padding:3px;
			
		}
		#submit{
			height: 30px;
			border-radius: 10px;
			background: lightgreen;
		}
		#field{
			width: 98%;
			height:40px;
			font-size: 17px;
		}
		table,tr,td,th{
			
			width: 600px;
			border:1px solid black;
			border:1px solid black;
	  border-collapse: collapse;
		}
		tr{
			height:50px;
		}
		td{
			
		}
		
		#submittd{
			text-align: center;
		}
		#activebtn{
			width: 100%;
			height: 50px;
			background-color: lightyellow;
			border:none;

		}

	</style>
</head>
<body>
	<h1>List of Customer:</h1>
	<table>
	<tr>
			<th id="field">Name</th>
			<th id="field">Email</th>
			<th id="field">Address</th>
			<th id="field">Contact</th>
			<th id="field">Action</form></td>	
		</th>

	<?php
	foreach ($executequery as  $value) {
		$status=$value['status'];
		
		?>
	
	

	<tr style="background-color: <?php if($status!=1){echo "#fc5474";}?>">
		
			<td id="field"><?php print_r($value['name']);?></td>
			<td id="field"><?php print_r($value['email']);?></td>
			<td id="field"><?php print_r($value['address']);?></td>
			<td id="field"><?php print_r($value['contact_number']);?></td>
			<td id="field"><form method="Post" action="customeractive.php"><input type="hidden" name="customerid" value="<?php print_r($value['id'])?>"><input type="submit" name="active" value="Active/Inactive" id="activebtn"></form></td>	
		</tr>

</table>
<?php
}
?>
</body>

</html>