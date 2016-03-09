<?php
    require 'config.php';
        
      // To open a connection to a mysql database use the following includes.
      // include 'opendb.php';
      // Then perfrom sql statements (insert quuery).
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection.
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }
