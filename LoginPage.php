<?php
/* Author: Agbasi oscar
Student name: 000333303 */
session_start(); 
include "connect.php";
if(isset($_SESSION['loginJ']) && $_SESSION['loginJ'] == true ){
	
	header('location:BlogPage.php');
	exit();
}
$valid1 = "";
$email_pas1s = "";
if(isset($_POST['loginJ'])){
	
	$error1 = [];	
		$email1 = $_POST['email1'];	
	$email_pas1s = true;

	$password1 = $_POST['password1'];	

		if($email1 == ''){
			$error1['email1'] = 'email1 is required.'; 	
		}
		if($password1 == ''){
			$error1['password1'] = 'password1 is required.'; 	
		}

       if(empty($error1)){
$stmt = $conn->prepare("select * from users where email1=? AND password1=?");
$stmt->bind_param("ss", $email1, $password1);
 ($stmt->execute());
  $res = $stmt->get_result();
$data = $res->fetch_all();
  if($data){
			$valid1 = true;
			$_SESSION['loginJ']=true;
			header('location:BlogPage.php');
			exit();
		}else{
			$valid1 = false;
            $$email_pas1s = false;
	         }

}
}


?>

<!DOCTYPE html>
<html>
<head>

<title>Get Started</title>

<link rel="stylesheet" href="Social.css">

</head>

<body>

<div class="First_Header">
 <div class="posts1">Blogging</div>
   <div class="SignUp">
    <ul>
	 <li><a href="RegisterPage.php">Register</a></li>
	 <li><a href="LoginPage.php">loginJ</a></li>
	</ul>
   </div>
 </div>


<div id="logink">
<h2>loginJ Form</h2>
<hr>
<form action="" method="post">
     <?php if($$email_pas1s === false){?>
	  <span style="color:red;">
	 <?php echo "Check your email1 and password"; ?>
	 </span>
	 <?php }?>
	 <br>
<label>email1:</label>
<input type="text" name="email1"  placeholder="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']  ?>" >
<?php if(isset($error1['email1'])){?>
      <span style="color:red;">
	  <?php echo $error1['email1'] ?>
	</span>
  <?php } ?>

<br><br>
<label>password1:</label>
<input type="password1" name="password1"  placeholder="**********" value="<?php if(isset($_POST['password1'])) echo $_POST['password1']  ?>" >
<?php if(isset($error1['password1'])){?>
      <span style="color:red;">
	  <?php echo $error1['password1'] ?>
	</span>
  <?php } ?>

<br><br>

<input type="submit" value="loginJ" name="loginJ"><br>
<a href="forget.php">Forget password?</a>
<span></span>
</form>
</div>

</body>
</html>