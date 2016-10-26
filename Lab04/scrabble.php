<?php
    $key = $_REQUEST["key"];
    $myfile = fopen("words.txt", "r") or die("Unable to open file!");
    $results;
    $pattern = "/\s+[".$key."]+\s/gm";
    preg_match_all($pattern, $myfile, $results);
    //echo fread($myfile,filesize("words.txt"));
    echo($results);
    fclose($myfile);
?>
