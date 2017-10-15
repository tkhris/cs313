<?php

if (isset($_SESSION['user']))
  session_unset('user');

header('../views/main.php');

?>