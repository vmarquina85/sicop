<?php
require '../class/parametricas/entidad_parametrica_cls.php';
$class = new parametricas;
$id_dep=$_REQUEST['id_dep'];
$id_area=$_REQUEST['area'];
$oficina=$class->get_Oficina($id_dep,$id_area);
echo   '<option value="*">--SELECCIONAR--</option>';
for ($i=0; $i < sizeof($oficina); $i++) {
  echo '<option value="'.$oficina[$i]["id_oficina"].'">'.$oficina[$i]["descripcion"].'</option>';
}
 ?>
