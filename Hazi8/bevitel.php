<!DOCTYPE html>
<html>
<head>
    <title>Új hallgató felvitele</title>
</head>
<body>
<h2>Új hallgató felvitele</h2>
<form action="bevitel.php" method="post">
    Név: <input type="text" name="nev"><br>
    Szak: <input type="text" name="szak"><br>
    Átlag: <input type="text" name="atlag"><br>
    <input type="submit" value="Felvétel">
</form>

<?php
session_start();
include 'connection.php';
global $conn;

if (!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST["nev"];
    $szak = $_POST["szak"];
    $atlag = $_POST["atlag"];

    $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssd", $nev, $szak, $atlag);
        if ($stmt->execute()) {
            echo "Az új hallgató sikeresen felvéve!";
            echo '<a href="listazas.php"><button>Vissza a listázáshoz</button></a>';
        } else {
            echo "Hiba az új hallgató felvételekor: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

</body>
</html>