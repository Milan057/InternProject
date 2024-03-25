<?php
include"homepage.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.optionscontainer{
			
			height: 200px;
			margin-top: 200px;
			display: flex;
			padding-left: 570px;
			

		}
		.options{
			width: 200px;
			background-color: blue;
			border-radius: 30px;
			margin-left: 30px;
			background-size: cover;
			background-repeat: no-repeat;
			box-shadow: 3px 3px #888888;
			height: 100%;
			padding-top: 130px;
			font-size: 20px;

		}
		#seller{
			background-image: url(images/seller.jpg);
			
		}
		#costumer{
			background-image: url(images/buyer.jpg);
			
		}
		#register_message{
			margin-left: 650px;
			margin-top: 20px;
		}
	</style>
</head>
<body>

<div class="optionscontainer">
	<a href="signup.php?getsource=3"><input type="submit" value="Buyer" class="options" id="costumer"></a>
	<a href="signup.php?getsource=2"><input type="submit" value="Seller" class="options" id="seller"></a>

</div>

</body>
</html>

		
