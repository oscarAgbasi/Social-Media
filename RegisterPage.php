<?php 
/* Author: Agbasi oscar
 */

include "connect.php";
$valid1 = "";
if(isset($_POST['register'])){
	$error1 = [];
	$password1 = $_POST['password1'];
			$email1 = $_POST['email1'];
		$username = $_POST['username'];

		if($username == ''){
			$error1['username'] = 'Please put username.'; 	
		}
		if($email1 == ''){
			$error1['email1'] = 'Please put email1.'; 	
		}
		if($password1 == ''){
			$error1['password1'] = 'Please put password1.'; 	
		}
		
		$getEmail1 = $conn->prepare("select * from  users WHERE email1=?");
        $getEmail1->bind_param('s', $email1);
		$getEmail1->execute();
        $getEmail1->store_result();
         $countRows = $getEmail1->num_rows;
		 if($countRows){
			 $error ['error']= 'email1 already exsit';
			
		 }
       if(empty($error)){
$stmt = $conn->prepare("INSERT INTO users (name, email1, password1) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email1, $password1);
 if($stmt->execute()){
			$valid1 = true;
			
		}else{
			$valid1 = false;
	         }

}
		 
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="connect.css">
</head>
<body>
<div class="First_Header">
 <div class="posts">Blogging</div>
   <div class="sign_up">
    <ul>
	 <li><a href="RegisterPage.php">Register</a></li>
	 <li><a href="LoginPage.php">Login</a></li>
	</ul>
   </div>
 </div>


<div id="login">
<h2>Register Form</h2>
<hr>
<form action="" method="post">
<?php if($valid1){?>
                                <div class="successMs">
                                    <span style="color:green;">
							<?php echo "Data insert successfully";?>
							</span>

                                </div>
                                <?php } ?>                             

<label>UserName  :</label>
<input type="text" name="username"  placeholder="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']  ?>" >
 <?php if(isset($error1['username'])){?>
      <span style="color:red;">
	  <?php echo $error1['username'] ?>
	</span>
  <?php } ?>

<br><br>
<label>email1  :</label>
<input type="text" name="email1"  placeholder="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']  ?>" >
<?php if(isset($error1['email1'])){?>
      <span style="color:red;">
	  <?php echo $error1['email1'] ?>
	</span>
  <?php } ?>
<br><br>
<label>password1  :</label>
<input type="password1" name="password1"  placeholder="**********" value="<?php if(isset($_POST['password1'])) echo $_POST['password1']  ?>" >
<?php if(isset($error1['password1'])){?>
      <span style="color:red;">
	  <?php echo $error['password1'] ?>
	</span>
  <?php } ?>
<br><br>
<?php if(isset($error1['error'])){?>
      <span style="color:red;">
	  <?php echo $error1['error'] ?>
	</span>
  <?php } ?>
<input type="submit" value="Register " name="register"><br>
<span></span>
</form>
</div>

</body>
</html>
