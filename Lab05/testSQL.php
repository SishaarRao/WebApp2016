<?php
    //instantiate our DB object
    $host="host=ec2-174-129-223-35.compute-1.amazonaws.com";
    $dbname="dbname=db2f65s4cr211d";
    $user="user=jjmirjedzqvoxq";
    $port="port=5432";
    $password="password=eWgK0zDk65YHO_pFDM8VHftLzp";
    $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);
    //Create a table try/catch
    /*
    $query= <<<ESCAPED
         CREATE TABLE Football(
            TeamName varchar(255), NumberOfWins int
         )
ESCAPED;
    */
    //Add some data
    
    $query = "INSERT INTO Football VALUES('Redskins', 4)";
    $ret = pg_query($query);
    if(!$ret){
        echo(pg_last_error($db));
    }
    else{
        echo("successfully added row");
    }
    $query = "SELECT * FROM Football";

    $ret = pg_query($query);
    if(!$ret){
        echo(pg_last_error($db));
    }
    else{
        while ($row = pg_fetch_row($ret)) {
            echo("Team:".$row[0]."Num of Wins:".$row[1]."\n");
            //echo "<br />\n";
        }
        echo("success");
    }
    //Query our table

?>