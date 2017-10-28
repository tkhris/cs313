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
	elseif (isset($_GET['access_token'])) 
	{
		$user->setToken($_GET['access_token']);
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
	<script type="text/javascript">
		$(document).ready(function() {
			var hash = window.location.hash
			if (!(hash === "")){
				var url = "/project01/views/main.php?"+hash.substr(1);
				window.location = url;
			}
		});
	</script>
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
			  <li><a id="current-page" href="">Project 01</a></li>
			</ul>

			<div id="body">
				<?php
					if (is_null($user->getToken()))
					{
						echo "<a href='https://api.instagram.com/oauth/authorize/?client_id=cc4ed102170144b3b794e1d7da0023b7&redirect_uri=https://shielded-forest-50991.herokuapp.com/project01/views/main.php&response_type=token'>Log into Instagram</a>";
					} else {
						// Get the pictures from Instagram

						// Example from http://php.net/manual/en/curl.examples.php
						// create curl resource 
				        $ch = curl_init();

				        // set url 
				        curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$user->getToken()); 

				        //return the transfer as a string 
				        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

				        // $output contains the output string 
				        $output = curl_exec($ch); 

				        // close curl resource to free up system resources 
				        curl_close($ch);

				        // turn the response into a json object
				        $json = json_decode($output);
				        
				        $user->saveImages($json);
				        echo $user->getHtmlPictures();
					}
				?>
			</div>
		</div>
</html>
