<?php


require '../connect.php'; //database connection


$id = $_GET['id'];

//successful processing

$sql = "SELECT * FROM meals where id='" . $id . "'";
$items = mysqli_query($conn, $sql);
$meals = mysqli_fetch_assoc($items);
extract($meals);

echo '
<div class="form-group">
	<label>Product Name</label>
	<input name="name" class="form-control" type="text" value="'.$product_name.'">
	<label>Description</label>
	<input name="description" class="form-control" type="text" value="'.$description.'">
	<label>Price</label>
	<input name="price" class="form-control" type="text" value="'.$price.'">
	<label>Image</label>
	<input name="image" class="form-control" type="file" value="C:/xampp/htdocs/Jean-Talal/csp2-template-2/assets/img/' . $image.' ">
';

	$categories = ['Nuts', 'Dairy', 'Seafoods', 'Poultry', 'No Allergy'];
	echo '
	<label>Category</label>
	<select class="form-control" name="category">';
		foreach ($categories as $category) {
			if ($category === $category_id)
				echo '<option selected>' . $category . '</option>'; 
			else
				echo '<option>' . $category . '</option>';
			}
	echo'
	</select>
</div>';

