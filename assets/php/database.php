<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "youcodescumboard";

// create connection
    $link = mysqli_connect($serverName,$userName,$password,$database);

    // check conniction
    if(!$link){
     die("connection failed : " .mysqli_connect_error());      
    }
    
?>