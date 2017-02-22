<?php require '../class/bienes/bienes_cls.php' ;
$clase_main= new bien;
$id_patrimonial=$_REQUEST["id_patrimonial"];
$causal=$_REQUEST["causal"];
$clase_main->eliminarBien($id_patrimonial,$causal);
 ?>
