<?php require '../class/usuarios/usuarios_cls.php' ;
$usuarios=new usuarios;
$tam=$_REQUEST["limit"];
$inicio=$_REQUEST["offset"];
$parametro=$_REQUEST["parametro"];
$rs_usuarios=$usuarios-> get_usuarios($tam, $inicio,$parametro);
if (sizeof($rs_usuarios)>0) {
  echo "<tbody id='tb_detalle_bienes'>";
  for ($i=0; $i <sizeof($rs_usuarios) ; $i++) {
    echo "<tr";
if ($rs_usuarios[$i]["usr_est"]==0) {
 echo " class='active'";
}
echo ">
    <td id='".$i."' class='p-1 f-s-12 text-center'><div class='btn-group'><a onclick='obtenerObject(this)' data-toggle='dropdown' class='btn btn-primary btn-xs dropdown-toggle' aria-expanded='true'><i class='fa fa-settings'></i>Acciones <span class='caret'></span></a><ul class='dropdown-menu'><li><a href='javascript:opennp(fila);'><img  src='../assets/img/lock-icon.png'/> Nivel y Permisos</a></li>";
if ($rs_usuarios[$i]["usr_est"]==1) {
  echo  "<li><a href='javascript:desactivarUsuario(fila);'><img  src='../assets/img/sign-ban-icon.png'/> Desactivar</a></li>";
}else{
    echo  "<li><a href='javascript:activarUsuario(fila);'><img src='../assets/img/sign-check-icon.png' /> Activar</a></li>";
}
    echo "<li><a href='javascript:getPasswordModal(2,fila);'><img  src='../assets/img/keyring-icon.png'/> Cambiar Contraseña</a></li></ul></div></td>
<td class='p-5 f-s-12 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_id"])."</td>
<td class='p-5 f-s-12 text-center m-r-10 m-l-10'> ".($rs_usuarios[$i]["usr_login"])."</td>
<td class='p-5 f-s-12 text-center m-r-10 m-l-10'> ".($rs_usuarios[$i]["completo"])."</td>
<td class='p-5 f-s-12 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_niv"])."</td>
<td class='p-5 f-s-12 text-center m-r-10 m-l-10'><img src='../assets/img/0047-ID-icon.png' /> ".utf8_encode($rs_usuarios[$i]["usr_idper"])."</td>";
if ($rs_usuarios[$i]["usr_est"]==1) {
  echo "<td class='p-5 f-s-12 text-center m-r-10 m-l-10'><span class='label label-success p-5'>ACTIVO</span></td>
      <tr>";
}else if ($rs_usuarios[$i]["usr_est"]==0) {
  echo "<td class='p-5 f-s-12 text-center m-r-10 m-l-10'><span class='label label-default p-5'>INACTIVO</span></td>
      <tr>";
}

  }
    echo "</tbody>";
}
?>
