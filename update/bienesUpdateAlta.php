<?php require '../class/bienes/bienes_cls.php' ;
$clase_main= new bien;
$id_patrimonial=$_REQUEST["id_patrimonial"];
session_start();
$usrreg = $_SESSION['sicop_usr_id'];
$clase_main->altaBien($id_patrimonial,$usrreg);
 ?>
