<?php include('../class/bienes/bienes_cls.php');
$clase= new bien();
$prefix= $_REQUEST['prefix'];
$rs_grupoClase=$clase-> get_grupoClase($prefix);
echo json_encode($rs_grupoClase);
 ?>
