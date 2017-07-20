<?php require '../class/usuarios/usuarios_cls.php' ;
$perfil= new usuarios;
$usuario=$_REQUEST['user'];
$rs_perfil=$perfil->get_Perfil($usuario);
if (sizeof($rs_perfil)>0) {
echo $rs_perfil[0]['usr_niv'];
}
?>
