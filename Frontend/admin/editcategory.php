<?php
include('../connection.php');
include ("adminhomepage.php");

if(isset($_POST['edit'])){
$_SESSION['id']	=$_POST["categoryid"];	
}
$categoryid=$_SESSION['id'];
// echo $categoryid;
$selectquery="SELECT * from categories where id='$categoryid'";
$selectquery_value=mysqli_query($con,$selectquery);
if(!$selectquery_value){
	die(mysqli_error($con));
}
$data=mysqli_fetch_assoc($selectquery_value);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<fieldset style="width: 400px;">
		<legend>Edit Category</legend>
		<label>CategoryName:<input type="text" name="editname" value="<?php echo $data['category_name']?>"></label><br>
		<input type="Submit" name="ok" id="submit" value="Enter">
	</fieldset>
</form>
</body>
</html>
<?php
if(isset($_POST['ok'])){
	$categoryname=$_POST["editname"];
	$sql="UPDATE categories set category_name='$categoryname' where id='$categoryid'";
	mysqli_query($con,$sql);
	header("location:addcategory.php");
}




?>