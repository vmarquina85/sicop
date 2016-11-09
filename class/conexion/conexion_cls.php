<?php 
class conectar
{
function con_sinv(){
// $pconnect=pg_connect("host=200.62.231.213 port=5432 dbname=sinv user=webserver password=W38Serv3R879*-$");
 $pconnect=pg_connect("host=localhost port=5432 dbname=sysinv user=webserver password=userweb");
	if (!$pconnect)
	   return "fracaso";
	else
	   return $pconnect;
}
}
?>


