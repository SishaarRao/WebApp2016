<?php
    //instantiate our DB object
    $host="host=ec2-174-129-223-35.compute-1.amazonaws.com";
    $dbname="dbname=db2f65s4cr211d";
    $user="user=jjmirjedzqvoxq";
    $port="port=5432";
    $password="password=eWgK0zDk65YHO_pFDM8VHftLzp";
    $db = pg_connect($host." ".$dbname." ".$user." ".$port." ".$password);
    //Create a table try/catch
    $query= <<<ESCAPED
         CREATE TABLE Football(
            TeamName varchar(255), NumberOfWins int
         )
ESCAPED;
    
    $ret = pg_query($query);
    if(!$ret){
        echo(pg_last_error($db));
    }
    else{
        echo("success");
    }
    //Add some data

    //Query our table

?>