<?php require '../class/usuarios/usuarios_cls.php' ;
$usuarios=new usuarios;
$id_usr=$_REQUEST["id_usr"];
session_start();
$usrreg = $_SESSION['sicop_usr_id'];
$usuarios->desactivarUsuario($id_usr,$usrreg);
 ?>
