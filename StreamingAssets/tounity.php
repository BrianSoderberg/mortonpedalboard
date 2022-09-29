<?php
    echo("Reading Pedal Dimensions.csv\n");
    $file = fopen("Pedal Dimensions.csv", "r");
    echo fread($file, filesize("Pedal Dimensions.csv"));
    fclose($file);
?>