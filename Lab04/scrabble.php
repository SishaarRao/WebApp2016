<?php
    $key = $_REQUEST["key"];
    $myfile = fopen("words.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("words.txt"));
    fclose($myfile);
?>
