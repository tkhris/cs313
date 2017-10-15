<?php

class User 
{
  private $username,
  $first_name,
  $last_name,
  $user_id,
  $token;

  private function __construct() {
    require_once('DB.php');
    if isset($_SESSION['user']){
      $user = $_SESSION['user'];
    }
    else {
      $username = '';
      $first_name = '';
      $last_name = '';
      $user_id = 0;
      $token = '';
    }
  }



  public function loadUserFromDb($username, $password) {
    $query_str = "SELECT users.user_id, 
                         users.first_name, 
                         users.last_name, 
                         instagram_tokens.token 
                            FROM users 
                            INNER JOIN instagram_tokens USING(user_id)
                            WHERE username=".$username." 
                            AND password=".$password;
    $results = DB::query($query);

    $row = pg_fetch_assoc($results);
    $this->username = $username;
    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->user_id = $row['user_id'];
    $this->token = $row['token'];
  }

  public function getHtmlPictures() {
    
  }

  public function getFullName() {
    return $first_name . " " . $last_name;
  }

  public function getToken() {
    return $token;
  }
}