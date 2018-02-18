<?php

session_start();

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

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Profile Page</h1>
		<?php
		// $file = file_get_contents('assets/users.json');
		// $users = json_decode($file, true);

		// foreach ($users as $key => $user) {
		// 	if ($_SESSION['current_user'] === $user['username']) {
		// 		echo '<h2 style="text-align: center;"> Hello ' . $user['username'] . '! </h2><br><img src="' . $user['profilepic'] . '" style="width: 300px; height: 300px;">';
		// 	} 
		// }
		?>
	


		<div class="profile-wrapper">
			<?php
				// $file = file_get_contents('assets/users.json');
				// $users = json_decode($file, true);

				foreach ($users as $key => $user) {
					if ($_SESSION['current_user'] === $user['username']) {
						echo '<h2 style="text-align: center;"> Hello ' . $user['username'] . '! </h2><br><img src="' . $user['profilepic'] . '" style="width: 400px; height: 400px;">';
						} 
				}
			?>

			<!-- <img src="assets/img/user/krisy.jpg"> -->
			<div class="detail">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		
	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>