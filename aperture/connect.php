<?php 
	
 
$localhost = "127.0.0.1"; 
$username = "root"; 
$password = "1234"; 
$dbname = "aperture"; 
 
// create connection 
$con = new mysqli($localhost, $username, $password, $dbname); 
 
// check connection 
if($con->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
 
?>

