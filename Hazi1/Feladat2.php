<html>

    <body>
        <?php

        $seconds=7200;

        $hour = $seconds/3600;

        if(is_int($hour)) {
            echo $seconds. " <b> masodperc oraban kifejezve:</b> ". $hour. " <b>ora</b>";
        }else{
            echo "<b>Nem egesz szamot kapunk</b>";
        }

        ?>
    </body>

</html>