<?php
if (isset($_POST['username']) && isset($_POST['password']) 
	&& isset($_POST['first_name']) && isset($_POST['last_name']))
{
	require_once('../classes/db.php');

	$query_str = "INSERT INTO users (first_name, last_name, username, password) 
	VALUES ('".$_POST['first_name']
	."', '".$_POST['first_name']
	."', '".$_POST['first_name']
	."', '".$_POST['first_name'].")";
	
	DB::query($query_str);
}

?>