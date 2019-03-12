<?php
// CIS485 Test 1
// Database access configuration file

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



