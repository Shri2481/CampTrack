<?php
$servername = "localhost";
$username = "root";
$password = "Shri@1176";
$database = "camptrack";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}



?>
