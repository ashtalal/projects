<?php

session_start();

$_SESSION['message'] = "";

if (isset($_SESSION['current_user'])) {
	header('location: home.php');
}

function getTitle() {
	echo 'Meals Just Right For You';
}

include 'partials/head.php';

//create session variable for cart
$_SESSION['cart'] = array();
//creat session variable for item count
$_SESSION['item_count'] = 0;

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<br>
	<br>

	<!-- wrapper -->
	<main class="container-fluid index">
		<h1 style="text-align: center;">Experience</h1>
		<h2>Meals specially made for you!</h2>
		<br>
		<div class="container food-browser">
			<h3>Browse by Categories</h3>
			<div class="food-container poultry"><a href="catalog.php?category=1&search="><img src="assets/img/cartoon/nut.jpg"></a></div>
			<div class="food-container nuts"><a href="catalog.php?category=4&search="><img src="assets/img/cartoon/chick.jpg"></a></div>
			<div class="food-container dairy"><a href="catalog.php?category=3&search="><img src="assets/img/cartoon/seafood.jpg"></a></div>
			<div class="food-container seafood"><a href="catalog.php?category=2&search="><img src="assets/img/cartoon/milk.jpg"></a></div>
		</div>

		
	</main>
	<br>

	<!-- main footer -->

<?php
include 'partials/main_footer.php';
include 'partials/foot.php';

?>

</body>
</html>