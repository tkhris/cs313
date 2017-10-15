<?php
if (isset($_POST['username'])   && isset($_POST['password']) 
 && isset($_POST['first_name']) && isset($_POST['last_name']))
{
	require_once('../classes/db.php');

	$query_str = "INSERT INTO users (first_name, last_name, username, password) 
	VALUES ('".$_POST['first_name']
	."', '".$_POST['last_name']
	."', '".$_POST['username']
	."', '".$_POST['password'].")";
	
	DB::query($query_str);

  	// login into instagram
 	

}

header("Location: ../views/main.php");

?>