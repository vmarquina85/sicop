<?php require '../class/usuarios/usuarios_cls.php' ;
$clase_main= new usuarios;
$id_usr=$_REQUEST["iduser"];
$clase_main->eliminarPermisos($id_usr);
?>
