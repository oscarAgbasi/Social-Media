<?php 
/* Author: Agbasi oscar
 */

session_start();


$_SESSION['login'] = false;


header('location:LoginPage.php');
exit();


?>
