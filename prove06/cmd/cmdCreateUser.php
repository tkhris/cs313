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

  	// login into instagram
 	
	session_start();

	require_once('../classes/user.php');

	$user = new User();
	$user->loadUserFromDb($_POST['username'], $_POST['password']);

	$_SESSION['user'] = $user;
	header("Location: https://api.instagram.com/oauth/authorize/?client_id=cc4ed102170144b3b794e1d7da0023b7&redirect_uri=https://shielded-forest-50991.herokuapp.com/prove06/views/main.php&response_type=code");
}
else
	header("Location: ../views/main.php");

?>