<?php
if (isset($_POST['username'])   && isset($_POST['password']) 
 && isset($_POST['first_name']) && isset($_POST['last_name']))
{
	require_once('../classes/DB.php');

	$query_str = "INSERT INTO users (first_name, last_name, username, password) 
	VALUES ('".$_POST['first_name']
	."', '".$_POST['last_name']
	."', '".$_POST['username']
	."', '".$_POST['password'].")";
	
	DB::query($query_str);

  	// login into instagram
 	

}

require_once('../classes/DB.php');

$query_str = "INSERT INTO users (first_name, last_name, username, password) 
	VALUES ('TYLER', 'CH', '".$_POST['username']
	."', '".$_POST['password']."')";

	$db = new DB();
	
	$db->query($query_str);

header("Location: ../views/main.php");

?>