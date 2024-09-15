<?php

  //start session
  session_start();


  //create constant
    define('SITEURL','http://localhost/fruites/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','fruit_db');

  $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //db connctn
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //select db
?>