<?php
/* Author: Agbasi oscar
 */
$servername = "localhost";
$username = "000333302";
$password1 = "19961115";
$dbname = "000333302";


$conn = new mysqli($servername, $username, $password1, $dbname);


if ($conn->connect_error) {
    die("Connection has failed: " . $conn->connect_error);
}

?>
