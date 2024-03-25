<?php
session_start();
if(!isset($_SESSION['sellerid'])){
	die("Login Required! <a href='"."../loginform.php?source=2'>Click Here</a>"); 
}
$getseller_id=$_SESSION['sellerid'];
include '../connection.php';
include 'sellerhomepage.php';
$path=__DIR__;
$getcategory="Select * from categories";
$category_value=mysqli_query($con,$getcategory);
if(!$category_value){
	die(mysqli_error($con));


}
if($_GET["option"]==2){
	echo"<h1>Edit Item</h1>";
	//if(!$_POST['itemid']){
	//	header("location:myitems.php");
	//}
	if(isset($_POST['itemid'])){
		$_SESSION['itemid']=$_POST['itemid'];
	}
	$idtoedit=$_SESSION['itemid'];
	$olddata="SELECT * from product where id=$idtoedit";
	$olddatavalue=mysqli_query($con,$olddata);
	$fetchedoldvalue=mysqli_fetch_assoc($olddatavalue);

	$name=$fetchedoldvalue['name'];
	$oldphoto=$fetchedoldvalue['photo'];

	$price=$fetchedoldvalue['price'];
	$quantity=$fetchedoldvalue['quantity'];
	$category_id=$fetchedoldvalue['category_id'];
	$seller_id=$fetchedoldvalue['seller_id'];
	$tag=$fetchedoldvalue['tag'];
	$expiry_date=$fetchedoldvalue['expiry_date'];
	$description=$fetchedoldvalue['description'];

}else{
	echo"<h1>Add Item</h1>";
}
if(isset($_POST["saveitem"])){
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path."/itemsphoto"."/".$_FILES["photo"]["name"]);


	$name=$_POST["name"];
	$photo='/ecommerce/seller/itemsphoto/'.$_FILES["photo"]["name"];
	if($_FILES["photo"]["name"]==""){
		$photo=$oldphoto;
	}
	$price=$_POST["price"];
	$quantity=$_POST["quantity"];
	$category_id=$_POST["category_id"];
	$seller_id=$getseller_id;
	$tag=$_POST["tag"];
	$expiry_date=$_POST["expiry_date"];
	$description=$_POST["description"];

if($_GET["option"]==2){
$insertitems="Update product SET name='$name',photo='$photo',seller_id='$seller_id',category_id='$category_id',price='$price',tag='$tag',quantity='$quantity',expiry_date='$expiry_date',description='$description' where id=$idtoedit";
}else{
	$insertitems="Insert into product(name,photo,seller_id,category_id,price,tag,quantity,expiry_date,description,status) values('$name','$photo','$seller_id','$category_id','$price','$tag','$quantity','$expiry_date','$description',1);";
}
	$insertitems_value=mysqli_query($con,$insertitems);
	if(!$insertitems_value){
		die(mysqli_error($con));
	}
header("location:myitems.php");

	
//header("location:../success.php");

}


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
			border:none;
			font-size: 17px;
		}
		table{
			
			width: 600px;
		}
		tr{
			height:50px;
		}
		td{
			border:1px solid black;
	  border-collapse: collapse;
		}
		#names{
			background-color: grey;
			text-align: center;
			
		}
		#submittd{
			text-align: center;
		}

	</style>
</head>
<body>
	<?php if($_GET['option']!=2){ ?>
<form id="form" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td id="names"><label>ItemName*</label></td>
			<td><input id="field" type="text" name="name" required></td>	
		</tr>
		<tr>
			<td id="names"><label>Photo*</label></td>
			<td><input id="field" type="file" name="photo" accept="image/x-png,image/jpeg"required></td>	
		<tr>
			<td id="names"><label>Price*</label></td>
			<td><input id="field" type="text" name="price" required></td>
		</tr>
		<tr>
			<td id="names"><label>Quantity*</label></td>
			<td><input id="field" type="text" name="quantity" required></td>
		</tr>
		<tr>
			<td id="names"><label>Category*</label></td>
			<td><select id="field" name="category_id" id="category_id" required>	<?php
					foreach($category_value as $value){?>
					<option value=<?php print_r($value["id"]); ?> ><?php print_r($value["category_name"]); ?></option>
					<?php }?>	
				</select>
			</td>
		</tr>
	

		<tr>
			<td id="names"><label>Expiry Date</label></td>
			<td><input id="field" type="date" name="expiry_date"></td>
		</tr>
		<tr>
			<td id="names"><label>Description</label></td>
			<td><input id="field" type="text" name="description" required></td>
		</tr>
		<tr>
			<td id="names"><label>Tags*</label></td>
			<td><input id="field" type="text" name="tag"></td>
		<tr>
			<td colspan="2" id="submittd"><input type="submit" name="saveitem" id="submit" value="Add Item"></td>
		</tr>
</table>
</form>
<?php }else{?>

<!--Form for edit condition!-->
<form id="form" method="POST" enctype="multipart/form-data">
		<table>
		<tr>
			<td id="names"><label>ItemName*</label></td>
			<td><input id="field" type="text" name="name" value="<?php echo $name ?>"required>	</td>	
		</tr>
		<tr>
			<td id="names"><label>Photo*</label></td>
			<td><input id="field" type="file" name="photo" accept="image/x-png,image/jpeg"></td>	
		<tr>
			<td id="names"><label>Price*</label></td>
			<td><input id="field" type="text" name="price" value="<?php echo $price ?>" required></td>
		</tr>
		<tr>
			<td id="names"><label>Quantity*</label></td>
			<td><input id="field" type="text" name="quantity"value="<?php echo $quantity ?>" required></td>
		</tr>
		<tr>
			<td id="names"><label>Category*</label></td>
			<td><select id="field" name="category_id" id="category_id"value="<?php echo $category_id?>" required>
	<?php
	foreach($category_value as $value){?>
	<option <?php if($category_id==$value["id"]){echo 'selected="selected"';} ?>value=<?php print_r($value["id"]); ?> ><?php print_r($value["category_name"]); ?></option>
<?php	
}
?>	
	
</select>
			</td>
		</tr>
	

		<tr>
			<td id="names"><label>Expiry Date</label></td>
			<td><input id="field" type="date" name="expiry_date"value="<?php echo $expiry_date ?>"></td>
		</tr>
		<tr>
			<td id="names"><label>Description</label></td>
			<td><input id="field" type="text" name="description"value="<?php echo $description ?>" required></td>
		</tr>
		<tr>
			<td id="names"><label>Tags*</label></td>
			<td><input id="field" type="text" name="tag" value="<?php echo $tag ?>"></td>
		<tr>
			<td colspan="2" id="submittd"><input type="submit" name="saveitem" id="submit" value="Add Item"></td>
		</tr>
</table>
</form>
<?php }?>

</body>
</html>