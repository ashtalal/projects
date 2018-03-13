	<?php
	

	session_start();
	require '../connect.php'; //database connection
	$total = 0;

	foreach ($_SESSION['cart'] as $prodId => $quantity) {
		$sql = "SELECT m.product_name, m.price, m.description,  m.image, u.username, f.name FROM meals m JOIN food_categories f ON (m.category_id=f.id) JOIN users u ON (u.id=m.merchant) where m.id = '$prodId'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$item = mysqli_fetch_assoc($result);
		extract($item);
					echo '
						<tr>
							<td><a>' . $product_name . '</a></td>
							<td><img src="' . $image . '" style="width: 150px; height: 150px;"></td>
							<td>' . $price . '</td>
							<td><input id="update_Quantity" type="number" value="'.$quantity.'" min="0" onchange="updateQuantity('.$prodId.')"></td>
							<td id="price">' . $price * $quantity . '</td>
							<td>
							<form action="assets/remove_to_cart.php" method="POST">
							<button type="submit" class="btn btn-danger">Delete</button>
							</form>
							</td>
						</tr>
						';
						$prod = $price * $quantity;
						$total += $prod;
						$_SESSION['item_id'] = $prodId;
					}

					

					echo '
						<tr>
							
							<td colspan="4" style="text-align: right;">Gross Total</td>
							<td colspan="2">'.$total.'</td>
							
						</tr>
						<tr>
							<td colspan="6"><a class="btn btn-primary" href="checkout.php">Checkout</a></td>
						</tr>

						';


					if ($_SESSION['item_count'] == "") {
							
					echo '
						<tr>
							<td colspan="6" style="text-align:center;">Empty Cart</td>
						</tr>
						';
					}	