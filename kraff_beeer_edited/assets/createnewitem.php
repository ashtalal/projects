<?php

$itemName = $_POST['name'];
$image = $_POST['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

// echo $userName . ' ' . $passWord . ' ' . $email;

$file = file_get_contents('items.json');
$items = json_decode($file, true);

$newItem = array(
	'name' => $itemName,
	'image' => 'assets/img/' . $image,
	'price' => $price,
	'description' => $description,
	'category' => $category
);
	
array_push($items, $newItem);

$jsonFile = fopen('items.json', 'w');
fwrite($jsonFile, json_encode($items, JSON_PRETTY_PRINT));
fclose($jsonFile);

// var_dump($items);

header('location: ../catalog.php');