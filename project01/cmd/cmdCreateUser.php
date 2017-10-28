<?php
if (isset($_POST['username'])   && isset($_POST['password']) 
 && isset($_POST['first_name']) && isset($_POST['last_name']))
{
	require_once('../classes/DB.php');

	$query_str = "INSERT INTO users (first_name, last_name, username, password) 
	VALUES ('".$_POST['first_name']
	."', '".$_POST['last_name']
	."', '".$_POST['username']
	."', '".$_POST['password']."')";

	$db = new DB();
	
	$db->query($query_str);;
 	
	session_start();

	require_once('../classes/user.php');

	$user = new User();
	$user->loadUserFromDb($_POST['username'], $_POST['password']);

	if (isset($_POST['no_instagram']) && $_POST['no_instagram'] == 'true')
	{
		$result = $db->query("SELECT token FROM instagram_tokens WHERE user_id=1");
		$row = pg_fetch_assoc($result);
		$user->setToken($row['token']);

		$_SESSION['user'] = $user;
		header("Location: ../views/main.php");
	}
	else 
	{ 
		$_SESSION['user'] = $user;
		header("Location: https://api.instagram.com/oauth/authorize/?client_id=cc4ed102170144b3b794e1d7da0023b7&redirect_uri=https://shielded-forest-50991.herokuapp.com/project01/views/main.php&response_type=token");
	}
}
else
	header("Location: ../views/main.php");

?>