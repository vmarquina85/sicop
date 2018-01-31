<?php
require '../class/parametricas/entidad_parametrica_cls.php';
require '../class/config/preconfig_cls.php';
require '../class/config/session_val.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Sicop</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link rel="shortcut icon" sizes="16x16" type="image/png" href="../assets/img/favicon/package.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="../assets/css/animate.min.css" rel="stylesheet" />
  <link href="../assets/css/style.min.css" rel="stylesheet" />
  <link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
  <link href="../assets/css/theme/default.css" rel="stylesheet" id="theme" />
  <link href="../assets/plugins/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
    <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->

</head>
<body>
  <!-- begin #page-loader -->
  <div id="page-loader">
    <div class="material-loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
      </svg>
      <div class="message">Cargando...</div>
    </div>
  </div>
  <!-- end #page-loader -->
  <!-- begin #page-container -->
  <div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-inverse bg-navbar navbar-fixed-top">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-click="top-menu-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="p_main.php" class="navbar-brand" style='width: auto;'>
            <!--  <i style ='color:#00BCD4'class="material-icons md-48">local_shipping</i> -->

            <strong class='text-white sombrear'><img src="../assets/img/package.png" alt=""> SICOP</strong>

          </a>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle text-white sombrear" data-toggle="dropdown">
              <?php if ($_SESSION['sicop_sexo']=='1') {
    echo '<img src="../assets/img/man.png" alt="">';
  } else{
    echo '<img src="../assets/img/girl.png" alt="">';
  }
  ?>
              <span class="hidden-xs">Hola, <?php echo ucwords(strtolower($_SESSION['sicop_usr_name'])) ?></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
              <li class="arrow"></li>
              <li><a href="javascript:getPasswordModal(1);">Cambiar Contraseña</a></li>
              <li class="divider"></li>
              <li><a href="../class/login/logout_cls.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
        <!-- end header navigation right -->
      </div>
      <!-- end container-fluid -->
    </div>
    <!-- end #header -->
    <!-- begin #top-menu -->
    <div id="top-menu" class="top-menu">
      <!-- begin top-menu nav -->
      <ul id='nav_menu' class="nav">
      </ul>
    </div>

    <div id="content" class="content">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title">Registro de Traslados</h4>
        </div>
        <div class="panel-body">
          <div class='bg-grey-200  m-b-10 '>
            <button class="btn btn-default btn-xs m-b-10 m-t-10  m-l-10" onclick='javascript:nuevoRegistro();'><img src="../assets/img/new_reg.png" alt="Nuevo Registro"> Nuevo Registro</button>
          </div>
          <form action ='javascript:;' class='form-inline' method='POST' id='panelForm'>
            <div class="form-group  form-group-sm  m-r-10 m-b-5">
              <input type="text" class="form-control input-mw" id="txt_numero"  placeholder="Nro" />
            </div>
            <select onchange='' id="sl_origen" class='form-control input-sm m-r-10  m-b-5'>
              <option value="*">--Seleccionar Origen--</option>
              <?php for ($i = 0; $i < sizeof($rs_origen); $i++) { ?>
                <option value="<?php echo utf8_encode($rs_origen[$i]['id_dep']); ?>"><?php echo utf8_encode($rs_origen[$i]['descripcion']); ?></option>
                <?php } ?>
              </select>
              <select id="sl_destino" class='form-control input-sm m-r-10  m-b-5'>
                <option value="*">--Seleccionar Destino--</option>
                <?php for ($i = 0; $i < sizeof($rs_destino); $i++) { ?>
                  <option value="<?php echo utf8_encode($rs_destino[$i]['id_dep']); ?>"><?php echo utf8_encode($rs_destino[$i]['descripcion']); ?></option>
                  <?php } ?>
                </select>
                <select onchange='search(1)' id="sl_estado" class='form-control input-sm m-r-10  m-b-5'>
                  <option value="*">--Todos Estados--</option>
                  <option value="R">Recibidos</option>
                  <option value="I">Pendientes</option>
                  <option value="A">Anulados</option>
                </select>
                <div class='text-center'>
                  <select onchange='search(1)' id="sl_movtipo" class='form-control input-sm m-r-10  m-b-5'>
                    <option value="*">--Todos Tipo Movimiento--</option>
                    <option value="1">Interno</option>
                    <option value="2">Externo</option>
                    <option value="3">Mantenimiento</option>
                  </select>
                  <button onclick='search(1)' class="btn btn-info btn-xs m-b-10 m-t-10"><i class="fa fa-search"></i> Buscar</button>
                  <button onclick='vertodos()' class="btn btn-default btn-xs m-b-10 m-t-10 "><img src="../assets/img/refresh.png" alt="Ver Todos"> Ver Todos</button>
                </div>
              </form>
              <ul id='paginator' class="pagination">
              </ul>
              <div class='table-responsive'>
                <table id='data-table' class='table f-s-11'>
                  <thead>
                    <tr>
                      <th class='p-0 text-center  bg-grey-200'></th>
                      <th class='p-0 text-center  bg-grey-200 hide'>mot_tipo</th>
                      <th class='p-0 text-center  bg-grey-200'>Tipo</th>
                      <th class='p-0 text-center  bg-grey-200'>Nro</th>
                      <th class='p-0 text-center  bg-grey-200'>Fecha</th>
                      <th class='p-0 text-center  bg-grey-200'>Origen</th>
                      <th class='p-0 text-center  bg-grey-200'>Destino</th>
                      <th class='p-0 text-center  bg-grey-200'>Motivo</th>
                      <th class='p-0 text-center  bg-grey-200'>Entrega</th>
                      <th class='p-0 text-center  bg-grey-200'>Recibe</th>
                      <th class='p-0 text-center  bg-grey-200'>E</th>
                      <th class='p-0 text-center  bg-grey-200'>Fecha Ing.</th>
                    </tr>
                  </thead>
                  <tbody id='tb_pdesplazamiento'>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div id='mymodal' class="modal fade"  aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Nuevo Translado</h4>
                </div>
                <div class="modal-body scrolled">
                  <form id='formulario'>
                    <div class='text-center'>
                    </div>
                    <h5 class='resaltar'>Datos de Papeleta</h5>
                    <br>
                    <div class="row">
                    <div class="col-md-3">
                      <label for="">Tipo Papeleta:</label>
                      <!-- <input id='txtMotivo' type="text" class='form-control input-sm' value='ASIGNACION' disabled> -->
                      <select id='sl_tipo' class='form-control input-sm' name="">
                        <option value="0">--Seleccionar--</option>
                        <option value="1">INTERNO</option>
                        <option value="2">EXTERNO</option>
                        <option value="3" disabled>MANTENIMIENTO</option>
                      </select>
                    </div>
                  </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <label for="">Origen:</label>
                        <input id='txt_origin' type="text" disabled class='form-control input-sm' value="<?php echo $_SESSION['s_operativo']; ?>">
                      </div>
                      <div class="col-md-3">
                        <label for="">Destino:</label>
                        <select onchange='obtener_personal();validar_mov_tipo();' id="sl_TrasladoDestino" class='form-control input-sm m-r-10  m-b-5'>
                          <option value="*">--Seleccionar Destino--</option>
                          <?php for ($i = 0; $i < sizeof($rs_destino); $i++) { ?>
                            <option value="<?php echo utf8_encode($rs_destino[$i]['id_dep']); ?>"><?php echo utf8_encode($rs_destino[$i]['descripcion']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-4">
                              <label for="">Fecha:</label>
                              <input id='txtFecha' type="text" disabled class='form-control input-sm' disabled value='<?php echo date('d/m/Y'); ?>'>
                            </div>
                            <div class="col-md-4">
                              <label for="">Motivo:</label>
                                <select id='sl_motivo' class='form-control input-sm' name="">
                                <option value="*">--Seleccionar--</option>
                                <option value="1">MANTENIMIENTO</option>
                                <option value="3">TRANSFERENCIA</option>
                                <option value="4">BAJA</option>
                                <option value="5">DONACIÓN</option>
                                <option value="6">PRESTAMO</option>
                                <option value="7">DEVOLUCIÓN</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="">Nro Orden:</label>
                              <input id='txtOrden' type="text" disabled class='form-control input-sm resaltar'>
                            </div></div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-md-6">
                            <legend>
                              <h5 class='resaltar'><strong>Datos de Origen</strong></h5>
                            </legend>
                            <div class="form-group m-t-25">
                              <label class="col-md-2 control-label">Entrega:</label>
                              <div class="col-md-10">
                                <select name="" id="sl_entrega_o" class="form-control input-sm  m-b-5" disabled>
                                  <option value="<?php echo $_SESSION['usr_idper'] ?>"><?php echo $_SESSION['sicop_usr_name'] ?></option>
                                </select>
                                <!--   <input type="text" id="txt_entrega_o" class="form-control input-sm  m-b-5" disabled value="<?php echo $_SESSION['sicop_usr_name'] ?>"> -->
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">Area:</label>
                              <div class="col-md-10">
                                <select name="" id="sl_area_o" class="form-control input-sm  m-b-5" disabled>
                                  <option value="<?php echo $_SESSION['id_area']; ?>"><?php echo $_SESSION['s_area']; ?></option>
                                </select>

                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">Oficina:</label>
                              <div class="col-md-10">
                                <select name="" id="sl_oficina_o" class="form-control input-sm  m-b-5" disabled>
                                  <option value="<?php echo $_SESSION['id_oficina']; ?>"><?php echo $_SESSION['s_oficina']; ?></option>
                                </select>

                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">Cargo:</label>
                              <div class="col-md-10">
                                <select name="" id="sl_cargo_o" class="form-control input-sm  m-b-5" disabled>
                                  <option value="<?php echo $_SESSION['id_cargo']; ?>"><?php echo $_SESSION['s_cargo']; ?></option>
                                </select>

                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">D.N.I.:</label>
                              <div class="col-md-10">
                                <input type="text" id="txt_dni_o" class="form-control input-sm  m-b-5" disabled value="<?php echo $_SESSION['s_dni']; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <legend>
                              <h5 class='resaltar'><strong>Datos de Destino</strong></h5>
                            </legend>
                            <div class="form-group m-t-25">
                              <label class="col-md-2 control-label">Recibe:</label>
                              <div class="col-md-10">
                                <select onchange='llenarPersonalDestino();' name='sl_des_Entrega' id="sl_des_Entrega" class='form-control input-sm m-r-10  m-b-5'>
                                  <option value="*">--Seleccionar Entrega--</option>
                                </select>
                              </div>
                            </div>
                            <div id='datosDestino'>
                              <div class="form-group">
                                <label class="col-md-2 control-label">Area:</label>
                                <div class="col-md-10">
                                  <select name="" id="sl_area_d" class='form-control input-sm  m-b-5' disabled>

                                    <option value="*" >--Seleccionar--</option>

                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-2 control-label">Oficina:</label>
                                <div class="col-md-10">
                                  <select name="" id="sl_oficina_d" class='form-control input-sm  m-b-5' disabled>

                                    <option value="*" >--Seleccionar--</option>

                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-2 control-label">Cargo:</label>
                                <div class="col-md-10">
                                  <select name="" id="sl_cargo_d" class='form-control input-sm  m-b-5' disabled>

                                    <option value="*" >--Seleccionar--</option>

                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-2 control-label">D.N.I.:</label>
                                <div class="col-md-10">
                                  <input type="text" id='txt_dni_d' class='form-control input-sm m-b-5' disabled>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Tipo de Bien:</label>
                              <select id="sl_tipobien" class='form-control input-sm m-r-10 m-b-5' onChange='setCodigo();'>
                                <option value="*">--Seleccionar Tipo--</option>
                                <?php for ($i = 0; $i < sizeof($rs_tipobien); $i++) { ?>
                                  <option value="<?php echo $rs_tipobien[$i]['prefijo'] . '@' . $rs_tipobien[$i]['id_tipo']; ?>"><?php echo utf8_encode($rs_tipobien[$i]['descripcion']); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label class="control-label">Codigo Patrimonial:</label>
                              <div class='input-group input-group-sm  m-b-5'>
                                <input type="text" id="txt_cod_1" class="form-control "  disabled >
                                <span class="input-group-addon">-</span>
                                <input type="text" id="txt_cod_2" class="form-control width-50" maxlength='4' onkeypress="ValidaSoloNumeros();" >
                              </div>

                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label class="control-label">Observacion:</label>
                                <div class='row'>
                                  <div class="col-md-9"><input type="text" id="txt_transladoObservacion" class="form-control input-sm  m-b-5"></div>
                                  <div class="col-md-3"> <a href='javascript:agregar_detalle();' id='btnAgregar' title='Agregar Bien' class='btn btn-sm btn-success'><i class='fa fa-plus'></i></a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <table id='tb_detalles' class='table table-bordered f-s-11'>
                            <thead  style='background-color: rgba(100,100,100,0.1);'>
                              <tr>
                                <th class='p-0 text-center  bg-grey-200'>ID Patrimonial</th>
                                <th class='p-0 text-center  bg-grey-200'>Descripcion</th>
                                <th class='p-0 text-center  bg-grey-200'>Marca</th>
                                <th class='p-0 text-center  bg-grey-200'>Modelo</th>
                                <th class='p-0 text-center  bg-grey-200'>Color</th>
                                <th class='p-0 text-center  bg-grey-200'>Serie</th>
                                <th class='p-0 text-center  bg-grey-200'>Estado</th>
                                <th class='p-0 text-center  bg-grey-200'>Observacion</th>
                                <th class='p-0 text-center  bg-grey-200'>Eliminar</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                        <a href="javascript:grabarTranslado();" class="btn btn-sm btn-success" >Grabar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- end #content -->
              <!-- begin theme-panel -->
              <!-- end theme-panel -->
              <!-- begin scroll to top btn -->
              <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
              <!-- end scroll to top btn -->
            </div>
            <!-- end page container -->
            <!-- ================== BEGIN BASE JS ================== -->
            <script src="../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
            <script src="../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
            <script src="../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
            <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
          <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
            <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
            <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
            <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="../class/config/config.js"></script>
<script src="../class/menu/menu.js"></script>
            <!-- ================== END BASE JS ================== -->
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
            <script src="../assets/js/apps.min.js"></script>
            <script src="../class/ajax/ajax.js"></script>
            <script src="../class/desplazamiento/pdesplazamiento.js"></script>
            <script src="../class/login/killerSession.js"></script>

            <!-- ================== END PAGE LEVEL JS ================== -->
            <script>
            //globals-----------------------------------------------------
            var selectedIdUser='';
            construirMenu();
            //------------------------------------------------------------
            $(document).ready(function () {
              App.init();
              search(1);
              $(".datepicker-default").datepicker({
                todayHighlight: !0,
                format: 'dd/mm/yyyy'
              })
            });

            </script>
          </body>
          </html>
