<?php
    $teamname = $_REQUEST["teamname"];
    $wins = $_REQUEST["wins"];
    $host="host=ec2-174-129-223-35.compute-1.amazonaws.com";
    $dbname="dbname=db2f65s4cr211d";
    $user="user=jjmirjedzqvoxq";
    $port="port=5432";
    $password="password=eWgK0zDk65YHO_pFDM8VHftLzp";
    $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);

    $query = "INSERT INTO Football VALUES('".$teamname."', ".$wins.")";
    $ret = pg_query($query);
    if(!$ret){
        echo(pg_last_error($db));
    }
    else{
        echo("successfully added row");
    }

?>