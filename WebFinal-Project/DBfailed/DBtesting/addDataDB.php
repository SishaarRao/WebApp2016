<?php
   $datastream = $_REQUEST["datastream"];
   $userID = $_REQUEST["userID"];
   $host="host=ec2-54-235-84-244.compute-1.amazonaws.com";
   $dbname="dbname=d1ovq05vs2aqii";
   $user="user=nxamshinupbnkg";
   $port="port=5432";
   $password="password=758dac437d2f27d11f6431307baf1bf13569730baa40b8c86cdb77291cb8aea8";
   $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);

   /*
      Add Test Data
   */
   $query = "INSERT INTO DataSet(userID, data) VALUES('".$userID."', '".$datastream."')";
   $ret = pg_query($query);
   if(!$ret){
      echo(pg_last_error($db));
   }
   else{
      echo("successfully added row");
   }



   function to_pg_array($set) {
      settype($set, 'array'); // can be called with a scalar or array
      $result = array();
      foreach ($set as $t) {
         if (is_array($t)) {
            $result[] = to_pg_array($t);
         }
         else {
            $t = str_replace('"', '\\"', $t); // escape double quote
            if (! is_numeric($t)) // quote only non-numeric values
                $t = '"' . $t . '"';
            $result[] = $t;
        }
    }
    return '{' . implode(",", $result) . '}'; // format
}

 ?>
