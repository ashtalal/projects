<?php

session_start();

require 'connect.php';

$sql = "SELECT * FROM users WHERE username = '".$_SESSION['current_user']."'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
extract($user);

if (!isset($_SESSION['current_user']))
	header('location: login.php');

function getTitle() {
	echo 'Home';
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
		<div class="home-wrapper">

			<?php

			if (isset($_SESSION['current_user'])) {
				echo '<h3>Welcome ' . $first_name . '!</h3><br>
					  <img src="'. $image .'" style="text-align: center;"><br>
					  <form action="assets/upload.php" method="post" enctype="multipart/form-data">
					  <input type="file" name="uploadImage" id="uploadImage">
					  <input type="submit" value="Upload" name="submit">
					  </form><br>
					  <div class="alert alert-warning" role="alert">
						  <label style="">Basic Information </label><br>
						  <label>Home Address:  </label>'.$address.'<br>
						  <label>Contact:  </label>'.$contact.'
					   </div>';

			}

			?>
		</div>


	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>