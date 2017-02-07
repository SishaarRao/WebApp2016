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
  if(!$db){
             echo "Error : Unable to open database\n";
          }

  $user = htmlspecialchars($_POST["user"]);
  $pw = htmlspecialchars($_POST["pw"]);
  $pw1 = htmlspecialchars($_POST["pw1"]);
  //echo($pw==$pw1);
  if($pw==$pw1){
    $query = "INSERT INTO login (username, userpass) VALUES('$user','$pw');";
    $ret = pg_query($db,$query);
    if(!$ret){
      //echo("B");
      echo(pg_last_error());
    }
    else{
      //echo("We Made it");
      redirect("../login/login.html",false);
    }
  }
  else{
    redirect("./index.html",false);
  }
?>
