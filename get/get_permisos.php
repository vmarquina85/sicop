<?php require '../class/usuarios/usuarios_cls.php' ;
$permisos= new usuarios;
$usuario=$_REQUEST['user'];
$rs_permisos=$permisos->get_Permisos_Activos($usuario);
for ($i=0; $i < sizeof($rs_permisos) ; $i++) {
  echo "<tr>
    <td class='p-0 text-center hide'>".$rs_permisos[$i]['menu_id']."</td>
    <td class='p-0 text-center '>".$rs_permisos[$i]['menu_name']."</td>
    <td class='p-0 text-center hide'>".$rs_permisos[$i]['submenu_id']."</td>
    <td class='p-0 text-center '>".$rs_permisos[$i]['submenu_name']."</td>";
if ($rs_permisos[$i]['active']=='t') {
echo "<td class='p-0 text-center'>
  <input type='checkbox' class='pointer check'  value='".$rs_permisos[$i]['menu_id']."-".$rs_permisos[$i]['submenu_id']."' checked></td>";
}else{
  echo "<td class='p-0 text-center'>
    <input type='checkbox' class='pointer check'  value='".$rs_permisos[$i]['menu_id']."-".$rs_permisos[$i]['submenu_id']."'>
  </td>";
}
echo  "</tr>";
}

?>
