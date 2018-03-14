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
	<input name="product_name" class="form-control" type="text" value="'.$product_name.'">
	<label>Description</label>
	<input name="description" class="form-control" type="text" value="'.$description.'">
	<label>Price</label>
	<input name="price" class="form-control" type="text" value="'.$price.'">
	<label>Image</label>
	<input name="image" class="form-control" type="file" value="C:/xampp/htdocs/Jean-Talal/csp2-template-2/assets/img/' . $image.' ">
';

	$cat_id = $category_id;
	// $categories = ['Nuts', 'Dairy', 'Seafoods', 'Poultry', 'No Allergy'];

	$sql = "SELECT * FROM food_categories";
	$categories = mysqli_query($conn, $sql);
	
	echo '
	<label>Category</label>
	<select class="form-control" name="category">';
		foreach ($categories as $category) {
			extract($category);

			if ($cat_id === $id)
				echo '<option value="'.$id.'" selected>' . $name . '</option>'; 
			else
				echo '<option value="'.$id.'">' . $name . '</option>';
			}
	echo'
	</select>
</div>';

