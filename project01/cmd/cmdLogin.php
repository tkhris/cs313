<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password']))
{
  require_once('../classes/user.php');
  $user = new User;
  $loadComplete = $user->loadUserFromDb($_POST['username'], $_POST['password']);
  var_dump($loadComplete);
  if(!$loadComplete){
  	var_dump('fail');
  	die();
  	header('Location: ../views/login.php');
  } else {
  	$_SESSION['user'] = $user;

  	header('Location: ../views/main.php');
  }
}
else
	header('Location: ../views/login.php');