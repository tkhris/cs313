<?php
require_once('DB.php');
class User 
{
  private $username,
  $first_name,
  $last_name,
  $user_id,
  $token;

  public function __construct() {
    if (isset($_SESSION['user'])){
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
    $query_str = "SELECT users.user_id AS user_id, 
                         users.first_name AS first_name, 
                         users.last_name AS last_name, 
                         instagram_tokens.token AS token 
                            FROM users 
                            LEFT JOIN instagram_tokens USING(user_id)
                            WHERE username='".$username."'
                            AND password='".$password."'";
    $db = new DB();
    $results = $db->query($query_str);

    if (!$results)
      return false;

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
    return $this->first_name . " " . $this->last_name;
  }

  public function getToken() {
    return $this->token;
  }

  public function setToken($token) {
    $this->token = $token;
    $query_str = "INSERT INTO instagram_tokens (user_id, token)
      VALUES (".$this->user_id.", '".$token."')";

    $db = new DB();
    $db->query($query_str);
  }
}