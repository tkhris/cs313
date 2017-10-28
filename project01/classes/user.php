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


  // load a user from the database
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

    $row = pg_fetch_assoc($results);

    
    if (!$row){
      return false;
    }

    $this->username = $username;
    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->user_id = $row['user_id'];
    $this->token = $row['token'];

    // update the users last login information
    $db->query("UPDATE users SET last_login=NOW() WHERE user_id=".$this->user_id);

    return true;
  }

  public function saveImages($json)
  {
    if (!empty($json->data))
    {
      // save each picture to the database
      foreach ($json->data as $data) 
      {
        $query_str = "INSERT INTO instagram_imgs (user_id, url, link, date) 
          VALUES (".$this->user_id.", '".$data->images->standard_resolution->url."', '', NOW())";
        $db = new DB();
        $db->query($query_str);
      }
    }
  }

  public function getHtmlPictures() {
    $query_str = "SELECT user_id, url FROM instagram_imgs WHERE user_id=".$this->user_id." GROUP BY user_id, url";
    $db = new DB();
    $results = $db->query($query_str);

    $str = "";
    while ($row = pg_fetch_assoc($results))
    {
      $str .= "<img src='".$row['url']."'></img>";
    }

    return $str;
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