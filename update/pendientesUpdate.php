<?php require '../class/bienes/bienesxusuario_cls.php' ;
$clase_main= new Pendientes;
$orden=$_REQUEST["orden"];
$clase_main->AceptarBienes($orden);
 ?>
