<?php

$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest", "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");

foreach ($orszagok as $orszag => $varos) {
    echo "<p>$orszag fovarosa <span style='color: red'>$varos</span></p>";
}

?>