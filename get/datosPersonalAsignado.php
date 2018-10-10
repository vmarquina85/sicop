<?php
require '../class/parametricas/entidad_parametrica_cls.php' ;
$perso=new parametricas;
$idpersonal=$_REQUEST["idpersonal"];
$rs_personal=$perso->get_personal_datos($idpersonal);
$code=$_REQUEST['code'];
error_reporting(0);
if ($code=='1') {
  echo "<div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Local</span>
    <select name='' id='sl_localAsignado' class='form-control input-sm' >
      <option value='".utf8_encode($rs_personal[0]['id_dep'])."'>".utf8_decode(@$rs_personal[0]['operativo'])."</option>
      <option value=''>-- Seleccione local --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Area</span>
    <select name='' id='sl_areaAsignado' class='form-control input-sm'  >
      <option value='".utf8_encode($rs_personal[0]['id_area'])."' >".utf8_decode(@$rs_personal[0]['area'])."</option>
      <option value=''>-- Seleccione Area --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Oficina</span>
    <select name='' id='sl_oficinaAsignado' class='form-control input-sm' >
      <option value='".utf8_encode($rs_personal[0]['id_oficina'])."' >".utf8_decode(@$rs_personal[0]['oficina'])."</option>
      <option value=''>-- Seleccione Oficina --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Cargo</span>
    <select name='' id='sl_cargoAsignado' class='form-control input-sm' >
      <option value='".utf8_encode($rs_personal[0]['id_cargo'])."'>".utf8_decode(@$rs_personal[0]['cargo'])."</option>
      <option value=''>-- Seleccione Cargo --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>DNI</span>
      <input id='inputDniRegistro' type='text' class='form-control input-sm' value='".utf8_decode(@$rs_personal[0]['dni'])."' >

  </div>";
}else{
  echo "<div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Local</span>
    <select name='' id='sl_localAsignadoUpdt' class='form-control input-sm' disabled>
      <option value='".utf8_encode($rs_personal[0]['id_dep'])."'>".utf8_decode(@$rs_personal[0]['operativo'])."</option>
      <option value=''>-- Seleccione local --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Area</span>
    <select name='' id='sl_areaAsignadoUpdt' class='form-control input-sm'  disabled>
      <option value='".utf8_encode($rs_personal[0]['id_area'])."' >".utf8_decode(@$rs_personal[0]['area'])."</option>
      <option value=''>-- Seleccione Area --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Oficina</span>
    <select name='' id='sl_oficinaAsignadoUpdt' class='form-control input-sm' disabled>
      <option value='".utf8_encode($rs_personal[0]['id_oficina'])."' >".utf8_decode(@$rs_personal[0]['oficina'])."</option>
      <option value=''>-- Seleccione Oficina --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>Cargo</span>
    <select name='' id='sl_cargoAsignadoUpdt' class='form-control input-sm' disabled>
      <option value='".utf8_encode($rs_personal[0]['id_cargo'])."'>".utf8_decode(@$rs_personal[0]['cargo'])."</option>
      <option value=''>-- Seleccione Cargo --</option>
    </select>
  </div>
  <div class='input-group m-b-5 '>
    <span class='input-group-addon input-sm'>DNI</span>
      <input id='inputDniRegistroUpdt' type='text' class='form-control input-sm' value='".utf8_decode(@$rs_personal[0]['dni'])."' disabled>

  </div>";
}

?>
