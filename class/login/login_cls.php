<?php
include_once '../conexion/conexion_cls.php';
$class=new conectar;
$conexion=$class->con_sinv();
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];
$consulta ="select u.usr_login, u.usr_id, u.usr_pwd, u.usr_est, u.usr_niv,
(a.ape_paterno || ' '|| a.ape_materno || ', '||a.nombres) as funcionario,a.dni,a.sexo,a.id_cargo,
a.id_area,a.id_personal,o.descripcion as operativo, b.descripcion as area, f.descripcion as oficina,
d.descripcion as cargo,a.id_oficina,a.id_dep
from usuarios u
inner join personal a on u.usr_idper=a.id_personal
left join dependencias o on a.id_dep=o.id_dep
left join areas b on a.id_area=b.id_area and a.id_dep=b.id_dep
left join oficinas f on a.id_dep=f.id_dep and a.id_area=f.id_area and a.id_oficina=f.id_oficina
left join tablatipo d on a.id_cargo=d.id_tipo and d.id_tabla='10'
where trim(upper(u.usr_login))=trim(upper('" . $usuario . "'))";
$result = pg_query($conexion, $consulta);
if (pg_num_rows($result) > 0) {
  $query = pg_fetch_array($result, 0);
  $usr_name = $query["funcionario"];
  $operativo = $query["operativo"];
  $usr_stat = $query["usr_est"];
  $usr_niv = $query["usr_niv"];
  $usr_idarea=$query["id_area"];
  $usr_area=$query["area"];
  $sexo=$query["sexo"];
  $usr_idofi=$query["id_oficina"];
  $usr_of=$query["oficina"];
  $usr_idcargo=$query["id_cargo"];
  $usr_login=$query["usr_login"];
  $usr_cargo=$query["cargo"];
  $usr_dni=$query["dni"];
  $idoperativo = $query["id_dep"];
  $usr_id = $query["usr_id"];
  $pwd = $query["usr_pwd"];
  if(md5($contraseña)==$pwd)
  {
    if ($usr_stat <> '1') {
      echo '<div class="alert alert-warning">
      <p id="validacionMensaje">El Usuario esta deshabilitado. Favor contáctese con el personal de la USP</p>
    </div>';
  } else {
    $ale ="login";
//variables de entorno
    $ca = "select dependencia,entidad from entorno";
    $r = pg_query($conexion, $ca);
    session_start();
    // session_name($ale);
    $_SESSION['sicop_usr_name'] = $usr_name;
    $_SESSION['usr_login'] = $usr_login;
    $_SESSION['sicop_usr_id'] = $usr_id;
    $_SESSION['usr_niv'] = $usr_niv;
    $_SESSION['s_entidad'] = pg_fetch_result($r, 0, 'entidad');
    $_SESSION['s_dependencia'] = pg_fetch_result($r, 0, 'dependencia');
    $_SESSION['id_oficina']=$usr_idofi;
    $_SESSION['id_cargo']=$usr_idcargo;
    $_SESSION['s_oficina']=$usr_of;
    $_SESSION['s_operativo']=$operativo;
    $_SESSION['id_area']=$usr_idarea;
    $_SESSION['sicop_sexo']=$sexo;
    $_SESSION['s_area']=$usr_area;
    $_SESSION['s_cargo']=$usr_cargo;
    $_SESSION['s_dni'] =$usr_dni;
    $_SESSION['id_dep']=$idoperativo;
    $_SESSION['usr_idper'] = $query["id_personal"];
    $_SESSION['acceso'] = "yes";
    $_SESSION['matriz'] = array();
    $_SESSION['ordgen'] = "";
    $_SESSION['error_message'] = "";
    echo $_SESSION['acceso'];
  }
}else{
  echo '<div class="alert alert-danger">
  <p id="validacionMensaje">Contraseña invalida</p>
</div>';
}
}
else{
  echo '<div class="alert alert-danger">
  <p id="validacionMensaje">El Usuario no Registrado</p>
</div>';
}
?>
