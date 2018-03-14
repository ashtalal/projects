<?php

require '../connect.php'; //database connection

$id = $_POST['item_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

if($_POST['image'] != ""){
	$image = $_POST['image'];
	$items[$item_id]['image'] = 'assets/img/meals/' . $image;
}
else {
	$image = $_POST['image'];
}

$sql = "UPDATE meals SET product_name='$product_name', price='$price', description='$description', image='$image', category_id='$category' WHERE id='$id'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


header("location: ../item.php?id=$id");

mysqli_close($conn);