<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "student";    

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>