<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '123456';
    $db_name = 'food-order';

    $conn = mysqli_connect($hostname, $username, $password, $db_name) or die(mysqli_error()); 
          