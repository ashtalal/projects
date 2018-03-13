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
		
	</main>
	<br>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>