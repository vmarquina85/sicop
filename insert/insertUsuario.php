<?php require '../class/usuarios/usuarios_cls.php' ;
$clase_main= new usuarios;
$funcionario=$_POST["funcionario"];
$login=$_POST["login"];
$nivel=$_POST["nivel"];
$passwrd=$_POST["passwrd"];
$resultado=$clase_main->insertarUsuarioNuevo($funcionario,$login,$nivel,md5($passwrd));
echo $resultado;
?>
