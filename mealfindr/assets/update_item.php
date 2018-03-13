<?php

require '../connect.php'; //database connection


$id = $_POST['id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = $_POST['image'];
$category = $_POST['category_id'];



if($_POST['image'] != ""){
	$image = $_POST['image'];
	$items[$item_id]['image'] = 'assets/img/' . $image;
}

;

$sql = "UPDATE meals SET product_name='$product_name', price='$price', description='$description', image='$image', category_id='$category' WHERE id='$id'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


header("location: ../item.php?id=$item_id");

mysqli_close($conn);