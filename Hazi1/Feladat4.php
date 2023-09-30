<?php
echo "<table border=1>";
for ($i = 1; $i <= 3; $i++) {
    echo "<tr>\n";
    for ($j = 1; $j <= 3; $j++) {
        if (($i + $j) % 2 == 0) {
            echo "<td style='background-color: white; width:50px; height:50px;'></td>\n";
        } else {
            echo "<td style='background-color: black; width:50px; height:50px;'></td>\n";
        }
    }
    echo "</tr>\n";
}
echo "</table>";
?>