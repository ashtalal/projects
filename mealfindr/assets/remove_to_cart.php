<?php

	session_start();

	require '../connect.php';

	$id = $_POST['prod-id'];

	unset($_SESSION['cart'][$id]);

	$_SESSION['item_count'] = array_sum($_SESSION['cart']);

	header('location: ../cart.php');






