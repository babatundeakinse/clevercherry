<?php
require_once('function.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_REQUEST['username'] && $_REQUEST['password']  ){

        // username and password sent from form
        $dbCon = new Utils;
        $conn  = $dbCon->db;
        $username = mysqli_real_escape_string($conn,$_REQUEST['username']);
        $password = mysqli_real_escape_string($conn,$_REQUEST['password']);

        // encrypt password
        $enc_password = sha1($password);

        //var_dump($enc_password);

        // prepare database
        $sql = "SELECT id FROM users WHERE username = '$username' and password = '$enc_password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $myuser = $row['id'];

        // check number of row
        $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if($count == 1) {
           $_SESSION['current_user'] = $username;
           $response = array(
             'status' => 0,
           );

           $jsonstring = json_encode($response);

           echo  $jsonstring;

        }else {

           $response = array(
             'status' => 1,
             'message' => "Your Login Name or Password is invalid",
           );

           $jsonstring = json_encode($response);

           echo $response;

        }

     }
}
?>
