<?php
session_start();
if(!isset($_SESSION['adminid'])){
    die("Login Required! <a href='"."../loginform.php'>Click Here</a>"); 
}
session_destroy();
header('location:../loginform.php');
?>