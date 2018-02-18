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
			$id = $_SESSION['cart'];
			$file = file_get_contents('assets/items.json');
			$items= json_decode($file, true);
			$total = 0;
		

			foreach ($id as $prodId => $quantity) {
					echo '
						<tr>
							<td><a>' . $items[$prodId]['name'] . '</a></td>
							<td><img src="' . $items[$prodId]['image'] . '" style="width: 150px; height: 150px;"></td>
							<td>' . $items[$prodId]['price'] . '</td>
							<td><input id="update_Quantity" type="number" value="'.$quantity.'" min="0" onchange="updateQuantity('.$items[$prodId]['id'].')"></td>
							<td id="price">' . $items[$prodId]['price'] * $quantity . '</td>
							<td>
							<form action="assets/remove_to_cart.php" method="POST">
							<button type="submit" class="btn btn-danger">Delete</button>
							</form>
							</td>
						</tr>
						';
						$prod = $items[$prodId]['price'] * $quantity;
						$total += $prod;
						$_SESSION['item_id'] = $items[$prodId]['id'];
					}

					if ($_SESSION['item_count'] == "") {
							
					echo '
						<tr>
							<td colspan="6" style="text-align:center;">Empty Cart</td>
						</tr>
						';
					}	


					echo '
						<tr>
							
							<td colspan="4" style="text-align: right;">Gross Total</td>
							<td colspan="2">'.$total.'</td>
							
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