<?php
include('../connection.php');
include ("adminhomepage.php");
if(isset($_POST['submit'])){
$CategoryName=$_POST["Categoryname"];
$selectcategory="SELECT category_name from categories where category_name='$CategoryName'";
$selectdata=mysqli_query($con,$selectcategory);
if($selectdata->num_rows!=1){
	$data="INSERT into categories(category_name)values('$CategoryName')";
	$insertdata=mysqli_query($con,$data);
	?>
	<script type="text/javascript">
	alert("Category is sucessfully inserted");
</script>
<?php
}
else{
	?>
	<script type="text/javascript">
	alert("Already Category is added");
</script>
<?php
}
}
$select="SELECT * from categories";
$allinformation=mysqli_query($con,$select);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table,td,th,tr{
			border:1px solid black;
			border-collapse: collapse;
		}
		table{
			width: 430px;
		}
		#editbtn,#deletebtn{
			width: 100%;
			height: 70px;
			border:none;
		}
	</style>
</head>
<body>
<form method="POST">
	<fieldset style="width: 400px">
		<legend>Add Category</legend>
		<label>CategoryName<input type="text" name="Categoryname" required></label><br>
	
		<input type="Submit" style="height:30px; background: lightgreen; border-radius: 20px; padding:5px; " name="submit" value="Add">
	</fieldset>
</form>
<table>
<?php
foreach ($allinformation as $value) {
?>

	<tr>
		<td><h3><?php print_r($value['category_name']);?></h3></td>
		<td><form method="Post" action="editcategory.php"><input type="hidden" name="categoryid" value="<?php print_r($value['id'])?>"><input type="submit" name="edit" id="editbtn" value="Edit"></form></td>
		<td><form method="Post" action="deletecategory.php"><input type="hidden" name="categoryid" value="<?php print_r($value['id'])?>"><input type="submit" name="delete" id="deletebtn" value="Delete"></form></td>
	</tr>

<?php
}
?>
</table>
</body>
</html>