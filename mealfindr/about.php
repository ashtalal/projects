<?php

session_start();

function getTitle() {
	echo 'About';
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

		<h1>About</h1>
		<p style="width: 80%; margin: 0 auto; font-family: 'Patua One', cursive; text-align: center; font-size: 25px; font-weight: bolder;">Experience home-cooked meals just right for you, wherever you are.</p>
		<p class="header" style="width: 80%; margin: 0 auto; font-family: 'Nunito', sans-serif; text-align: center; font-size: 20px; margin-bottom: 20px;">
		When was the last time you had a home-cooked meal? Nothing beats a delicious meal made fresh from home, but with today’s fast-paced lifestyle, home-cooked meals seem like a luxury. Here at MealFindr, we make good food accessible for you, hassle-free.
		</p>
		<br>
		<p class="middle1">Speaking of Hassle-Free, We deliver food safe for you and for your family.
		We promote a clean safe eating vibes, especially for the sensitive eaters out there. We know you avoid specific foods (due to allergens, lactose intolerance, etc.) follow religious observances or just trying to eat healthy. Here at MealFindr, we filter your food choices and we deliver it with love.
		</p>
		<br>
		<p class="middle2">MealFindr is not just a delivery service. We empower kitchen merchants to manage their own food business out of the comfort of their own homes. You take charge of the cooking, and we do the business running for you. See? Hassle-Free.
		</p>
		<br>
		<p class="middle3">So if you have the passion and the guts to sell meals, do not hesitate to contact us. Simply register <a href="register.php">here</a> on our website and let the selling begin.
		</p>
		<br>
		<p class="conclusion">As for the foodies out there, Happy Hunting!</p>
		<br>
		
	</main>
	<br>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>