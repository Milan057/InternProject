<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.maincontent{
			display: block;
			height:1000px;
		}
		.nav{
			height: 5%;
     display: flex; 
    background:black;
    padding:4px;
   
		}
		.links{
			width: 40%;
			background: none;
		}
		.links ul{
			display: flex;
			justify-content: space-between;
			margin-top: 2%;
		}
		.links ul li{
			margin-right: 10px;
			list-style: none;
		}
		.links ul li *{
			text-decoration: none;
    color:white;
    font-size:20px;
		}
		.nav-logo{
    display: block;
    height: 100%;
    margin-left:5px;
    margin-top:3px;
}
.links ul li a:hover{
	color: skyblue;
}
.nav_logo a{
	color: lightgreen;
	 text-decoration: none;
	 padding: 10px;
}	
body{
	background-image: url(ecommerce.jpg);

}

	</style>

</head>
<body>
	<div class ="maincontent">
<div class="nav">
	<div class="nav_logo">
	<h2>Hamro Pasal</h2>
	</div>
	<div class="links">
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="product.php">Product</a></li>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="#">About us</a></li>
		<li><a href="loginform.php?source=2"> Seller Login</a> </li>
		<li><a href="loginform.php?source=3">Customer Login</a></li>
	</ul>
	</div>
</div>

<div>
</body>
</html>