<?php
session_start();
if(isset($_SESSION['customerid'])){?>
	<a href="logout.php">Log Out</a>
<?php	
}else{
	session_destroy();
header("location:../loginform.php?source=3");	
}

?>