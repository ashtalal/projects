<?php 

require '../connect.php'; //database connection

$user_id = $_GET['user-id'];

// var_dump($user_id);

$sql = "DELETE FROM food_cat_users WHERE user_id = '$user_id'";
mysqli_query($conn, $sql);

$sql = "DELETE FROM users WHERE id = '$user_id'";
mysqli_query($conn, $sql);

header("location: ../settings.php");