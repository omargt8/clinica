<?php

function conexion(){

 $con = mysql_connect("localhost","root","supermetroidgt8");

 if (!$con){

  die('Could not connect: ' . mysql_error());
 }

 mysql_select_db("clinica", $con);

 return($con);

}

?>

