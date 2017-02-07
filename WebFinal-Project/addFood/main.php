<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Food</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <form>
        <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="foodname" name = "food"/>
            <label class="mdl-textfield__label" for="Food">Food Name</label>
        </div>

</form>
<?php
$user  = $_GET["user"];
echo('<div class ="user" id = "'.$user.'"m>
</div>');
?>
  <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="loginbut">Add Food</button></span>

<ul class="options mdl-list" id="Foods">

</ul>
<script src = "./main.js"></script>
  </body>
</html>
