<?php


require '../connect.php'; //database connection


$username = $_POST['username'];
$password = $_POST['password']; //convert password to SHA1 hash
$email = $_POST['email']; 
$image = 'http://lorempixel.com/300/300';
$role_id = 2;
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$allergens = $_POST['allergens'];
// var_export($allergens);

//create SQL query
$sql = "insert into users (email, image, username, password, role_id, first_name, last_name, address, contact) values ('$email','$image','$username','$password','$role_id','$first_name','$last_name','$address','$contact')";

//send query to database
$result = mysqli_query($conn, $sql);

// New entry for food_cat_users

$new = mysqli_insert_id($conn);

foreach ($allergens as $key => $allergen) {
	$sql1 = "INSERT INTO food_cat_users (category_id, user_id) values ('$allergen', '$new')";
	mysqli_query($conn, $sql1);
}

//check if create new user was successful
if ($result)
	header('location: ../login.php');	
else
	die('Error: '. $sql . '<br>' . mysqli_error($conn));

mysqli_close($conn);




