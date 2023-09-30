<?php

//Valtozok
$x = 2;
$y = 3;

//Osszeadas
$osszeadas = $x + $y;
echo "x + y= ". $osszeadas. "<br/>";

//Kivonas
$kivonas = $x - $y;
echo "x - y= ". $kivonas. "<br/>";

//Szorzas
$szorzas = $x * $y;
echo "x * y= ". $szorzas. "<br/>";

//Osztas
if($y == 0) {
    echo '0-val valo osztas';
} else {
    $osztas = $x / $y;
    echo "x / y= ". $osztas. "<br/>";
}

//Hatvanyozas
$hatvanyozas = pow($x, $y);
echo "x ^ y= ". $hatvanyozas. "<br/>";

?>