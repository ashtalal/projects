<?php

session_start();
require 'connect.php';

if (isset($_SESSION['current_user']) && isset($_GET['search']) && isset($_GET['category']) && $_GET['category'] !== 'All') {
	$cat_id = $_GET['category'];

	$sql = "SELECT * FROM meals WHERE category_id NOT IN (SELECT category_id FROM food_cat_users WHERE user_id = (
	SELECT id FROM users WHERE username = '" . $_SESSION['current_user'] . 
	"')) AND category_id = '$cat_id'";
}
else if (isset($_SESSION['current_user'])) {
	$sql = "SELECT * FROM meals WHERE category_id NOT IN (SELECT category_id FROM food_cat_users WHERE user_id = (
	SELECT id FROM users WHERE username = '" . $_SESSION['current_user'] . 
	"'))";
}
else {
	if (isset($_GET['search']) && isset($_GET['category']) && $_GET['category'] !== 'All')
		$sql = "SELECT * FROM meals WHERE category_id = '".$_GET['category']."'";
	else
		$sql = "SELECT * FROM meals";
}

$items = mysqli_query($conn, $sql);

function getTitle() {
	echo 'Dishes';
}

include 'partials/head.php';

$sql1 = 'SELECT * FROM food_categories';
$result = mysqli_query($conn, $sql1);

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<br>
	<br>

	<!-- wrapper -->
	<main class="wrapper" id="catalogWrapper">

		<h1>Dishes</h1>
		<form method="GET" style="text-align: center;">
			<select name="category">
				<option>All</option>
				<?php

				while ($category = mysqli_fetch_assoc($result)) {
					extract($category);

					echo '<option value="'.$id.'">' . $name . '</option>';
				
				}
				?>
			</select>
			<button type="submit" name="search">Search</button>
		</form>

		<div class="items-wrapper">

			<?php
		
				while ($item = mysqli_fetch_assoc($items)) {
					extract($item);

				echo '
				<div class="item-parent-container form-group">
					<a href="item.php?id=' . $id . '">
					<div class="item-container">
						<h3>' . $product_name . '</h3>
						<img src="' . $image . '" alt="Mock data" style="width:200px; height:200px;">
						<p>PHP ' . $price . '</p>
						<p>' . $description . '</p>
					</div><!-- /.item-container -->
					</a>
					<input id="itemQuantity' . $id . '" type="number" value="0" min="0" class="form-control">
					<button class="btn btn-warning form-control" onclick="addToCart('.$id.')">Add to Cart</button>
				</div>
				';
			}

			?>
			
		</div><!-- item-wrapper -->
		
	</main><!-- wrapper -->
	<br>

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