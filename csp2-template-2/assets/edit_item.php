<?php

$id = $_GET['id'];

//successful processing

$file = file_get_contents('items.json');
$items = json_decode($file, true);

echo '
<div class="form-group">
	<label>Product Name</label>
	<input name="name" class="form-control" type="text" value="'.$items[$id]['name'].'">
	<label>Description</label>
	<input name="description" class="form-control" type="text" value="'.$items[$id]['description'].'">
	<label>Price</label>
	<input name="price" class="form-control" type="text" value="'.$items[$id]['price'].'">
	<label>Image</label>
	<input name="image" class="form-control" type="file" value="C:/xampp/htdocs/Jean-Talal/csp2-template-2/assets/img/' . $items[$id]['image'].' ">
';

	$categories = ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5', 'Category 6'];
	echo '
	<label>Category</label>
	<select class="form-control" name="category">';
		foreach ($categories as $category) {
			if ($category === $items[$id]['category'])
				echo '<option selected>' . $category . '</option>'; 
			else
				echo '<option>' . $category . '</option>';
			}
	echo'
	</select>
</div>';

