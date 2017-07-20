<?php
include('../conexion/conexion_cls.php');
session_start();
$usr_login=$_SESSION['usr_login'];
$id_usr_edit=$_REQUEST['usuario'];
$password=$_REQUEST['pass'];
$new_pass=$_REQUEST['n_pass'];
$repeat_pass=$_REQUEST['r_pass'];
//conectar a base de datos
$conectar=new conectar;
$cn=$conectar->con_sinv();
//obtener Maximo Corelativo
if ($id_usr_edit=='') {
  $sql="select usr_pwd from usuarios where usr_login='".$usr_login."'" ;
  $result=pg_query($cn,$sql);
  $rs1 = pg_fetch_array($result, 0);
  $anterior=$rs1['usr_pwd'];
  if (md5(trim($password))==$anterior) {
  $plsql="update usuarios set usr_pwd='".md5($new_pass)."' where usr_login='" .$usr_login. "' and usr_pwd='".$anterior."'" ;
  $result2=pg_query($cn,$plsql);
  }else{
  echo "0";
   pg_close($cn);
   exit();
  }
   echo "1";
   pg_close($cn);

}else{
  $sql="select usr_pwd from usuarios where usr_id='".$id_usr_edit."'" ;
  $result=pg_query($cn,$sql);
  $rs1 = pg_fetch_array($result, 0);
  $anterior=$rs1['usr_pwd'];
  $plsql="update usuarios set usr_pwd='".md5($new_pass)."' where usr_id='" .$id_usr_edit. "' and usr_pwd='".$anterior."'" ;
  $result2=pg_query($cn,$plsql);
   echo "1";
   pg_close($cn);
}



?>
