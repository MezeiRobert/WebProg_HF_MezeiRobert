<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelvek => $napok) {
    echo "$nyelvek: ";
    foreach ($napok as $nap) {
        $napIndex = array_search($nap, $napok);
        if ($napIndex % 2 == 1) {
            echo "<b>$nap, </b>";
        } else {
            echo "$nap, ";
        }
    }
    echo "<br>";
} 

?>