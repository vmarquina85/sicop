<?php 
require '../class/parametricas/entidad_parametrica_cls.php' ;
$parametro=new parametricas;
$codPatrimonial=$_REQUEST["id_patrimonial"];
$rs_detalleBien=$parametro->Get_detalleBien($codPatrimonial);
echo json_encode($rs_detalleBien);
 ?>
