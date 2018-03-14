<?php


session_start();

require 'connect.php'; //database connection

// if (isset($_SESSION['current_user'])) {
// 	if ($_SESSION['role'] != 'admin')
// 		header('location: home.php');
// }

function getTitle() {
	echo 'Item Page';
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
	<main class="wrapper-itemphp">

		<h1>Item Page</h1>
		<?php

		$id = $_GET['id'];

		$sql = "SELECT m.product_name, m.price, m.description,  m.image, u.username, f.name, u.image as user_image FROM meals m JOIN food_categories f ON (m.category_id=f.id) JOIN users u ON (u.id=m.merchant) where m.id = '$id'";

		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		$item = mysqli_fetch_assoc($result);
		
		extract($item);

		?>
		<table class="id_table" style="margin: 0 auto; font-family: 'Patua One', cursive; font-size: 20px;">
			<tr>
				<!-- <td>Product Name</td> -->
				<td style="font-size: 32px;"><?php echo $product_name; ?></td>
			</tr>
			<tr>
				<!-- <td>Image</td> -->
				<td>
					<img src="<?php echo $image; ?>" alt="mock image of beer" style="width: 300px; height: 300px;">
				</td>
			</tr>
			<tr>
				<!-- <td>Price</td> -->
				<td style="color: maroon; font-weight: bolder;">PHP <?php echo $price; ?></td>
			</tr>
			<tr>
				<!-- <td>Description</td> -->
				<td><?php echo $description; ?></td>
			</tr>
			<tr>
				<!-- <td>Category</td> -->
				<td>Category :  <?php echo $name; ?></td>
			</tr>
			<tr>
				<!-- <td>Merchant</td> -->
				<td>
					<img src="<?php echo $user_image; ?>" alt="merchant" style="width: 100px; height: 100px; border-radius: 50%;">
				</td>
			</tr>
		</table>
		<br>
		<div class="buttons" style="text-align: center;">
		<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button class="btn btn-default">Back</button></a>
		
		<button id="editItem" class="btn btn-info btn-md" data-toggle="modal" data-target="#editItemModal" data-index="<?php echo $id; ?>">Edit</button>

		
		<button id="deleteItem" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteItemModal" data-index="<?php echo $id; ?>">Delete</button>
		</div>
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