<?php

   //Function that converts a PHP array to a literal PostGres array
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

   function postgres_to_php_array($postgresArray){

      $postgresStr = trim($postgresArray,"{}");
      $elmts = explode(",",$postgresStr);
      return $elmts;

   }



   $date = $_REQUEST["date"];
   $cals = $_REQUEST["cals"];
   $userID = $_REQUEST["userID"];
   $host="host=ec2-54-83-49-44.compute-1.amazonaws.com";
   $dbname="dbname=d5ri1a2h6r334q";
   $user="user=wyvigddvdlnsdi";
   $port="port=5432";
   $password="password=085b65180ffaae50a448d5fc2935f7ef9c49bab3c0b0a3761ce7714e7642a50d";
   $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);
   //date and cals will be inserted into database with format
   // date:cals      i.e.     0121:1000
   $input = $date . ":" . $cals;

   // Read current array
   $query = "SELECT * FROM CalorieDataSet";
   $ret = pg_query($query);
   echo("query");
   $finalArr = [];
   if(!$ret){
      echo(pg_last_error($db));
      //if this fails for some reason, assume that the
      //row does not exist
      $finalArr = to_pg_array(array($input));
   }
   else{
      echo("first else" . "<br />");
      //push new input onto currently existing data
      $arr = pg_fetch_all($ret);
      print_r($arr);
      echo("<br />");
      print_r($arr[0]);
      echo("<br />");
      print_r($arr[0][data]);
      echo("<br />");
      $finalArr = $arr[0][data];
      print_r($finalArr);
      echo("<br />");
      print_r(postgres_to_php_array($finalArr));
      echo("<br />");
      $finalArr = array_merge(postgres_to_php_array($finalArr), array($input));
      print_r($finalArr);
      echo("<br />");
      //delete that row from the table
      $query = "DELETE FROM CalorieDataSet WHERE userID='$userID'";
      $ret = pg_query($query);
      if(!$ret){
         echo(pg_last_error($db));
      }
      else{
         echo("successfully deleted rows");
      }


   }

   //Insert new row back into table
   $finalArr = to_pg_array($finalArr)
   $query = "INSERT INTO CalorieDataSet(userID, data) VALUES ('$userID','$finalArr')";
   $ret = pg_query($query);
   if(!$ret){
      echo(pg_last_error($db));
   }
   else{
      echo("successfully added row");
   }

 ?>
