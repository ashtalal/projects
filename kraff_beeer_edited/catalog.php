<?php

session_start();




function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

// $file = file_get_contents('assets/items.json');

// var_dump($items);


//create database connection
require 'connect.php';
// $items = json_decode($file, true);


//get all the items
$sql = "SELECT * FROM items";
$items = mysqli_query($conn, $sql); //$conn is from connect.php


//retrieve all categories
// $categories = array_column(mysqli_fetch_assoc($items), 'category');
// var_export($categories);

$sql1 = 'SELECT name FROM categories';
$result = mysqli_query($conn, $sql1);
// $categories = mysqli_fetch_all($result);
// var_export($categories);

// $categories = array_column(mysqli_fetch_assoc($result), 'description');
// var_export($result);
// filter unique entry of category 
// $categories = array_unique($categories);
// var_export($categories);

// sort categories in ascending order
// sort($categories);


// $result = array(); //empty array

// // category chosen for filter
// if (isset($_GET['search']) && $_GET['category'] !== 'All') {
// 	$cat = $_GET['category'];
// 	// echo $cat;

// 	// filter items based on category chosen
// 	foreach ($items as $item) {
// 		if ($item['category'] === $cat) {
// 			array_push($result, $item);
// 		}
// 	}
// } else {
// 	// show all items
// 	$result = $items;
// }

// echo $cat;

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper" id="catalogWrapper">

		<h1>Catalog Page</h1>
		<a href="create_new_item.php">
			<button class="btn btn-primary">Add New Item</button>
		</a>
		<form method="GET">
			<select name="category">
				<option>All</option>
				<?php

				// foreach ($categories as $category) {
				while ($category = mysqli_fetch_assoc($result)) {
					extract($category);

					echo '<option>' . $name . '</option>';
				
					// if ($category === $_GET['category']) {
					// 	echo '<option selected>' . $category . '</option>';
					// } else {
					// 	echo '<option>' . $category . '</option>';
					// }
				}
				?>
			</select>
			<button type="submit" name="search">Search</button>
		</form>

		<div class="items-wrapper">

			<?php
		
			// foreach ($result as $key => $item) {
				while ($item = mysqli_fetch_assoc($items)) {
					extract($item);

				echo '
				<div class="item-parent-container form-group">
					<a href="item.php?id=' . $id . '">
					<div class="item-container">
						<h3>' . $product_name . '</h3>
						<img src="' . $image . '" alt="Mock data">
						<p>PHP ' . $price . '</p>
						<p>' . $description . '</p>
					</div><!-- /.item-container -->
					</a>
					<input id="itemQuantity' . $id . '" type="number" value="0" min="0">
					<button class="btn btn-primary form-control" onclick="addToCart('.$id.')">Add to Cart</button>
				</div>
				';
			}

			?>
			
		</div><!-- item-wrapper -->
		
	</main><!-- wrapper -->

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<script type="text/javascript">
	function addToCart(itemId) {
		// console.log(itemId);
		var id = itemId;

		//retrieve value of item quantity
		var quantity = $('#itemQuantity' + id).val();

		// console.log(quantity);

		//create a post request to update session cart variable
		$.post('assets/add_to_cart.php',
			{
				item_id: id,
				item_quantity: quantity,
			},
			function(data, status) {
				// console.log(data);
				$('a[href="cart.php"]').html('My Cart ' + data);
			});
	}
</script>

</body>
</html>