<?php require '../class/bienes/bienes_cls.php' ;
$clase_main= new bien;
$id_patrimonial=$_REQUEST["id_patrimonial"];
$clase_main->altaBien($id_patrimonial);
 ?>
