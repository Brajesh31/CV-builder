<?php
    //server name
    $server = "localhost";

    //database username
    $user = "root";

    //database password
    $password = "";

    //database name
    $nama_database = "cvbuilder";

    $connection = mysqli_connect($server, $user, $password, $nama_database);
    if(!$connection){
        die("Failed to connect with database: " . mysqli_connect_error());
    }

    //start php session
    session_start();
?>