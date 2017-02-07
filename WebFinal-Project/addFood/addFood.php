<?php
function redirect($url, $statusCode = 303)
{
 echo('<script>
 window.location = "'.$url.'";
 </script>');
}
$host="host=ec2-54-83-49-44.compute-1.amazonaws.com";
$dbname="dbname=d5ri1a2h6r334q";
$user="user=wyvigddvdlnsdi";
$port="port=5432";
$password="password=085b65180ffaae50a448d5fc2935f7ef9c49bab3c0b0a3761ce7714e7642a50d";
   $db = pg_pconnect($host." ".$dbname." ".$user." ".$port." ".$password);
$dbnum = $_GET["dbnum"];
$user = $_GET["user"];

$url = "http://api.nal.usda.gov/ndb/reports/?format=json&ndbno=".$dbnum."&api_key=lyubMo18xQEjqjK4rkoPEuDL4GuGhIuJZjgUCsui";
$response = file_get_contents($url);
$response = json_decode($response);
$nut =  $response->report->food->nutrients;
$calories = intval(($nut[1]->value));
$protein = intval(($nut[2]->value));
$fat = intval(($nut[3]->value));
$carb= intval(($nut[4]->value));
//date_default_timezone_set("America");
$date = date("Y/m/d");
//echo($date);
//echo("made it");
//echo($calories." ".$protein." ".$fat." ".$card."\n");
$query = "INSERT INTO food VALUES ('$user','$date','$calories','$protein','$fat','$carb');";
$ret = pg_query($db,$query);
if(!$ret){
  //echo("B");
  echo(pg_last_error());
}
else{
  //echo("We Made it");
  redirect("../dashboard/home.php?user=".$user,false);
}
?>
