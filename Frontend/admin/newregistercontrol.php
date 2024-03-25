<?php
include('../connection.php');
include ("adminhomepage.php");
$selectsql="SELECT * FROM seller where status =0";
$executequery=mysqli_query($con,$selectsql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>table,td,tr,th{

		border:1px solid black;
		border-collapse: collapse;

	}</style>
</head>
<body>
	<h1>New Register</h1>
	<?php
	foreach ($executequery as  $value) {
		?>
	
	
<table>
	<tr>
		<td><?php print_r($value['name']);?></td>
		<td><form method="Post" action="accept.php"><input type="hidden" name="sellerid" value="<?php print_r($value['id'])?>"><input type="submit" name="accept" value="Accept"></form></td>
		
	</tr>
</table>
<?php
}
?>
</body>
</html>