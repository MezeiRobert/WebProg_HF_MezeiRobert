<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include 'connection.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_data = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_data);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if ($password === $row["password"]){
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            echo "Sikeres bejelentkezes";

            header("Location: listazas.php");
            exit();
        } else {
            echo "Hiba a bejelentkezes soran";
        }
    } else {
        echo "Hiba a bejelentkezes soran";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezes</title>
</head>
<body>
<h2>Bejelentkezes</h2>
<form action="login.php" method="post">
    Felhasznalonev: <input type="text" name="username"><br>
    Jelszo: <input type="password" name="password"><br>
    <input type="submit" value="Bejelentkezes">
</form>
<a href="registration.php">Regisztracio</a>
</body>
</html>


