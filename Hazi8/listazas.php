<a href="bevitel.php">Új hallgató felvétele <br></a>
<style>
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }
</style>
<?php
session_start();
include 'connection.php';
global $conn;

if (!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}

$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Név</th><th>Szak</th><th>Átlag</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nev"] . "</td><td>" . $row["szak"] . "</td><td>" . $row["atlag"] . "</td>";
        echo "<td><a href=update.php?id=". $row["id"].">Update</a></td>";
        echo "<td><a href=delete.php?id=". $row["id"].">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nincsenek adatok a táblában.";
}

$conn->close();
?>


