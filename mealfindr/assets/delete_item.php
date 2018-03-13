<?php 

require '../connect.php'; //database connection

$item_id = $_POST['item_id'];

$sql = "DELETE FROM meals WHERE id='$item_id'";

$result = mysqli_query($conn, $sql);

header("location: ../catalog.php");