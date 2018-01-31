<?php
require '../class/parametricas/entidad_parametrica_cls.php';
$class = new parametricas;
$id_depa=$_REQUEST['id_dep'];
$provincia=$class->get_provincia($id_depa);
echo   '<option value="*">--SELECCIONAR--</option>';
for ($i=0; $i < sizeof($provincia); $i++) {
  echo '<option value="'.$provincia[$i]["id_prov"].'">'.$provincia[$i]["provincia"].'</option>';
}
 ?>
