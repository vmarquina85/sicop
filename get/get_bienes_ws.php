<?php require '../class/bienes/bienes_cls.php' ;
$cls_bien=new bien;
$patrimonial=$_REQUEST["patrimonial"];
$ResultBien=$cls_bien-> get_bien_ws($patrimonial);
 echo substr(json_encode($ResultBien),1,-1);
// echo json_encode($ResultBien);
?>
