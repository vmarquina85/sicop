<?php include ('../class/parametricas/entidad_parametrica_cls.php');
$class= new parametricas();
$tipo_cta=$_REQUEST['tipo_cta'];
$rtipocta=$_REQUEST['rtipocta'];
$rs_cuentas=$class->Get_cuentaContable($tipo_cta,$rtipocta);


echo '<select id="cuenta"  class="form-control input-sm">
	<option value="">--Seleccione cuenta--</option>';
for ($i=0; $i < sizeof($rs_cuentas) ; $i++) {
echo '<option value="'.$rs_cuentas[$i]['cuenta'].'">'.str_pad($rs_cuentas[$i]["cuenta"], 10, '.', STR_PAD_RIGHT) . '|' . trim($rs_cuentas[$i]["denomina"]).'</option>';
}

echo '</select>';

 ?>
