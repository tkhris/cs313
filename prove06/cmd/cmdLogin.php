<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password']))
{
  require_once('../classes/user.php');
  $user = new User;
  if(!$user->loadUserFromDb($_POST['username'], $_POST['password']))
  	header('Location: ../views/login.php');

  $_SESSION['user'] = $user;

  header('Location: ../views/main.php');
}
else
	header('Location: ../views/login.php');