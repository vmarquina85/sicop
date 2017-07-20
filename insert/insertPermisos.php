<?php require '../class/usuarios/usuarios_cls.php' ;
$clase_main= new usuarios;
$id_usr=$_REQUEST["iduser"];
$menu_id=$_REQUEST["menu_id"];
$submenu_id=$_REQUEST["submenu_id"];
$nivel=$_REQUEST["nivel"];

$clase_main->insertarPermisosNuevos($menu_id,$submenu_id,$id_usr,$nivel);
?>
