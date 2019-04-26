<?php

$server_name = "localhost";
$username = "root";
$password = ""; //windows should change to "" OR macos is "root"
$db_name = "s356f"; //change to your phpmyadmin table name
        
$conn = mysqli_connect($server_name, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else 
  {
      //echo 'OK';
  }
?> 