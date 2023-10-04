<?php

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function atalakit($tomb, $muvelet) {
    $atalakitott_tomb = array();

    foreach ($tomb as $kulcs =>$ertek) {
        if ($muvelet == "kisbetus") {
            $atalakitott_tomb = array_map("strtolower",$tomb);
        } elseif ($muvelet == "nagybetus") {
            $atalakitott_tomb = array_map("strtoupper",$tomb);
        }
    }
    echo "<br>";
    return $atalakitott_tomb;
}

$kisbetus = atalakit($szinek, "kisbetus");
print_r($kisbetus);

$nagybetus = atalakit($szinek, "nagybetus");
print_r($nagybetus);

?>