<?php
require '../class/parametricas/entidad_parametrica_cls.php' ;
$perso=new parametricas;
$idpersonal=$_REQUEST["idpersonal"];
$rs_personal=$perso->get_personal_datos($idpersonal);
 ?>
  <div class="form-group">
    <label class="col-md-2 control-label">Area:</label>
    <div class="col-md-10">
      <select name="" id="sl_area_d" class='form-control input-sm  m-b-5'  disabled>
	<option value="<?php echo utf8_encode($rs_personal[0]['id_area']);?>" ><?php echo utf8_decode($rs_personal[0]['area']); ?></option>
  <option value="*">--Seleccionar--</option>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Oficina:</label>
    <div class="col-md-10">
            <select name="" id="sl_oficina_d" class='form-control input-sm  m-b-5' disabled>
  <option value="<?php echo utf8_encode($rs_personal[0]['id_oficina']);?>" ><?php echo utf8_decode($rs_personal[0]['oficina']); ?></option>
  <option value="*">--Seleccionar--</option>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Cargo:</label>
    <div class="col-md-10">
           <select name="" id="sl_cargo_d" class='form-control input-sm  m-b-5'   disabled>
  <option value="<?php echo utf8_encode($rs_personal[0]['id_cargo']);?>" ><?php echo utf8_decode($rs_personal[0]['cargo']); ?></option>
  <option value="*">--Seleccionar--</option>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">D.N.I.:</label>
    <div class="col-md-10">

        <input type="text" id="txt_dni_d" disabled class='form-control input-sm  m-b-5' value="<?php echo utf8_decode($rs_personal[0]['dni']); ?>">



    </div>
  </div>
