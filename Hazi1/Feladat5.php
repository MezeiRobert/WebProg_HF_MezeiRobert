<?php

    $x=8;
    $y=6;
    $z="+";

    switch ($z) {
        case "+":
            $value = $x + $y;
            echo $x. $z. $y." = " . $value. "\n";
            break;
        case "-":
            $value = $x - $y;
            echo $x. $z. $y." = " . $value. "\n";
            break;
        case "*":
            $value = $x * $y;
            echo $x. $z. $y." = " . $value. "\n";
            break;
        case "/":
            if ($y == 0) {
                echo "0-val valo osztas!";
            } else {
                $value = $x / $y;
                echo $x. $z. $y." = " . $value. "\n";
                break;
            }
            break;
        default:
            echo "Nem jo a muvelet!";
            break;
            
    }

?>