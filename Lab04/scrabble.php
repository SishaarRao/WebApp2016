<?php
    //$key = $_REQUEST["key"];
    $key = "hello";
    $myfile = fopen("words2.txt", "r") or die("Unable to open file!");
    $mywords = fread($myfile,filesize("words2.txt"));
    $pattern = '/\\b["'.$key.'"]{3,}+\\b/';
    preg_match_all($pattern, $mywords, $results);
    //echo fread($myfile,filesize("words.txt"));
    $results = $results[0];
    foreach($results as $value){
        $flag = true;
        foreach(str_split($value) as $letter){
            preg_match_all("/['".$letter."]/", $value, $value_count);
            preg_match_all("/['".$letter."]/", $key, $key_count);
            $value_count = count($value_count[0]);
            $key_count = count($key_count[0]);
            if($key_count < $value_count){
                $flag = false;
                break;
            }
        }
        if($flag)
            echo($value."\n");
    }
    fclose($myfile);
?>
