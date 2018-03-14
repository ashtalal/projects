<?php

require 'connect.php'; //database connection


session_start();

if (isset($_SESSION['current_user'])) {
	if ($_SESSION['role'] != 'admin')
		header('location: home.php');
}

function getTitle() {
	echo 'User Page';
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

		<h1>User Page</h1>
		<?php

		$id = $_GET['id'];
		$sql = "SELECT u.username, u.password, u.email, u.role_id, r.description, u.first_name, u.last_name, u.contact, u.address FROM users u JOIN roles r ON (r.id=u.role_id) WHERE u.id = '$id'";
		$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		$user = mysqli_fetch_assoc($result);
		extract($user);

		?>
		<table style="margin: 0 auto;">
			<tr>
				<td>Username</td>
				<td><?php echo $username; ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $password; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo $first_name .' '. $last_name; ?></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><?php echo $contact; ?></td>
			</tr>
			<tr>
				<td>Home Address</td>
				<td><?php echo $address; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<td>Role</td>
				<td><?php echo $description; ?></td>
			</tr>
		</table>
		
		<br>
		<div class="buttons" style="text-align: center;">
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button class="btn btn-default">Back</button></a>

			<button id="editUser" class="btn btn-info btn-md" data-toggle="modal" data-target="#editUserModal" data-index="<?php echo $id; ?>">Edit</button>

			
			<button id="deleteUser" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteUserModal" data-index="<?php echo $id; ?>">Delete User</button>
		</div>

	</main>
	<br>

	<!-- Modal -->
	<div id="editUserModal" class="modal fade" role="dialog">
 		<div class="modal-dialog">

	    <!-- Modal content-->
		    <form method="POST" action="assets/update_user.php">
		    	<input hidden name="user_id" value="<?php echo $id;?>">
			    <div class="modal-content">
			    	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Edit User Details</h4>
			      	</div>
			      	<div id="editUserModalBody" class="modal-body">	
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
		<div id="deleteUserModal" class="modal fade" role="dialog">
	 		<div class="modal-dialog">

		    <!-- Modal content-->
			    <form method="GET" action="assets/delete_user.php">
			    	<input hidden name="user-id" value="<?php echo $id;?>">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Delete User</h4>
				      	</div>
				      	<div id="deleteUserModalBody" class="modal-body">
				      	<p>Do you really want to delete this user's account?</p>	
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

		$('#editUser').click(function() {
			var userId = $(this).data('index');
			// console.log(userId);

			$.get('assets/edit_user.php',
				{
					id: userId
				},
				function(data, status) {
					// console.log(data);
					$('#editUserModalBody').html(data);
			});
		});

	}); 
</script>

</body>
</html>