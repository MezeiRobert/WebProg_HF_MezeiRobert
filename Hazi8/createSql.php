<?php

include 'connection.php';
global $conn;

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev varchar(30) NOT NULL,
    szak varchar(30) NOT NULL,
    atlag double NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table hallgatok created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
