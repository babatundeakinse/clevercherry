<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'clevercherry');

class Utils {

  public $db;

  public function __construct() {
    $this->db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  }

  public function checkUsername($username){

      $query = "select * from users where username = '$username' ";
      $result = $this->runQuery($query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


      if(count($row) > 0)
      {
          return false;
      }

    //header("Location: index.php");
    return true;
  }

  public function getCurrentUser(){
    if(isset($_SESSION['current_user'])){

      $user_id = $_SESSION['current_user'];
      $query = "select * from users where id = '$user_id' ";
      $result = $this->runQuery($query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(count($row) > 0)
      {
          return $row;
      }
    }
    //header("Location: index.php");
    return false;
  }

  public function postUserRegister($username ,  $password ,  $role_id ){

    $username = mysqli_real_escape_string($this->db,$username);
    $password = mysqli_real_escape_string($this->db,$password);
    $role_id = $role_id;

    // encrypt password
    $enc_password = sha1($password);

    if($this->checkUsername($username)){

        $query = "INSERT INTO users(username,password) VALUES('$username','$enc_password')";
        $result = $this->runQuery($query);
        $last_id = mysqli_insert_id($this->db);

        if(count($result) > 0)
        {
          $query = "INSERT INTO user_roles(user_id,role_id) VALUES('$last_id','$role_id')";
          $result = $this->runQuery($query);
          $_SESSION["current_user"] = $last_id;

          header('Location: index.php');
        }
    }



    return false;
  }

  public function postUserLogin($username ,  $password){

    $username = mysqli_real_escape_string($this->db,$username);
    $password = mysqli_real_escape_string($this->db,$password);

    // encrypt password
    $enc_password = sha1($password);

    $query = "SELECT id FROM users WHERE username = '$username' and password = '$enc_password'";
    $result = $this->runQuery($query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $myuser = $row['id'];

    if(count($row) > 0)
    {
      $_SESSION["current_user"] = $myuser;
    }

    return false;
  }

  public function getUserRole($type){
    $user_id = $_SESSION['current_user'];
    $query = "select roles.name as name from users inner join user_roles on user_roles.user_id='$user_id' inner join roles on user_roles.role_id=roles.id";
    $result = $this->runQuery($query);
    $role_names = array();

    if($result)
    {
      $total = count($result);
      $i = 0;

      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        if(!in_array($row['name'],$role_names)){
          array_push($role_names,$row['name']);
        }
      }

      if(in_array($type, $role_names))
      {
        return true;
      }
    }

    return false;

  }

  public function runQuery($query){
    $sql = mysqli_query($this->db,$query);
    return $sql;
  }

}
?>
