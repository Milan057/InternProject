<?php
    
session_start();
include('connection.php');
if(isset($_GET['getsource'])){
  $destination=$_GET['getsource'];
    if($destination==2){
              $database="seller";
              $target_name="Seller";
              $targetlocation="loginform.php?source=2";
            }
            if($destination==3){
              $database="customer";
              $target_name="Customer";
              $targetlocation="loginform.php?source=3";
            }
}
?>
    <!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
  body {
  box-sizing: border-box;
  height: 200px;
  margin: 20px 
  padding: 20px;
  background-color: white;
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("./images/4.jpg");

}
.signupFrm {
  display:flex;
  justify-content: center;
  align-items: center; 
}
.form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px;
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}

.inputContainer {
  position: relative;
  height: 30px;
  width: 90%;
  margin-bottom: 17px;
  
}
/* Style the inputs */

.input {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 2px solid #7c7f82;
  border-radius: 10px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}
::placeholder {
  color: transparent;
}

.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #d3d7db;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}
.submitBtn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: #34a4eb;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.submitBtn:hover {
  background-color: #61eb34;
  transform: translateY(-2px);
}
	</style>
</head>
<body>
<div class="signupFrm">   
    <form method="post" action="" name = "adminloginform" onsubmit="return Validate()" class="form">
      <h1><?php echo $target_name?> SignUp</h1>
      <div class="">
	<?php
		// check to see if the user successfully created an account
		if (isset($success) && $success == true){
			echo '<p color="green">Yay!! Your account has been created. <a href="./login.php">Click here</a> to login!<p>';
		}
		// check to see if the error message is set, if so display it
		else if (isset($error_msg))
			echo '<p color="red">'.$error_msg.'</p>';
		
	?>
	</div>
   Full Name:
      <div class="inputContainer">

        <input type="text" name="name" class="input"   required>
        
      </div>
     Email:
      <div class="inputContainer">
        <input type="text" class="input" name="email"   pattern="([a-z A-Z]{3,})?([0-9])*@([a-z]{3,7}).([a-z]{3,7})?(.[a-z]{1,5})?(.[a-z]{1,5})" required>
        
      </div>
      Password:
      <input type="hidden" name="target" value="<?php echo $destination;?>">
      <div class="inputContainer">
        <input type="password" class="input"   name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"required>
        
      </div>
      Confirm Password:
      <div class="inputContainer">
        <input type="password" class="input"   name="confirmpassword"  required>
        
      </div>
      Address:
      <div class="inputContainer">
        <input type="text" class="input" name="address" required>
      
      </div>
      Phone:
      <div class="inputContainer">
        <input type="text" class="input" name="contact_number"  pattern="9[78][0-9]{8}" required>
        
      </div>

     

      <input type="submit" name="ok" class="submitBtn"  value="Submit" >
 
    </form>
</div>
	
<script type="text/javascript">
  
function Validate() {
         var pass = document.adminloginform.password.value;
        var confirmPass = document.adminloginform.confirmpassword.value;
        var error = false;
        if (pass!= confirmPass) {
            error=true;
            alert("Passwords do not match.");  
        }
          if(error == true){
          return false;
        }
            else{
          return true;
        }
        
    }
    
</script>
</body>


</html>
    <div class="cccc">
    <?php
        if(isset($_POST['ok'])){

            $name = $_POST['name'];
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $target=$_POST['target'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
          
            $checksql= "SELECT * FROM $database where email='$email'";
            $checkrow= mysqli_query($con,$checksql);
            if($checkrow->num_rows!=0){
              die(" Email already registered!!");
            }else{

            $dml = "INSERT into $database(name,email, password, address, contact_number)
                values('$name', '$email', '$password',  '$address', '$contact_number')";
               if(!mysqli_query($con,$dml)){
                die(mysqli_error($con));
              }
              }
             echo"Signup Succesful"; 
             header('location:loginform.php?source='.$target);

            }
          ?>
        </div>
   