<?php
require_once('function.php');
session_start();
$dbCon = new Utils;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_REQUEST['login'])){
      if($_REQUEST['username'] && $_REQUEST['password']  ){
        $dbCon->postUserLogin($_REQUEST['username'] ,  $_REQUEST['password']);
      }
  }

  if(isset($_REQUEST['register'])){
      if($_REQUEST['username'] && $_REQUEST['password'] && $_REQUEST['role_id'] ){
        $dbCon->postUserRegister($_REQUEST['username'] ,  $_REQUEST['password'] , $_REQUEST['role_id']  );
      }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
