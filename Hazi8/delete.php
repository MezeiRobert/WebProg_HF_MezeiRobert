<?php
session_start();
include 'connection.php';
global $conn;

if (!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM hallgatok WHERE id=$id";
    if ($conn->query($sql) === TRUE){
        header("Location: listazas.php");
    } else {
        echo "Error deleting record: ". $conn->error;
    }
}