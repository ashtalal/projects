<?php
session_start();

require 'connect.php'; //database connection


$sql_user = "SELECT * FROM users WHERE username = '".$_SESSION['current_user']."'";
$result = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result);
extract($user);


if (!isset($_SESSION['current_user'])) {
	header('location: login.php');
}

function getTitle() {
	echo 'My Cart';
}

include 'partials/head.php';

// var_export($_SESSION['cart']);

?>
</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<br>
	<br>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>My Cart</h1>
		<?php
				if (isset($_SESSION['current_user'])) {
					echo '<h3 style="margin-left: 150px;">Hello ' . $first_name .'!</h3>';
				}
		?>
		<br>
		<table style="margin: 0 auto;">
			<thead>
				<th>Product Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<?php
				if ($_SESSION['item_count'] != "") {

					echo '<th>Remove</th>
					';
				}

				?>
			</thead>
			<tbody id="tbody">
			<?php

			$total = 0;
		

			foreach ($_SESSION['cart'] as $prodId => $quantity) {

				$sql = "SELECT m.product_name, m.price, m.description,  m.image, u.username, f.name, m.category_id FROM meals m JOIN food_categories f ON (m.category_id=f.id) JOIN users u ON (u.id=m.merchant) where m.id = '$prodId'";

				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

				$item = mysqli_fetch_assoc($result);

				extract($item);

				// echo $product_name = $item['category_id'];
					echo '
						<tr>
							<td><a>' . $product_name . '</a></td>
							<td><img src="' . $image . '" style="width: 150px; height: 150px;"></td>
							<td>' . $price . '</td>
							<td><input id="update_Quantity" type="number" value="'.$quantity.'" min="0" onchange="updateQuantity('.$prodId.')"></td>
							<td id="price">' . $price * $quantity . '</td>
							<td>
							<form action="assets/remove_to_cart.php" method="POST">
							<input hidden name="prod-id" value="'. $prodId . '">
							<button type="submit" class="btn btn-danger">Delete</button>
							</form>
							</td>
						</tr>
						';
						$prod = $price * $quantity;
						$total += $prod;
						$_SESSION['item_id'] = $prodId;
					}

					if ($_SESSION['item_count'] == "") {
							
					echo '
						<tr>
							<td colspan="6" style="text-align:center;">Empty Cart</td>
						</tr>
						';
					}else {

					echo '
						<tr>
							
							<td colspan="4" style="text-align: right;">Gross Total</td>
							<td colspan="2">'.$total.'</td>
							
						</tr>
						<tr>
							<td colspan="6"><a class="btn btn-primary" href="checkout.php">Checkout</a></td>
						</tr>

						';
					}



				
			?>
						
			<!-- <td><input id="itemQuantity' . $quantity. '" type="number" min="0"></td> -->
			</tbody>
		</table>
		<br>

		

	</main>
	<br>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php
include 'partials/foot.php';
?>

<script type="text/javascript">
	function updateQuantity(itemId) {
		// console.log(itemId);
		var id = itemId;

		console.log(id);

		var new_quantity = $('#update_Quantity').val();


		$.post('assets/add_to_cart.php',
			{
				item_id: id,
				item_quantity: new_quantity,
			},
			function(data, status) {
				// console.log(data);
				$('a[href="cart.php"]').html('My Cart ' + data);
			});

		$.post('assets/reload_cart.php',
			{
				item_id: id,
				item_quantity: new_quantity,
			},
			function(data, status) {
				// console.log(data);
				$('#tbody').html(data);
			});
	}
</script>

</body>
</html>