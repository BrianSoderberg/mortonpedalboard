<?php
    $text1 = $_POST["manufacturer"];
    $text2 = $_POST["model"];
    $text3 = $_POST["width"];
    $text4 = $_POST["height"];
    $text5 = $_POST["depth"];
    $text6 = $_POST["color"];

    if ($text1 != "")
    {
        $file = fopen("Pedal Dimensions.csv", "a");

        // exclusive lock
        if (flock($file,LOCK_EX)) // Lock file
        {
            echo("Message successfully sent!\n");
            echo("Manufacturer: " . $text1);
            echo("Model: " . $text2);
            echo("Width: " . $text3);
            echo("Height: " . $text4);
            echo("Depth: " . $text5);
            echo("Color: " . $text6);

            // write new effects pedal entry
            fwrite($file, $text1);
            fwrite($file, $text2);
            fwrite($file, $text3);
            fwrite($file, $text4);
            fwrite($file, $text5);
            fwrite($file, $text6);

            // fflush($file);

            // release lock
            flock($file,LOCK_UN); // Unlock file
        } 
        else 
        {
            echo "Error locking file!";
        }

        fclose($file);
    }
?>