<?php

$szorzotabla = function ($szam) {

    echo "<table border='1'>";
    echo "<tr>";

    for ($i = 1; $i <= $szam; $i++) {
        if ($i == 1) {
            echo "<td style='background-color: blue;'>$i</td>";
        } else {
            echo "<th>$i</th>";
        }
    }
    echo "</tr>";

    for ($i = 2; $i <= $szam; $i++) {
        echo "<tr>";
        echo "<th>$i</th>";

        for ($j = 2; $j <= $szam; $j++) {
            $eredmeny = $i * $j;
            if ($i == $j) {
                echo "<td style='background-color: blue;'>$eredmeny</td>";
            } else {
                echo "<td>$eredmeny</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};

$szorzotabla(10);

?>