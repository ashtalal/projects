<?php

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$user_role = $_POST['user_role'];

echo $user_id . '<br>' . $username . '<br>' . $password . '<br> . ' . $email . '<br>' . $role ;

$file = file_get_contents('users.json');
$users = json_decode($file, true);

$users[$user_id]['username'] = $username;
$users[$user_id]['password'] = $password;
$users[$user_id]['email'] = $email;
$users[$user_id]['role'] = $user_role;


// $editedUser = array(
// 	'username' => $username,
// 	'password' => $password,
// 	'email' => $email,
// 	'role' => $role
// );
	
// array_push($users, $editedUser);

$jsonFile = fopen('users.json', 'w');
fwrite($jsonFile, json_encode($users, JSON_PRETTY_PRINT));
fclose($jsonFile);

header("location: ../user.php?id=$user_id");