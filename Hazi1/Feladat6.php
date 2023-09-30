<?php

$honap = 8;

if($honap>3 and $honap<=6){
    echo "Tavasz </br>";
} elseif ($honap>6 and $honap<=8) {
    echo "Nyar </br>";
} elseif ($honap>8 and $honap<=11) {
    echo "Osz </br>";
} elseif ($honap>11 and $honap<=2) {
    echo "Tel </br>";
} else {
    echo "Nem jo a megadott honap szama </br>";
}

?>

<?php

$honap = 3;

switch ($honap) {
    case 3:
    case 4:
    case 5:
        echo "Tavasz";
        break;
    case 6:
    case 7:
    case 8:
        echo "Nyar";
        break;
    case 9:
    case 10:
    case 11:
        echo "Osz";
        break;
    case 12:
    case 1:
    case 2:
        echo "Tel";
        break;
    default:
        echo "Nem jo a megadott honap szama";
        break;
}

?>