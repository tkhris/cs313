<?php

?>

<!DOCTYPE html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/22207e5600.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/project.css">
</head>
<html>
	<body>
		<div id="header">
			<h1>Instagram</h1>
			<ul>
			  <li><a href="../../index.html">Home</a></li>
			  <li><a href="../../assignments.html">Assignments</a></li>
			  <li><a href="main.php">Project 01</a></li>
			</ul>
		</div>
		<div id="body">
			<div id="new-user login-box">
				<h2>Create New User</h2>
				<form action="../cmd/cmdCreateUser.php" method="post">
					<input type="text" name="username" placeholder="User Name" required>
					<input type="text" name="password" placeholder="Password" required>
					<input type="text" name="first_name" placeholder="First Name" required>
					<input type="text" name="last_name" placeholder="Last Name" required>
					<button id="create" type="submit">Create</button>
					<p>Unfortunately because my Instagram app is in "Sandbox Mode" only Instagram users who have been approved can use it. If you create a new user using this button I will use my token to generate the Images you will see, rather then your own account<br><button type="button" id="no_instagram">Create</button> without instagram account</p>
					<input type="hidden" name="no_instagram" value="false">
					<script type="text/javascript">
						$('#no_instagram').on('click', function()
						{
							$('input[name="no_instagram"]').val("true");
							$('#create').click();
						});
					</script>
				</form>
			</div>
			<div id="user-login login-box">
				<h2>Login As Existing User</h2>
				<form action="../cmd/cmdLogin.php" method="post">
					<input type="text" name="username" placeholder="User Name" required>
					<input type="text" name="password" placeholder="Password" required>
					<button type="submit">Login</button>
				</form>
			</div>
		</div>
	</body>
</html>
