<?php
    header('Content-Type: text/html; charset=utf-8');
	$server = "localhost";
    $username = "root";
	$password = '';
	$banco = "london_study";

    $conn = mysqli_connect($server, $username, $password, $banco);

    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $exe = mysqli_query( $conn, "SET NAMES 'utf8'");
    $exe =  mysqli_query($conn, 'SET character_set_connection=utf8');
    $exe =  mysqli_query($conn, 'SET character_set_connection=utf8');
    $exe =  mysqli_query($conn, 'SET character_set_connection=utf8');