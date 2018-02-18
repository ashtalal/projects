	<?php

	session_start();

	$id = $_SESSION['cart'];
	$file = file_get_contents('items.json');
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

					

					echo '
						<tr>
							
							<td colspan="4" style="text-align: right;">Gross Total</td>
							<td colspan="2">'.$total.'</td>
							
						</tr>
						';


					if ($_SESSION['item_count'] == "") {
							
					echo '
						<tr>
							<td colspan="6" style="text-align:center;">Empty Cart</td>
						</tr>
						';
					}	