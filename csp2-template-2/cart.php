<?php

session_start();


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

	<!-- wrapper -->
	<main class="wrapper">

		<h1 style="text-align: center; font-family: Verdana; margin-bottom: 20px;">My Cart Page</h1>
		<table style="margin: 0 auto;">
			<thead>
				<th>Product Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</thead>
			<tbody>
			<?php
			$id = $_SESSION['cart'];
			$file = file_get_contents('assets/items.json');
			$items= json_decode($file, true);

			foreach ($id as $prodId => $quantity) {
					echo '
						<tr>
							<td><a>' . $items[$prodId]['name'] . '</a></td>
							<td><img src="' . $items[$prodId]['image'] . '" style="width: 150px; height: 150px;"></td>
							<td>' . $items[$prodId]['price'] . '</td>
							<td>' . $quantity. '</td>
							<td>' . $items[$prodId]['price'] * $quantity . '</td>
						</tr>

						';
					}
				$prod = $items[$prodId]['price'] * $quantity;


					echo '
						<tr>
							
							<td colspan="4" style="text-align: right;">Gross Total</td>
							<td></td>
							
						</tr>

						';
				

			?>

			<!-- <td><input id="itemQuantity' . $quantity. '" type="number" min="0"></td> -->
			</tbody>
		</table>

		
	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<!-- <script type="text/javascript">
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
</script> -->

</body>
</html>