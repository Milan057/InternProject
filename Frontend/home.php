<?php
include"homepage.php";
?>
<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
		*{
    		font-family: 'Roboto Slab', serif;

			}
		.imageanimation_a{
			margin-top:50px;
			/*background-color: red;*/
			height: 400px;
			width: 500px;
			margin-left: 40px;
			background-image: url(images/packing.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			border-radius: 20px;
			box-shadow: 3px 3px #888888;
			animation: change_a 10s infinite ease-in-out;

		}
		.imageanimation_b{
			margin-top:50px;
			/*background-color: red;*/
			height: 400px;
			width: 500px;
			margin-left: 40px;
			background-image: url(images/packing.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			border-radius: 20px;
			box-shadow: 3px 3px #888888;
			animation: change_b 10s infinite ease-in-out;

		}
		.imageanimation_c{
			margin-top:50px;
			/*background-color: red;*/
			height: 400px;
			width: 500px;
			margin-left: 40px;
			background-image: url(images/packing.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			border-radius: 20px;
			box-shadow: 3px 3px #888888;
			animation: change_c 10s ;

		}
		@keyframes change_a{
			0%{
				background-image: url(images/electronics.jpg);
			}
			20%{
				background-image: url(images/foods.jpg);
			}
			40%{
				background-image: url(images/clothes.jpg);
			}
			60%{
				background-image: url(images/packing.jpg);
			}
			80%{
				background-image: url(images/packing.jpg);
			}
			100%{
				background-image: url(images/electronics.jpg);
			}

		}
		@keyframes change_b{
			
			0%{
				background-image: url(images/foods.jpg);
			}
			20%{
				background-image: url(images/clothes.jpg);
			}
			40%{
				background-image: url(images/packing.jpg);
			}
			60%{
				background-image: url(images/packing.jpg);
			}
			80%{
				background-image: url(images/electronics.jpg);
			}
			100%{
				background-image: url(images/foods.jpg);
			}

		}
		@keyframes change_c{
			
			0%{
				background-image: url(images/clothes.jpg);
			}
			20%{
				background-image: url(images/packing.jpg);
			}
			40%{
				background-image: url(images/packing.jpg);
			}
			60%{
				background-image: url(images/electronics.jpg);
			}
			80%{
				background-image: url(images/foods.jpg);
			}
			100%{
				background-image: url(images/clothes.jpg);
			}

		}
		@keyframes buttonanimation{
			0%{	
				
				box-shadow: 0px 0px #888888;
				border:1px solid white;
			}
			50%{
				
				
				border:1px solid black;
			}
			100%{
				
			
				box-shadow: 0px 0px #888888;
				border:1px solid white;
			}

		}

		body{
			
			 background-image: linear-gradient(to right, #a9ddff ,white,#a9ddff);
			 height: 70%;
		}
		.imageflex{
			display: flex;
		}
		#shopnow_btn{
			font-size: 30px;
			height: 75px;
			width: 350px;
			border-radius: 25px;
			background: #ffe042;
			margin-top: 70px;
			margin-left: 640px;
			box-shadow: 3px 3px #888888;
			animation: buttonanimation 3s infinite ease-in-out;
		}
	</style>
</head>
<div class="body">
	<div class="imageflex">
<div class="imageanimation_a"></div>
<div class="imageanimation_b"></div>
<div class="imageanimation_c"></div>
</div>
<div class="shopnow"> <a href="customer/product.php"><input type="submit" name="shopnow_btn" id="shopnow_btn" value="Shop Now"</a></div>

</div>
<body>

</body>
</html>