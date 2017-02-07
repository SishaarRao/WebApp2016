<?php
//$query = "Turkey";
$query = $_GET["food"];
$url = "http://api.nal.usda.gov/ndb/search/?format=json&q=".$query."&sort=n&max=200&offset=0&api_key=lyubMo18xQEjqjK4rkoPEuDL4GuGhIuJZjgUCsui";
$response = file_get_contents($url);
$response = json_decode($response);
//echo('<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

//echo("start");
foreach($response->list as $temp)
{

  //if($temp=="item")
  {
    foreach($temp as $row)
    {
    echo('<li class="mdl-list__item mdl-button mdl-js-button itembut" id ="'.$row->ndbno.'" onclick = "myFood(this)"><span class="mdl-list__item-primary-content">'.$row->name.'</span></li>');
  }
}
}
 ?>
