<?php require '../class/usuarios/usuarios_cls.php' ;
$usuarios=new usuarios;
$tam=$_REQUEST["limit"];
$inicio=$_REQUEST["offset"];
$parametro=$_REQUEST["parametro"];
$rs_usuarios=$usuarios-> get_usuarios($tam, $inicio,$parametro);
if (sizeof($rs_usuarios)>0) {
  echo "<tbody id='tb_detalle_bienes'>";
  for ($i=0; $i <sizeof($rs_usuarios) ; $i++) {
    echo "<tr>
    <td class='p-0 f-s-11 text-center m-r-10 m-l-10'><div class='btn-group m-r-5 m-b-5'><a href='javascript:;' data-toggle='dropdown' class='btn btn-success btn-sm dropdown-toggle' aria-expanded='true'>Acción <span class='caret'></span></a><ul class='dropdown-menu'><li><a href='javascript:;'>Editar</a></li><li><a href='javascript:;'>Eliminar</a></li><li><a href='javascript:;'>Cambiar Contraseña</a></li></ul></div></td>
<td class='p-0 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_id"])."</td>
<td class='p-0 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_login"])."</td>
<td class='p-0 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["completo"])."</td>
<td class='p-0 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_niv"])."</td>
<td class='p-0 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_usuarios[$i]["usr_idper"])."</td>";
if ($rs_usuarios[$i]["usr_est"]==1) {
  echo "<td class='p-0 f-s-11 text-center m-r-10 m-l-10'><img title='Activo' src='../assets/img/sign-check-icon.png' /></td>
      <tr>";
}else if ($rs_usuarios[$i]["usr_est"]==0) {
  echo "<td class='p-0 f-s-11 text-center m-r-10 m-l-10'><img title='Inactivo' src='../assets/img/sign-ban-icon.png'/></td>
      <tr>";
}

  }
    echo "</tbody>";
}
?>
