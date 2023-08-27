<?php
//Database details
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'intervista';

//Create connection and select DB
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

//manage errors 
if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
?>
