<?php

require_once('../classes/user.php');

session_start();
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];

	if (isset($_GET['code']))
	{
		$user->setToken($_GET['code']);
		$_SESSION['user'] = $user;
		header("Location: main.php");	
	}
}

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

			<div id="login">
				<?php
					if (isset($user))
					{
						echo $user->getFullName();
						echo "<br><a href='../cmd/cmdLogout.php'>LOGOUT</a>";

					}
					else
					{
						echo "<a href='login.php'>LOGIN</a>";
					}
				?>
			</div>

			<ul>
			  <li><a href="../../index.html">Home</a></li>
			  <li><a href="../../assignments.html">Assignments</a></li>
			  <li><a id="current-page" href="">Project DB</a></li>
			</ul>

			<div id="body">
				<?php
					if (is_null($user->getToken()))
					{
						echo "<a href='https://api.instagram.com/oauth/authorize/?client_id=cc4ed102170144b3b794e1d7da0023b7&redirect_uri=https://shielded-forest-50991.herokuapp.com/prove06/views/main.php&response_type=code'>Log into Instagram</a>";
					} else {
						// Get the pictures from Instagram
						echo "Token Generated: ";
						echo $user->getToken();
					}
				?>
			</div>
		</div>
</html>
