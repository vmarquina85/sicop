<?php
require '../class/parametricas/entidad_parametrica_cls.php' ;
$perso=new parametricas;
$idpersonal=$_REQUEST["idpersonal"];
$rs_personal=$perso->get_personal_datos($idpersonal);
?>


  <div class="input-group m-b-5 ">
    <span class="input-group-addon input-sm">Local</span>
    <select name="" id="sl_localAsignado" class='form-control input-sm' disabled>
      <option value="<?php echo utf8_encode($rs_personal[0]['id_dep']);?>" ><?php echo utf8_decode($rs_personal[0]['operativo']); ?></option>
      <option value="">-- Seleccione local --</option>
    </select>
  </div>
  <div class="input-group m-b-5 ">
    <span class="input-group-addon input-sm">Area</span>
    <select name="" id="sl_areaAsignado" class='form-control input-sm'  disabled>
      <option value="<?php echo utf8_encode($rs_personal[0]['id_area']);?>" ><?php echo utf8_decode($rs_personal[0]['area']); ?></option>
      <option value="">-- Seleccione Area --</option>
    </select>
  </div>
  <div class="input-group m-b-5 ">
    <span class="input-group-addon input-sm">Oficina</span>
    <select name="" id="sl_oficinaAsignado" class='form-control input-sm' disabled>
      <option value="<?php echo utf8_encode($rs_personal[0]['id_oficina']);?>" ><?php echo utf8_decode($rs_personal[0]['oficina']); ?></option>
      <option value="">-- Seleccione Oficina --</option>
    </select>
  </div>
  <div class="input-group m-b-5 ">
    <span class="input-group-addon input-sm">Cargo</span>
    <select name="" id="sl_cargoAsignado" class='form-control input-sm' disabled>
      <option value="<?php echo utf8_encode($rs_personal[0]['id_oficina']);?>" ><?php echo utf8_decode($rs_personal[0]['cargo']); ?></option>
      <option value="">-- Seleccione Cargo --</option>
    </select>
  </div>
  <div class="input-group m-b-5 ">
    <span class="input-group-addon input-sm">DNI</span>
      <input id='inputDniRegistro' type="text" class="form-control input-sm" value="<?php echo utf8_decode($rs_personal[0]['dni']); ?>" disabled>

  </div>
