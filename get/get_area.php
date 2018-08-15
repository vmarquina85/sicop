<?php
require '../class/parametricas/entidad_parametrica_cls.php';
$class = new parametricas;
$id_dep=$_REQUEST['id_dep'];
$area=$class->get_Area($id_dep);
echo   '<option value="*">TODOS</option>';
for ($i=0; $i < sizeof($area); $i++) {
  echo '<option value="'.$area[$i]["id_area"].'">'.$area[$i]["descripcion"].'</option>';
}
 ?>
