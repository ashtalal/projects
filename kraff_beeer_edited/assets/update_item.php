<?php

$item_id = $_POST['item_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];

//echo $item_id . '<br>' . $name . '<br>' . $description . '<br> . ' . $image . '<br>' . $price . '<br>' . $category;

$file = file_get_contents('items.json');
$items = json_decode($file, true);

if($_POST['image'] != ""){
	$image = $_POST['image'];
	$items[$item_id]['image'] = 'assets/img/' . $image;
}

$items[$item_id]['name'] = $name;
$items[$item_id]['description'] = $description;
$items[$item_id]['price'] = $price;
$items[$item_id]['category'] = $category;

// print_r($items);

// $editedUser = array(
// 	'username' => $username,
// 	'password' => $password,
// 	'email' => $email,
// 	'role' => $role
// );
	
// array_push($users, $editedUser);

$jsonFile = fopen('items.json', 'w');
fwrite($jsonFile, json_encode($items, JSON_PRETTY_PRINT));
fclose($jsonFile);

header("location: ../item.php?id=$item_id");