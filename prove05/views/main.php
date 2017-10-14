<?php

include_once('../classes/user.php');
$current_user = $_SESSION['current_user'];
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
				<a href="login.php">LOGIN</a>
			</div>

			<ul>
			  <li><a href="../../index.html">Home</a></li>
			  <li><a href="../../assignments.html">Assignments</a></li>
			  <li><a id="current-page" href="">Project Start</a></li>
			</ul>
		</div>

</html>
