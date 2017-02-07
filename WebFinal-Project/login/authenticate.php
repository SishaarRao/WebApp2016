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

$query = "SELECT * FROM login";
$ret = pg_query($query);
$user = htmlspecialchars($_POST["user"]);
$pw = htmlspecialchars($_POST["pw"]);
//echo($user." ".$pw);
if(!$ret)
  {
    echo(pg_last_error());
  }
else
  {
      while ($row = pg_fetch_row($ret)) {
        //echo($row[0]." ".$row[1]."\n");
        //echo(($row[0]==$user)." ".($row[1]==$pw));
        $isuser = ($row[0]==$user && $row[1]==$pw);
        if($isuser){
          redirect("../dashboard/home.php?user=".$user,false);
        }
      }
      if(!$isuser){
        redirect("./login.html",false);
      }
  }
  ?>
