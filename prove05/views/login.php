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
			  <li><a href="main.php">Project Start</a></li>
			</ul>
		</div>
		<div id="body">
			<div id="new-user login-box">
				<h2>Create New User</h2>
				<form action="../cmd/cmdCreateUser.php" method="post">
					<input type="text" name="username" placeholder="User Name" required>
					<input type="text" name="password" placeholder="Password" required>
					<button type="submit">Create</button>
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
