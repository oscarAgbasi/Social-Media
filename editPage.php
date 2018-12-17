<?php 
/* Author: Agbasi oscar
 */
session_start();
include "db.php";

if(!isset($_SESSION['loginJ']) || $_SESSION['loginJ'] !=true ){
	
			header('location:loginPage.php');
			exit();
}
$valid1 = "";
$error1 = [];
$id = $_GET['edit'];
if(!empty($_POST)){
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
			$error1['Colour'] = 'Year is required.'; 	
		}
	
	if(empty($error1)){
		
$stmt = $conn->prepare("UPDATE posts1 SET title=?, Cars=?, Colour=?, mileage=?, Year=? WHERE post_id=?");
$stmt->bind_param('sssssi', $title, $Cars, $Colour, $mileage, $Year, $id) or die (mysqli_error($conn));
 $stmt->execute();
 if($stmt){
	 header('location:action.php');
 }
}	
}
$stmt = $conn->prepare("select * from posts1 where post_id=?");
$stmt->bind_param('s', $id);
 $stmt->execute();
  $res = $stmt->get_result();
$row = $res->fetch_assoc();

 
	

?>  
	



<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="blogpost">
<div class="navside">
            <div class="Nav1">
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
                  <a href="BlogPage.php"><li>New Post</li></a>

                </ul>

            </div>
            <div class="Clearfiix"></div>
        </div>
        <div class="formside">
            <div class="Clearfiix"></div>
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
							<?php echo "Post updated successfully";?>
							</span>

                                </div>
                                <?php } ?>
<div class="left!side">

<label>Identify:</label>
<input type="text" name="title"  placeholder="title" value="<?php echo $row['title'] ?>" >
<?php if(isset($error1['title'])){?>
      <span style="color:red;">
	  <?php echo $error1['title'] ?>
	</span>
  <?php } ?>

<br><br>
<label>Cars:</label>
            <select name="Cars!" value="<?php echo $row['Cars'] ?>">
                     <option value="<?php echo $row['Cars'] ?>"><?php echo $row['Cars'] ?></option>
				  <option value="bmw">Bmw</option>
                  <option value="jeep">Jeep</option>
                  <option value="honda">Honda</option>
                  <option value="golf" >Golf</option>
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
<select name="mileage" value="<?php echo $row['mileage'] ?>">
                 
                  <option value="<?php echo $row['mileage'] ?>"><?php echo $row['mileage'] ?></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  
              </select>
			  <?php if(isset($error1['mileage'])){?>
      <span style="color:red;">
	  <?php echo $error1['mileage'] ?>
	</span>
  <?php } ?>
			  
<br><br>
<label>Year:</label>
<input type="Year" name="Year"  value="<?php echo $row['Year'] ?>">
<?php if(isset($error1['Year'])){?>
      <span style="color:red;">
	  <?php echo $error1['Year'] ?>
	</span>
  <?php } ?>

<br><br>
</div>
<div class="Clearfiix"></div>
<label>Colour  :</label>
<textarea name="Colour" rows="4" cols="50" value="" ><?php echo $row['Colour'] ?>
</textarea>
<?php if(isset($error1['Colour'])){?>
      <span style="color:red;">
	  <?php echo $error1['Colour'] ?>
	</span>
  <?php } ?>


<br><br>
<input type="submit" value="Update Post " name="submit"><br>
<span></span>
</form>
</div>
</div>
</body>
</html>
