<?php

function getTitle() {
	echo 'Create New Item';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Create New Item Page</h1>
		
		<form id="registerForm" method="POST" action="assets/createnewitem.php" class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" placeholder="Enter product name" class="form-control" required>

			<label for="image">Image</label>
			<input type="file" name="image" id="image" placeholder="Upload image" class="form-control" required>

			<label for="price">Price</label>
			<input type="text" name="price" id="price" placeholder="PHP 0.00" class="form-control" required>

			<label for="description">Description</label>
			<input type="text" name="description" id="description" placeholder="Type product description here" class="form-control" required>

			<label for="category">Category</label><br>
			<select id="category" class="form-control">
			  <option value="Category 1">Category 1</option>
			  <option value="Category 2">Category 2</option>
			  <option value="Category 3">Category 3</option>
			</select><br><br>

			<input type="submit" name="submit" id="submit" value="Create Item" class="btn btn-primary">
		</form>

	</main>

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