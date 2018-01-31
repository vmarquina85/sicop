<?php
require '../class/parametricas/entidad_parametrica_cls.php';
$class = new parametricas;
$id_prov=$_REQUEST['id_prov'];
$distrito=$class->get_distrito($id_prov);
echo   '<option value="*">--SELECCIONAR--</option>';
for ($i=0; $i < sizeof($distrito); $i++) {
  echo '<option value="'.$distrito[$i]["id_dist"].'">'.$distrito[$i]["distrito"].'</option>';
}
 ?>
