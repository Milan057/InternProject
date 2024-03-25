<?php 
include("connection.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ecommerce</title>
 
 	</style>
 </head>
 <body>
 <div class="navigation">
 	<input type="submit" id="login_register_btn" name="login_register_btn" value="Login/Register " onclick="customerlogin()">
 </div>
 </body>
 <script type="text/javascript">
 function customerlogin(){
 	console.log("Logging as a customer");
 	
window.location="loginform.php?id=3";
 	
 }
 </script>
 </html>