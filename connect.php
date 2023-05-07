<?php
    $hostname     = "localhost";
    $username     = "root";
    $password     = "shruti";
    $databasename = "hostel";

    // Create connection
    $connection = mysqli_connect($hostname, $username, $password,$databasename);
    //Check connection
    if (!$connection) {
        die("Unable to Connect database: " . mysqli_connect_error());
        //echo "Connection not established";
    }else{
        //echo "Connection established";
    }
?>