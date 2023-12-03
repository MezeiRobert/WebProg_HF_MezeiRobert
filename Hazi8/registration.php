<?php

include "connection.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_user = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_user);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0){
        echo "A felhasznalonev foglalt";
    } else {
        $insert_user = "INSERT INTO users (username,password) VALUES (?,?)";
        $stmt = $conn->prepare($insert_user);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Sikeres regisztracio";
        } else {
            echo "Hiba a regisztracio sorant: ". $stmt->error;
        }
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Regisztracio</title>
</head>
<body>
<h2>Regisztracio</h2>
<form action="registration.php" method="post">
    Felhasznalonev: <input type="text" name="username"><br>
    Jelszo: <input type="password" name="password"><br>
    <input type="submit" value="Regisztracio">
</form>
</body>
<a href="login.php">Bejelentkezes</a>
</html>

