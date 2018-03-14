<?php


session_start();

require 'connect.php'; //database connection



$sql_user = "SELECT * FROM users WHERE username = '".$_SESSION['current_user']."'";
$result = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result);
extract($user);

// if (isset($_SESSION['current_user'])) {
// 	if ($_SESSION['role'] != 'admin')
// 		header('location: home.php');
// }

function getTitle() {
	echo 'Checkout';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<br>
	<br>


	<!-- wrapper -->
	<main class="wrapper">

		<h1>Checkout</h1>
		<table style="margin: 0 auto; margin-bottom: 30px;" class="checkout-customer" >
			<thead>
				<th>Buyer</th>
				<th>Home Address</th>
				<th>Contact</th>
			</thead>
			<tbody id="tbody">
		<?php
				if (isset($_SESSION['current_user'])) {
					echo '
					<tr>
						<td>' . $first_name .' ' . $last_name . '</td>
						<td>' . $address . '</td>
						<td>' . $contact . '</td>
					</tr>';
				}
				// } else if (!isset($_SESSION['current_user']) && isset($_SESSION['message'])) {
				// 	echo "<label>".$_SESSION['message']."</label><br>";
				// 	unset($_SESSION['message']);
				// }

		?>

		<table style="margin: 0 auto;" class="checkout-table">
			<thead>
				<th>Product Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
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
							<td>'.$quantity.'</td>
							<td id="price">' . $price * $quantity . '</td>
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
							<td colspan="4" style="text-align: right;">Shipping Fee</td>
							<td colspan="2">Free</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: right;">Total Cost</td>
							<td colspan="2">'.$total.'</td>
						</tr>

						';
					}
	
			?>
						
			<!-- <td><input id="itemQuantity' . $quantity. '" type="number" min="0"></td> -->
			</tbody>
		</table>
		<br>
		<div class="buttons" style="text-align: center;">
		<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button class="btn btn-default">Back</button></a>

		<button id="deleteItem" class="btn btn-warning btn-md" data-toggle="modal" data-target="#deleteItemModal" data-index="<?php echo $id; ?>">Pay Securely Now</button>
		</div>
		<br>
		<br>

	</main>
	<br>
	

		<!-- Modal -->
		<div id="editItemModal" class="modal fade" role="dialog">
	 		<div class="modal-dialog">

		    <!-- Modal content-->
			    <form method="POST" action="assets/update_item.php">
			    	<input hidden name="item_id" value="<?php echo $id;?>">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Edit Item Details</h4>
				      	</div>
				      	<div id="editItemModalBody" class="modal-body">	
				      	</div>
				      	<div class="modal-footer">
				        	<button type="submit" class="btn btn-default">Save</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				      	</div>
				    </div>
			    </form>
			</div>
		</div>

		<!-- Modal -->
		<div id="deleteItemModal" class="modal fade" role="dialog">
	 		<div class="modal-dialog">

		    <!-- Modal content-->
			    <form method="POST" action="assets/delete_item.php">
			    	<input hidden name="item_id" value="<?php echo $id;?>">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Delete Item</h4>
				      	</div>
				      	<div id="deleteItemModalBody" class="modal-body">
				      	<p>Do you really want to delete this item?</p>	
				      	</div>
				      	<div class="modal-footer">
				        	<button type="submit" class="btn btn-default">Yes</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				      	</div>
				    </div>
			    </form>
			</div>
		</div>


	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

<script type="text/javascript">
	$(document).ready(function() { //checks if the DOM is made be

		$('#editItem').click(function() {
			var itemId = $(this).data('index');
			// console.log(userId);

			$.get('assets/edit_item.php',
				{
					id: itemId
				},
				function(data, status) {
					// console.log(data);
					$('#editItemModalBody').html(data);
			});
		});
	}); 
</script>

</body>
</html>