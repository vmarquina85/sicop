<?php require '../class/bienes/bienesxusuario_cls.php' ;
$clase_main= new Pendientes;
$tipo=$_REQUEST["respuesta"];
$orden=$_REQUEST["orden"];
if ($tipo=='A') {
$clase_main->AceptarBienes($orden);
}elseif ($tipo=='R') {
$clase_main->RechazarBienes($orden);
}

 ?>
