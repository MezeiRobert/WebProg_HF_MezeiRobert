<?php

$array = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($array as $tomb) {
    $type = gettype($tomb);
    $isNumeric = is_numeric($tomb) ? "IGEN" : "NEM";
    echo "Tomb eleme: $tomb, Tipusa: $type, Numerikus: $isNumeric <br>";
}

?>