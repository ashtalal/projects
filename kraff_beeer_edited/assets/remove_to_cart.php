<?php

	session_start();

	array_splice($_SESSION['cart'], $_SESSION['item_id'], 1);

	$_SESSION['item_count'] = array_sum($_SESSION['cart']);

	header('location: ../cart.php');






