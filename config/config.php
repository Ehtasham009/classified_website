<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "classified_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

define('BASEURL', 'http://localhost/backend/');
?>