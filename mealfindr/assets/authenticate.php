<?php

session_start();

require '../connect.php'; //database connection

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT u.username, u.password, u.email, u.first_name, u.last_name, u.contact, u.image, u.address, u.category_id, r.description FROM users u JOIN roles r ON (u.role_id = r.id) WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if ($username == $user['username'] && $password == $user['password']) {
        // echo 'Login was successful.';
        $isLogInSuccessful = true;
        $_SESSION['current_user'] = $user['username'];
        $_SESSION['role'] = $user['description'];
        $_SESSION['image'] = "assets/".$user['image'];
        // var_dump( $_SESSION['image']);
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['contact'] = $user['contact'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['category_id'] = $user['category_id'];

    }
}


if ($isLogInSuccessful) {
    // if successful login
    header('location: ../home.php');
} else {
    // if failed login
    header('location: ../login.php');
}