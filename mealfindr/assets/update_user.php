<?php

require '../connect.php'; //database connection


$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$user_role = $_POST['user_role'];
$image = 'http://lorempixel.com/300/300';
$first_name = 'Juan';
$last_name = 'Dela Cruz';
$address = 'Mandaluyong City';
$contact = '09997785468';


$sql = "UPDATE users SET username='$username', password='$password', email='$email', role_id='$user_role', image='$image', first_name='$first_name', last_name='$last_name', address='$address', contact='$contact' WHERE id ='$user_id'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));




header("location: ../user.php?id=$user_id");

mysqli_close($conn);