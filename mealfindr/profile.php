<?php

session_start();

require 'connect.php'; //database connection


$sql = "SELECT * FROM users WHERE username = '".$_SESSION['current_user']."'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
extract($user);


if (!isset($_SESSION['current_user'])) {
	header('location: login.php');
}


function getTitle() {
	echo 'Profile';
}

include 'partials/head.php';

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<br><br>
	<!-- wrapper -->
	<main class="wrapper">

		<h1>Profile Page</h1>
		<?php
		

		?>
	


		<div class="profile-wrapper">
			<?php

				if (isset($_SESSION['current_user'])) {
					echo '<h3>Welcome ' . $first_name . '  ' .$last_name. '!</h3><br>
					<img src="'.$image.'" style="text-align: center;"><br>'.$address.
					'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. </p>';
		}
			
			?>

			
		</div><br>
		
	</main>
	<br>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>