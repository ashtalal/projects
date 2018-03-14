<?php

session_start();

if (!isset($_SESSION['current_user'])) {
	$_SESSION['message'] = 'Sign Up to Sell Meals!';
	header('location: register.php');
}

function getTitle() {
	echo 'Create New Item';
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

		<h1>Sell Meals</h1>
		
		<form id="registerForm" method="POST" action="assets/createnewitem.php" class="form-group" enctype="multipart/form-data">
			<label for="product_name">Name</label>
			<input type="text" name="product_name" id="product_name" placeholder="Enter product name" class="form-control" required>

			<label for="uploadFoodImage">Image</label>
			 <input type="file" name="uploadFoodImage" id="uploadFoodImage" placeholder="Upload image" class="form-control" required>

			<label for="price">Price</label>
			<input type="text" name="price" id="price" placeholder="PHP 0.00" class="form-control" required>

			<label for="description">Description</label>
			<input type="text" name="description" id="description" placeholder="Type product description here" class="form-control" required>

			<label for="category">Category</label><br>
			<select name="category" class="form-control">
			  <option value="1">Nuts</option>
			  <option value="2">Dairy</option>
			  <option value="3">Seafoods</option>
			  <option value="4">Poultry</option>
			  <option value="5">No Allergy</option>
			</select>
			<br>
			<br>

			<input type="submit" name="submit" id="submit" value="Create Item" class="btn btn-primary">
		</form>

	</main>
	<br>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>
<!-- 
	<script type="text/javascript">
		// $('#username').keyup(function() {
		$('#username').on('input', function() {
			var usernameText = $(this).val();
			// console.log(usernameText);

			$.post('assets/username_validation.php',
				{ username: usernameText },
				function(data, status) {
					// console.log('Processed: ' + data);
					$('[for="username"]').html(data);
				});
		});

		$('#confirmPassword').on('input', function() {
			// console.log($('#password').val());
			// console.log($('#confirmPassword').val());

			var passwordText = $('#password').val();
			var confirmPasswordText = $('#confirmPassword').val();
			if (passwordText != '' || confirmPasswordText != '') {
				if (passwordText == confirmPasswordText) {
					// console.log('matched');
					$('[for="password"]').html('Password <span class="green-message">matched</span>');
				} else {
					// console.log('mismatched');
					$('[for="password"]').html('Password <span class="red-message">mismatched</span>');
				}
			} else {
				$('[for="password"]').html('Password');	
			}
		});

		$('#email').on('input', function() {
			var emailText = $(this).val();
			// console.log(usernameText);

			$.post('assets/email_address_validation.php',
				{ email: emailText },
				function(data, status) {
					// console.log('Processed: ' + data);
					$('[for="email"]').html(data);
				});
		});
	</script> -->

</body>
</html>