<?php

/* 
we create a new PHP file namedphpmysqlconnect.php
 */

require_once 'dbconfig.php';

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    echo "Connected to $dbname at $host succesfully.";
    
} catch (PDOException $pe) {
die ("Could not connect to the database $dbname :"  . $pe->getMessage());
}