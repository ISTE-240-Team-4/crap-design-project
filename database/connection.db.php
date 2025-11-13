<?php
  $username = "root";
  $password = "password";
  $hostname = "localhost";
  $databaseName = "this-crap";

  $mysqli = new mysqli($hostname, $username, $password, $databaseName);
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL/MariaDB database: " . $mysqli -> connect_error;
    exit();
  }
?>