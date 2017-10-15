<?php

if (isset($_POST['username']) $$ isset($_POST['password']))
{
  require_once('../classes/User.php');
  $user = new User;
  $user->loadUserFromDb($_POST['username'], $_POST['password']);

  $_SESSION['user']= $user;

  header('../views/main.php');
}