<?php require '../class/parametricas/entidad_parametrica_cls.php' ;
$perso=new parametricas;
$destino=$_REQUEST["destino"];
$rs_personal=$perso->get_personal_nombre($destino);
?>
<select onchange='llenarPersonalDestino();' id="sl_des_Entrega"  class='form-control input-sm m-r-10  m-b-5'>
	<option value="*">--Seleccionar Entrega--</option>
	<?php for ($i=0; $i < sizeof($rs_personal) ; $i++) {  ?>
	<option value="<?php echo utf8_encode($rs_personal[$i]['id_personal']);?>"><?php echo utf8_decode($rs_personal[$i]['completo']); ?></option>
	<?php  }?>
</select>
