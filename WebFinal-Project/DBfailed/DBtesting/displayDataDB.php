<?php
   $host="host=ec2-54-235-84-244.compute-1.amazonaws.com";
   $dbname="dbname=d1ovq05vs2aqii";
   $user="user=nxamshinupbnkg";
   $port="port=5432";
   $password="password=758dac437d2f27d11f6431307baf1bf13569730baa40b8c86cdb77291cb8aea8";
   $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);

   /*
      Display Test Data
   */

   $query = "SELECT (userID, data) FROM DataSet";
   $ret = pg_query($query);

   if(!$ret){
      echo(pg_last_error($db));
   }
   else{
      if (pg_num_rows($ret) > 0) {
         echo(pg_num_rows($ret));
         // output data of each row
         while($row = pg_fetch_array($ret)) {
            echo "userID: " . $row[0] . "data: " . $row[1] . "<br>";
         }
      }
      else {
         echo "0 results";
      }
   }


   /*
      Count the number of entries in the table
   */
   /*
   $query = "SELECT COUNT(*) AS total FROM TestDataSet";
   $ret = pg_query($query);

   if(!$ret){
      echo(pg_last_error($db));
   }
   else{
      $data=pg_fetch_assoc($ret);
      echo $data['total'];
   }
   */

 ?>
