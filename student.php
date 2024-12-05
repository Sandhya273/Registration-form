<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sform";

$conn = mysqli_connect($host, $user, $pass);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database checked/created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}


mysqli_select_db($conn, $dbname);


$table_sql = "CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    second_name VARCHAR(50),
    status INT
)";
if (mysqli_query($conn, $table_sql)) {
    echo "Table 'student' checked/created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
