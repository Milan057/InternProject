<?php
include('../connection.php');
include ("adminhomepage.php");
$selectsql="SELECT * FROM seller";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>		#form{
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
		#namebtn{
			width: 100%;
			height: 50px;
			border:none;

		}
	</style>
</head>

<body>
	<h1>List of Sellers:</h1>
	<table>
	<tr>
			<th id="field">Name</th>
			<th id="field">Action</th>
		
		</tr>

	<?php
	foreach ($executequery as  $value) {
		$status=$value['active'];
		
		?>
	
	

	<tr style="background-color: <?php if($status!=1){echo "#fc5474";}?>">
		
			<td id="field" ><form method="Post" action="sellerdetail.php"><input type="hidden" name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit" name="sellername" value="<?php print_r( $value['name']) ?> " id="namebtn"style="background-color: <?php if($status!=1){echo "#fc5474";}?>"></form></h2></td>
			<td id="field"><form method="Post" action="selleractive.php"><input type="hidden" name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit" name="active" value="Active/Inactive" id="activebtn"></form></td>	
		</tr>


<?php
}
?>
</table>
</body>


</html>