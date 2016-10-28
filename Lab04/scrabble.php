<?php
    //$key = $_REQUEST["key"];
    $key = "hello";
    $myfile = fopen("words.txt", "r") or die("Unable to open file!");
    $mywords = fread($myfile,filesize("words.txt"));
    $pattern = '/\n+['.$key.']{3,}+\n/';
    $results;
    preg_match_all($pattern, $mywords, $results);
    //echo fread($myfile,filesize("words.txt"));
    print_r(array_values($results));
    fclose($myfile);
?>
