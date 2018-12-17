<?php 
/* Author: Agbasi oscar
Student name: 000333303 */

session_start();
include "Connect.php";
if(!isset($_SESSION['loginJ']) || $_SESSION['loginJ'] !=true ){
	
			header('location:LoginPage.php');
			exit();
}
$valid1 = "";
if(isset($_POST['submit'])){
	$error1 = [];
	$title = $_POST['title'];	
	$Cars = $_POST['Cars'];	
	$Colour = $_POST['Colour'];	
	$mileage = $_POST['mileage'];	
	$Year = $_POST['Year'];	

		if($title == ''){
			$error1['title'] = 'title is required.'; 	
		}
		if($Cars == ''){
			$error1['Cars'] = 'Cars is required.'; 	
		}
		if($Colour == ''){
			$error1['Colour'] = 'Colour is required.'; 	
		}
		if($mileage == ''){
			$error1['mileage'] = 'mileage is required.'; 	
		}
		if($Year == ''){
			$error1['Year'] = 'Year is required.'; 	
		}
       if(empty($error1)){

	   
	   
$stmt = $conn->prepare("INSERT INTO posts1 (title, Cars, Colour, mileage, Year) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $title, $Cars, $Colour, $mileage, $Year);
	  
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
<title>Your Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body id="blogpost">

<div class="navside">
            <div class="navbar">
                <ul>
                    <a href="BlogPage.php">
                        <li class="tl_color">BlogPost</li>
                    </a>
					<a href="logout.php">
                        <li>Logout</li>
                    </a>
					<a href="action.php">
                        <li>Edit Records</li>
                    </a>
                    <a href="action.php"><li>Delete Records</li></a>
                  

                </ul>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="formside">
            <div class="clearfix"></div>
<div class="tagNote">
            Add Post
			
        </div>

<div id="logink">
<h2>BlogPost</h2>
<hr>
<form action="" method="post">
<?php if($valid1){?>
                                <div class="successMs">
                                    <span style="color:green;">
							<?php echo "Post Added successfully";?>
							</span>

                                </div>
                              <?php } ?>
   <div class="left!side">
<label>Title:</label>
<input type="text" name="title"  placeholder="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']  ?>" >
<?php if(isset($error1['title'])){?>
      <span style="color:red;">
	  <?php echo $error1['title'] ?>
	</span>
  <?php } ?>

<br><br>
<label>Cars:</label>
            <select name="Cars">

                  <option value="" >-----</option>
                  <option value="bmw" <?php if(isset($_POST['Cars']) && $_POST['Cars'] == 'bmw') echo 'selected' ?>>Bmw</option>
                   <option value="jeep"  <?php if(isset($_POST['Cars']) && $_POST['Cars'] == 'jeep') echo 'selected' ?>>Jeep</option>
                  <option value="honda" <?php if(isset($_POST['Cars']) && $_POST['Cars'] == 'honda') echo 'selected' ?>>Honda</option>
                  <option value="golf"  <?php if(isset($_POST['Cars']) && $_POST['Cars'] == 'golf') echo 'selected' ?>>Golf</option>
              </select>
			  <?php if(isset($error1['Cars'])){?>
                                                <span style="color:red;">
							<?php echo $error1['Cars'] ?>
							</span>
                                                <?php } ?>
<br><br>
												</div>

<div class="left!side">
<label>mileage  :</label>
<select name="mileage">

                  <option value="" >-----</option>
                  <option value="yes" <?php if(isset($_POST['mileage']) && $_POST['mileage'] == 'yes') echo 'selected' ?>>Yes</option>
                  <option value="no" <?php if(isset($_POST['mileage']) && $_POST['mileage'] == 'no') echo 'selected' ?>>No</option>
                  
              </select>
			  <?php if(isset($error1['mileage'])){?>
                                                <span style="color:red;">
							<?php echo $error1['mileage'] ?>
							</span>
                                                <?php } ?>

<br><br>
<label>Year:</label>
<input type="Year" name="Year"  placeholder="Inter Year Here" value="<?php if(isset($_POST['Year'])) echo $_POST['Year']  ?>" >
<?php if(isset($error1['Year'])){?>
      <span style="color:red;">
	  <?php echo $error1['Year'] ?>
	</span>
  <?php } ?>
<br><br>
</div>
<div class="clearfix"></div>

<label>Colour  :</label>
<textarea  name="Colour" rows="4" cols="50" value="<?php if(isset($_POST['Colour'])) echo $_POST['Colour']  ?>" >
</textarea>
<?php if(isset($error1['Colour'])){?>
      <span style="color:red;">
	  <?php echo $error1['Colour'] ?>
	</span>
  <?php } ?>

<br><br>

<input type="submit" value="Save Post " name="submit"><br>
<span></span>
</form>
</div>
</div>

</body>
</html>