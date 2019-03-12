<?php

/* 
 ThirdMethod PDO
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=classicmodels",$username,$password);
    
    //set the PDO error mode to exception
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
    
} catch (PDOException $e) {

    echo "Connection failed: " .$e->getMessage();
}