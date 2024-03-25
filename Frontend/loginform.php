<?php
include"homepage.php";
if(isset($_GET['source'])){
$target=$_GET['source'];
}else{
	$target=1;
}
if($target==1){
	$target_name="Admin";
}
if($target==2){
	$target_name="Seller";
}
if($target==3){
	$target_name="Customer";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.errorfield{
			text-align: center;
		}
		#form{
			border:1px solid black;
			width: 450px;
			padding-left: 200px;
			margin-left: 450px;
			margin-top: 200px;
			box-shadow: 3px 3px #888888;
			border-radius: 15px;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		#submit{
			height: 30px;
			border-radius: 10px;
			background: lightgreen;
		}
	</style>
</head>

<body>

	<form method="post"  name="loginform"action = "authentication.php" onsubmit = "return formValidation()">

<div id="border">
	


<?php
			if(isset($_GET['err'])&& $_GET['err']==1){?>
			<center><p id="login_error" class="errorfield" >Please Login to Continue!!</p></center>
<?php
}
?>
<div id="form">
	<h1><?php echo $target_name?> Login</h1>
<table>
<tr>
<td><label>Email:</label></td>
<td><input type="text" name="email" class="textbox"></td>
</tr>	
<tr>
<td><label>Password:</label></td>	
<td><input type="password" name="password" class="textbox"/></td>
</tr>
<input type="hidden" name="target" value="<?php echo $target?>">
<tr>
	<td td colspan="2">
<p id="nameerror" class="errorfield" ></p>
</td>
</tr>
<tr>
	<td td colspan="2">
<p id="passerror" class="errorfield"></p>
</td>


</tr>
<tr>
	<td td colspan="2">
<center><input type="submit" name="ok" id="submit" value="Submit"></center>
</td>
</tr>

</form>
</table>
</div>
<script type="text/javascript">

	function formValidation(){
		var email=document.loginform.email.value;
		var password= document.loginform.password.value;
		var error=false;
		if(email==""){
			error=true;
			printErrorMessage("nameerror","Email can't be empty!!");
		}else{
			printErrorMessage("nameerror","");
		}
		if(password==""){
			error=true;
			printErrorMessage("passerror","Password can't be empty!!");
		}
		else{
			printErrorMessage("passerror","");
		}
		if(error==true){
			return false;
		}else{
			return true;
		}
 	}

 	function printErrorMessage(id,message){
 		document.getElementById(id).innerHTML=message;
 	}
 	


</script>
</body>
</html>
