<?php
require '../class/parametricas/entidad_parametrica_cls.php';
require '../class/config/preconfig_cls.php';
require '../class/config/session_val.php';
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Mantenimiento Bienes</title>
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
  <!-- <link href="../assets/plugins/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet" /> -->
  <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
  <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->
  <style>
  .ui-front {
    z-index: 1150;
  }
  .bordered{
    border-bottom: solid 1px rgba(0, 0, 0, 0.2);
    border-left: solid 1px rgba(0, 0, 0, 0.2);
    border-right: solid 1px rgba(0, 0, 0, 0.2);
  }
  .txt-red{
    color:red;
  }
  .progress-status img{
    width: 24px;
    height:24px;
  }
  @media print {
    .myDivToPrint {
      background-color: white;
      height: 100%;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      margin: 0;
      padding: 15px;
      font-size: 14px;
      line-height: 18px;
    }
  }
  .logomuni{
    display: inline-block;
  }
  </style>
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
    <div id="header" class="header navbar navbar-inverse bg-navbar navbar-fixed-top hidden-print">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle pull-right" data-click="top-menu-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="p_main.php" class="navbar-brand pull-left" style='width: auto;'>
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
    <div id="top-menu" class="top-menu hidden-print">
      <!-- begin top-menu nav -->

      <ul id='nav_menu' class="nav">
      </ul>
    </div>

    <div id="content" class="content">
      <!-- INICIO AKI -->
      <div class="hidden-print">


        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">Administración de Bienes</h4>
          </div>

          <div class="panel-body">

            <div class='bg-grey-200  m-b-10 '>
              <button class="btn btn-default btn-xs m-b-10 m-t-10  m-l-10" onclick='javascript:nuevoRegistro();'><img src="../assets/img/new_reg.png" alt="Nuevo Registro"> Nuevo Registro</button>
              <button class="btn btn-default btn-xs m-b-10 m-t-10 " onclick="exportar_excel()"><img src="../assets/img/excel.png" alt="Exportar excel"> Exportar a Excel</button>
              <div class="progress-status hide pull-right"><img src="../assets/img/Rolling.gif" class=' m-t-10 m-r-10'></div>
              <button class="btn btn-default btn-xs m-b-10 m-t-10 m-r-10 pull-right" onclick="procesoDepreciacion()"><img src="../assets/img/dollar.png" alt="Depreciar Bienes"> Depreciar Bienes</button>
            </div>


            <form class='form-inline' method='POST' id='panelForm'>
              <select onchange="search(1)" id="sl_tipobien" data-click="panel-refresh" class='default-select2 form-control input-sm m-r-10 m-b-15'>
                <option value="*">TODOS</option>
                <?php for ($i=0; $i < sizeof($rs_tipobien) ; $i++) {  ?>
                  <option value="<?php echo $rs_tipobien[$i]['prefijo'].'@'.$rs_tipobien[$i]['id_tipo']; ?>"><?php echo utf8_encode($rs_tipobien[$i]['descripcion']); ?></option>
                <?php  }?>

              </select>
              <div class="form-group  form-group-sm  m-r-10 m-b-5">
                <input type="text" class="form-control" id="txt_codpatrimonial"  placeholder="Cod. Patrimonial" />
              </div>
              <div class="form-group  form-group-sm m-r-10 m-b-5">
                <input type="text" class="form-control" id="txt_serie"  placeholder="Serie" />
              </div>
              <div class="form-group  form-group-sm m-r-10 m-b-5">
                <input type="text" class="form-control" id="txt_codinterno"  placeholder="Cod. Interno" />
              </div>
              <div class="form-group  form-group-sm m-r-10 m-b-5">
                <input type="text" class="form-control" id="txt_docalta"  placeholder="Doc. de Alta" />
              </div> <br>
              <select onchange='search(1)' id="sl_Operativo" class=' default-select2 form-control input-sm m-r-10  m-b-5'>
                <option value="*" disabled selected>Operativo</option>
                <option value="*">TODOS</option>
                <?php for ($i=0; $i < sizeof($rs_operativo) ; $i++) {  ?>
                  <option value="<?php echo utf8_encode($rs_operativo[$i]['id_dep']);?>"><?php echo utf8_encode($rs_operativo[$i]['descripcion']); ?></option>
                <?php  }?>
              </select>
              <select onchange='search(1)' id="sl_Marca" class='default-select2 select form-control input-sm m-r-10  m-b-5'>
                <option value="*" disabled selected>Marca</option>
                <option value="*">TODOS</option>
                <?php for ($i=0; $i < sizeof($rs_marca) ; $i++) {  ?>
                  <option value="<?php echo utf8_encode($rs_marca[$i]['id_tipo']); ?>"><?php echo utf8_encode($rs_marca[$i]['descripcion']); ?></option>
                <?php  }?>
              </select>
              <select onchange='search(1)' id="sl_Asignacion" class='form-control input-sm m-r-10  m-b-5'>
                <option value="*" disabled selected>Asignación</option>
                <option value="*">TODOS</option>
                <option value="A">ASIGNADOS</option>
                <option value="N">NO ASIGNADOS</option>
              </select>
              <select onchange='search(1)' id="sl_estado" class='form-control input-sm m-r-10  m-b-5'>
                <option value="*" disabled selected>Estado</option>
                <option value="*">TODOS</option>
                <option value="A">ACTIVO</option>
                <option value="B">DE BAJA</option>
              </select>
              <div onclick='search(1)' class="btn btn-info btn-sm m-b-5 submit"><i class="fa fa-search"></i> Buscar</div>
              <div onclick='vertodos()' class="btn btn-default btn-sm m-b-5"><img src="../assets/img/refresh.png" alt="Ver Todos"> Ver Todos</div>
            </form>
            <br>
            <ul id='paginator' class="pagination">
            </ul>
            <div class='table-responsive'>
              <table id='data-table' class='table table-bordered table-hover f-s-11'>
                <thead>
                  <tr>
                    <th colspan="3" class='p-0 text-center  bg-grey-200'>Acciones</th>
                    <th class='p-0 text-center  bg-grey-200'>Patrimonial</th>
                    <th class='p-0 text-center  bg-grey-200'>Tipo de Bien</th>
                    <th class='p-0 text-center  bg-grey-200'>Marca</th>
                    <th class='p-0 text-center  bg-grey-200'>Fec Adq</th>
                    <th class='p-0 text-center  bg-grey-200'>Est Fisico</th>
                    <th class='p-0 text-center  bg-grey-200'>Valor Adq</th>
                    <th class='p-0 text-center  bg-grey-200'>Valor Libro</th>
                    <th class='p-0 text-center  bg-grey-200'>Doc. Alta</th>
                    <th class='p-0 text-center  bg-grey-200'>Dependencia</th>
                    <th class='p-0 text-center  bg-grey-200'>Area</th>
                    <th class='p-0 text-center  bg-grey-200'>Asignado</th>
                    <th class='p-0 text-center  bg-grey-200'>Estado</th>
                    <th class='p-0 text-center  bg-grey-200'>Id Interno</th>
                    <th class='p-0 text-center  bg-grey-200'>Reg por</th>
                    <th class='p-0 text-center  bg-grey-200'>Fecha reg</th>
                    <th class='p-0 text-center  bg-grey-200'>Mod por</th>
                  </tr>
                </thead>
                <tbody id='tb_detalle_bienes'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id='mymodal' class="modal fade"  aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-white">Registro de Bienes</h4>
              </div>
              <div class="modal-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#datosbien" data-toggle="tab" aria-expanded="false"><img src="../assets/img/bienes.png" alt=""> Datos del Bien</a></li>
                  <li class=""><a href="#datosUsuarios" data-toggle="tab" aria-expanded="false"><img src="../assets/img/usuario.png" alt=""> Usuario Asignado</a></li>
                  <li class=""><a href="#detallesTecnico" data-toggle="tab" aria-expanded="false"><img src="../assets/img/tecnico.png" alt=""> Detalles Técnicos</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade active in" id="datosbien">
                    <form id='datosBien'>
                      <!-- fila 1 -->
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm" >Denominación</span>
                      <select id='txt_bienDescripcion' onchange="LlenarDatosBien('txt_bienDescripcion','txt_prefix','txt_grupo','txt_clase')" class="default-select2" >
<option value="">-SELECCIONAR-</option>
                        </select>
                        <!-- <input id='txt_bienDescripcion' onchange="LlenarDatosBien('txt_bienDescripcion','txt_prefix','txt_grupo','txt_clase')" type="text" class="form-control input-sm" > -->
                      </div>
                      <!-- fila2 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Grupo Genérico</span>
                            <input id='txt_grupo' type="text" class="form-control input-sm" disabled >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Clase</span>
                            <input id='txt_clase' type="text" class="form-control input-sm" disabled>
                          </div>
                        </div>
                      </div>
                      <!-- fila 3 -->
                      <div class="row">
                        <div class="col-md-3">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Codigo Patrimonial</span>
                            <input id='txt_prefix'  onchange="ValidaSoloNumeros()" type="text" class="form-control input-sm" disabled >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Nro Generado</span>
                            <input id='txt_correlativo' type="text" class="form-control txt-red input-sm" disabled >
                          </div>

                        </div>
                      </div>
                      <!-- fila 4 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Tipo de Cta.</span>
                            <select id='sl_tipoCuenta' onchange='ObtenerCuentas("sl_tipoCuenta","rtipocta","sl_CuentaContable")' class="form-control input-sm">
                              <option value="">-- Seleccione Tipo --</option>
                              <option value="E">DE USO ESTATAL</option>
                              <option value="P">DE USO PRIVADO</option>
                            </select>
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <label>
                              <input name="rtipocta" onclick='ObtenerCuentas("sl_tipoCuenta","rtipocta","sl_CuentaContable")' checked type="radio" value="A"/>
                              Activo Fijo
                            </label>
                            <label>
                              <input name="rtipocta" onclick='ObtenerCuentas("sl_tipoCuenta","rtipocta","sl_CuentaContable") 'type="radio" value="O"/>
                              Cuenta de Orden
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- fila 5 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Cuenta Contable</span>
                            <select   id="sl_CuentaContable"  class='form-control input-sm'>
                              <option value="">-- Seleccione Cuenta --</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- fila 6 -->
                      <div class="row">
                        <div class="col-md-5">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Forma Adq.</span>
                            <select id="sl_formAdq" class='form-control input-sm'>
                              <option value="">-- Seleccione Forma --</option>
                              <?php for ($i=0; $i < sizeof($rs_forma) ; $i++) {  ?>
                                <option value="<?php echo $rs_forma[$i]['id_tipo'] ?>"><?php echo utf8_encode($rs_forma[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>

                        </div>
                        <div class="col-md-3">
                          <div class="input-group m-b-5 ">

                            <input type="text" class="form-control input-sm datepicker-default" id="txt_fechaAdq" placeholder="Fecha Adq." >
                            <span class="input-group-addon input-sm">
                              <img src="../assets/img/date.png" alt="">
                            </span>
                          </div>

                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Cod. Interno</span>
                            <input id='txt_codInterno' type="text" class='form-control input-sm' style="text-transform:uppercase;">
                          </div>

                        </div>
                      </div>
                      <!-- fila7 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Resolución alta</span>
                            <input id='txt_resAlta' type="text" class='form-control input-sm' >
                          </div>

                        </div>
                      </div>
                      <!-- fila 8 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Valor Adq.</span>
                            <input  id='txt_valoradq' onkeypress="ValidaSoloDec()" type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Valor Libros</span>
                            <input id='txt_valorlib' onkeypress="ValidaSoloDec()"  type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 9 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Estado del Bien</span>
                            <select name="" id="sl_estadoBien" class='form-control input-sm'>
                              <option value="">-- Seleccione Estado --</option>
                              <?php for ($i=0; $i < sizeof($rs_estado) ; $i++) {  ?>
                                <option value="<?php echo $rs_estado[$i]['id_tipo'] ?>"><?php echo utf8_encode($rs_estado[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="checkbox">
                            <label>
                              <input id='cb_asegurado' type="checkbox" value="">
                              Asegurado
                            </label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade" id="datosUsuarios">
                    <form id='form_usuario'>
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm">Usuario</span>
                        <select onchange='llenarPersonalDestino(1);' id="sl_usuarioAsignado"  class='form-control input-sm'>
                          <option value="">--Seleccionar Asignado--</option>
                          <?php for ($i=0; $i < sizeof($rs_personal) ; $i++) {  ?>
                            <option value="<?php echo utf8_encode($rs_personal[$i]['id_personal']);?>"><?php echo utf8_decode($rs_personal[$i]['completo']); ?></option>
                          <?php  }?>
                        </select>
                      </div>
                      <div id='datosDestino'>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Local</span>
                          <select name="" id="sl_localAsignado" class='form-control input-sm' >
                            <option value="">-- Seleccione local --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Area</span>
                          <select name="" id="sl_areaAsignado" class='form-control input-sm' >
                            <option value="">-- Seleccione Area --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Oficina</span>
                          <select name="" id="sl_oficinaAsignado" class='form-control input-sm' >
                            <option value="">-- Seleccione Oficina --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Cargo</span>
                          <select name="" id="sl_cargoAsignado" class='form-control input-sm' >
                            <option value="">-- Seleccione Cargo --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">DNI</span>
                          <input id='inputDniRegistro' type="text" class="form-control input-sm" value="" >
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="detallesTecnico">
                    <form id='form_detaTecnico'>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Marca</span>
                            <select name="" id="sl_marcaBien" class='form-control input-sm'>
                              <option value="">-- Seleccione Marca --</option>
                              <?php for ($i=0; $i < sizeof($rs_marca) ; $i++) {  ?>
                                <option value="<?php echo utf8_encode($rs_marca[$i]['id_tipo']); ?>"><?php echo utf8_encode($rs_marca[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Modelo</span>
                            <input id='txt_modeloBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Tipo</span>
                            <input id='txt_tipoBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>

                      <!-- fila 12 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Dimensión</span>
                            <input id='txt_dimension' type="text" maxlength="15" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 13 -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Color</span>
                            <select name="" id="sl_colorBien" class='form-control input-sm'>
                              <option value="">-- Seleccione Color --</option>
                              <?php for ($i=0; $i < sizeof($rs_colores) ; $i++) {  ?>
                                <option value="<?php echo utf8_encode($rs_colores[$i]['id_tipo']); ?>"><?php echo utf8_encode($rs_colores[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Serie</span>
                            <input id='txt_serieBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Placa</span>
                            <input id='txt_placaBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 14 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Nro Motor</span>
                            <input id='txt_MotorBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Nro Chasis</span>
                            <input id='txt_chasisBien' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 15 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Observación</span>
                            <textarea name="" id="ta_observacionBien" rows="3" class='form-control'></textarea>
                          </div>
                        </div>
                      </div>


                    </form>
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                <a href="javascript:crearBien();" class="btn btn-sm btn-success">Registrar</a>
              </div>
            </div>
          </div>
        </div>

        <div id='modal_edit' class="modal fade"  aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-white">Editar Bien</h4>
              </div>
              <div class="modal-body">
                <ul class="nav nav-tabs">
                  <li id='tabUpdt1' class="active"><a href="#datosbienUpdt" data-toggle="tab" aria-expanded="false"><img src="../assets/img/bienes.png" alt=""> Datos del Bien</a></li>
                  <li id='tabUpdt2' class=""><a href="#datosUsuariosUpdt" data-toggle="tab" aria-expanded="false"><img src="../assets/img/usuario.png" alt=""> Usuario Asignado</a></li>
                  <li id='tabUpdt3' class=""><a href="#detallesTecnicoUpdt" data-toggle="tab" aria-expanded="false"><img src="../assets/img/tecnico.png" alt=""> Detalles Tecnicos</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade active in" id="datosbienUpdt">
                    <form >
                      <!-- fila 1 -->
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm" >Denominación</span>

                        <input id='txt_bienDescripcionUpdt' onchange="LlenarDatosBien('txt_bienDescripcionUpdt','txt_prefixUpdt','txt_grupoUpdt','txt_claseUpdt')" type="text" class="form-control input-sm" disabled >
                      </div>
                      <!-- fila2 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Grupo Genérico</span>
                            <input id='txt_grupoUpdt' type="text" class="form-control input-sm" disabled >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Clase</span>
                            <input id='txt_claseUpdt' type="text" class="form-control input-sm" disabled>
                          </div>
                        </div>
                      </div>
                      <!-- fila 3 -->
                      <div class="row">
                        <div class="col-md-3">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Codigo Patrimonial</span>
                            <input id='txt_prefixUpdt'  onchange="ValidaSoloNumeros()" type="text" class="form-control input-sm" disabled >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Nro Generado</span>
                            <input id='txt_correlativoUpdt' type="text" class="form-control txt-red input-sm" disabled >
                          </div>

                        </div>
                      </div>
                      <!-- fila 4 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm" >Tipo de Cta.</span>
                            <select id='sl_tipoCuentaUpdt' onchange='ObtenerCuentas("sl_tipoCuentaUpdt","rtipoctaUpdt","sl_CuentaContableUpdt")' class="form-control input-sm">
                              <option value="">-- Seleccione Tipo --</option>
                              <option value="E">DE USO ESTATAL</option>
                              <option value="P">DE USO PRIVADO</option>
                            </select>
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <label>
                              <input name="rtipoctaUpdt" onclick='ObtenerCuentas("sl_tipoCuentaUpdt","rtipoctaUpdt","sl_CuentaContableUpdt")' checked type="radio" value="A"/>
                              Activo Fijo
                            </label>
                            <label>
                              <input name="rtipoctaUpdt" onclick='ObtenerCuentas("sl_tipoCuentaUpdt","rtipoctaUpdt","sl_CuentaContableUpdt")' type="radio" value="O"/>
                              Cuenta de Orden
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- fila 5 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Cuenta Contable</span>
                            <select   id="sl_CuentaContableUpdt"  class='form-control input-sm'>
                              <option value="">-- Seleccione Cuenta --</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- fila 6 -->
                      <div class="row">
                        <div class="col-md-5">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Forma Adq.</span>
                            <select id="sl_formAdqUpdt" class='form-control input-sm'>
                              <option value="">-- Seleccione Forma --</option>
                              <?php for ($i=0; $i < sizeof($rs_forma) ; $i++) {  ?>
                                <option value="<?php echo $rs_forma[$i]['id_tipo'] ?>"><?php echo utf8_encode($rs_forma[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>

                        </div>
                        <div class="col-md-3">
                          <div class="input-group m-b-5 ">

                            <input type="text" class="form-control input-sm datepicker-default" id="txt_fechaAdqUpdt" placeholder="Fecha Adq." >
                            <span class="input-group-addon input-sm">
                              <img src="../assets/img/date.png" alt="">
                            </span>
                          </div>

                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Cod. Interno</span>
                            <input id='txt_codInternoUpdt' type="text" class='form-control input-sm' style="text-transform:uppercase;">
                          </div>

                        </div>
                      </div>
                      <!-- fila7 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Resolución alta</span>
                            <input id='txt_resAltaUpdt' type="text" class='form-control input-sm' >
                          </div>

                        </div>
                      </div>
                      <!-- fila 8 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Valor Adq.</span>
                            <input  id='txt_valoradqUpdt' onkeypress="ValidaSoloDec()" type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Valor Libros</span>
                            <input id='txt_valorlibUpdt' onkeypress="ValidaSoloDec()"  type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 9 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Estado del Bien</span>
                            <select name="" id="sl_estadoBienUpdt" class='form-control input-sm'>
                              <option value="">-- Seleccione Estado --</option>
                              <?php for ($i=0; $i < sizeof($rs_estado) ; $i++) {  ?>
                                <option value="<?php echo $rs_estado[$i]['id_tipo'] ?>"><?php echo utf8_encode($rs_estado[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="checkbox">
                            <label>
                              <input id='cb_aseguradoUpdt' type="checkbox" value="">
                              Asegurado
                            </label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="datosUsuariosUpdt">
                    <form id='form_usuario'>
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm">Usuario</span>
                        <select onchange='llenarPersonalDestino(2);' id="sl_usuarioAsignadoUpdt"  class='form-control input-sm' disabled>
                          <option value="*">--Seleccionar Asignado--</option>
                          <?php for ($i=0; $i < sizeof($rs_personal_edit) ; $i++) {  ?>
                            <option value="<?php echo utf8_encode($rs_personal_edit[$i]['id_personal']);?>"><?php echo utf8_decode($rs_personal_edit[$i]['completo']); ?></option>
                          <?php  }?>
                        </select>
                      </div>
                      <div id='datosDestinoUpdt'>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Local</span>
                          <select name="" id="sl_localAsignadoUpdt" class='form-control input-sm'>
                            <option value="">-- Seleccione local --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Area</span>
                          <select name="" id="sl_areaAsignadoUpdt" class='form-control input-sm'>
                            <option value="">-- Seleccione Area --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Oficina</span>
                          <select name="" id="sl_oficinaAsignadoUpdt" class='form-control input-sm'>
                            <option value="">-- Seleccione Oficina --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Cargo</span>
                          <select name="" id="sl_cargoAsignadoUpdt" class='form-control input-sm' disabled>
                            <option value="">-- Seleccione Cargo --</option>
                          </select>
                        </div>
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">DNI</span>
                          <input id='inputDniRegistro' type="text" class="form-control input-sm" value="" disabled>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade" id="detallesTecnicoUpdt">
                    <form id='form_detaTecnico'>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Marca</span>
                            <select name="" id="sl_marcaBienUpdt" class='form-control input-sm'>
                              <option value="">-- Seleccione Marca --</option>
                              <?php for ($i=0; $i < sizeof($rs_marca) ; $i++) {  ?>
                                <option value="<?php echo utf8_encode($rs_marca[$i]['id_tipo']); ?>"><?php echo utf8_encode($rs_marca[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Modelo</span>
                            <input id='txt_modeloBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Tipo</span>
                            <input id='txt_tipoBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>

                      <!-- fila 12 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Dimensión</span>
                            <input id='txt_dimensionUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 13 -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Color</span>
                            <select name="" id="sl_colorBienUpdt" class='form-control input-sm'>
                              <option value="">-- Seleccione Color --</option>
                              <?php for ($i=0; $i < sizeof($rs_colores) ; $i++) {  ?>
                                <option value="<?php echo utf8_encode($rs_colores[$i]['id_tipo']); ?>"><?php echo utf8_encode($rs_colores[$i]['descripcion']); ?></option>
                              <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Serie</span>
                            <input id='txt_serieBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Placa</span>
                            <input id='txt_placaBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 14 -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Nro Motor</span>
                            <input id='txt_MotorBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Nro Chasis</span>
                            <input id='txt_chasisBienUpdt' type="text" class='form-control input-sm' >
                          </div>
                        </div>
                      </div>
                      <!-- fila 15 -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group m-b-5 ">
                            <span class="input-group-addon input-sm">Observación</span>
                            <textarea name="" id="ta_observacionBienUpdt" rows="3" class='form-control'></textarea>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                <button  onClick="UpdateBien()" type="button"class="btn btn-sm btn-warning" >Actualizar</button>
              </div>
            </div>
          </div>
        </div>

        <div id='alert' class="modal fade" aria-hidden="true" style="display: none;">
          <div class="dialog-normal modal-dialog">
            <div class="modal-content ">
              <div class="modal-header header-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-white">Eliminar bien</h4>
              </div>
              <div class="modal-body">
                <form id='alertform'>
                  <div class="alert alert-danger m-b-0">
                    <p><i class="fa fa-info-circle"></i> Por favor, digite la causa para eliminar este bien.</p>
                  </div>
                  <br>
                  <textarea id="ta_causal" cols="2" rows="2" maxlength="100" style='resize:none;' class="form-control"></textarea>
                </form>

              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                <a href="javascript:eliminarBien(fila);" class="btn btn-sm btn-danger">Elminar</a>
              </div>

            </div>
          </div>
        </div>
        <div id='alert2' class="modal fade" aria-hidden="true" style="display: none;">
          <div class="dialog-normal modal-dialog">
            <div class="modal-content ">
              <div class="modal-header header-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-white">Dar de Baja a bien</h4>
              </div>
              <div class="modal-body">
                <form id='alertform2' class='form-horizontal'>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Resolución de Baja</label>
                    <div class="col-md-9">
                      <input id='txt_resBaja' type="text" class="form-control" placeholder="Ej:RES. 137-2016-GAF-SISOL/MML">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Fecha Resol:</label>
                    <div class="col-md-9">
                      <input id='txt_fechaBaja' type="text" class="form-control datepicker-default" placeholder="Haz click para seleccionar la fecha">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Causal Baja</label>
                    <div class="col-md-9">
                      <select id='sl_causalBaja' name="" id="" class='form-control'>
                        <option value="">--Seleccione Causal--</option>
                        <option value="5">DESTRUCCION O SINIESTRO</option>
                        <option value="1">EXCEDENCIA</option>
                        <option value="3">MANTENIMIENTO O REPERACION ONEROSA</option>
                        <option value="2">OBSOLESCENCIA TECNICA</option>
                        <option value="4">PERDIDA ROBO O SUSTRACCION</option>
                        <option value="8">RAEE</option>
                        <option value="6">REEMBOLSO O REPOSICION</option>
                        <option value="7">SITUACION DE CHATARRA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Doc. SBN N:</label>
                    <div class="col-md-9">
                      <input id='txt_docBaja' type="text" class="form-control" placeholder='Ej:O/C 392-2005'>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
                <a href="javascript:BajaBien(fila);" class="btn btn-sm btn-danger">Dar de Baja</a>
              </div>
            </div>
          </div>
        </div>

        <!-- TERMINA AKI -->
      </div>
      <div class="modal fade" id="md_codigoBarra" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="dialog-normal modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-info hidden-print">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-white">Codigo de Barras</h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <div class="logomuni">
                  <img src="../assets/img/logo.png" style="width:32px;height:32px;vertical-align:middle;" alt="">
                  <div style="display:inline;">
                    SISTEMA METROPOLITANO DE LA SOLIDARIDAD
                  </div>
                </div>
                <h6 id='bc_tipoBien' class='p-0 m-0'></h6>
                <svg id="bc_code128" class='p-0 m-0'></svg>
                <!-- <h5 id='bc_valor' class='pager-0'></h5> -->
              </div>
            </div>
            <div class="modal-footer hidden-print">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" onclick='window.print()' class="btn btn-primary">Imprimir</button>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- end #content -->
    <!-- begin theme-panel -->
    <!-- end theme-panel -->
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade hidden-print" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
  <script src="../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
  <script src="../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
  <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="../assets/plugins/barcode/barcode.js"></script>
  <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
  <!-- ================== END BASE JS ================== -->
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <script src="../class/bienes/bienes.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/menu/menu.js"></script>
  <script src="../class/login/killerSession.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  <script>
  //globals-----------------------------------------------------
  var selectedIdUser='';
  construirMenu();
  //------------------------------------------------------------
  $(document).ready(function() {
    var fila;
    var datos;
    var id_tip;
    App.init();
    search(1);
    iniciarSelect();
    $(".datepicker-default").datepicker({
      todayHighlight: !0,
      autoclose: true,
      format: 'dd/mm/yyyy'
    })
  });
  var tipoBien =[
    <?php for($i=0;$i<sizeof($rs_tipobien_2);$i++)
    {
      ?>
      '<?php echo $rs_tipobien_2[$i]["prefijo"] .' - ' .$rs_tipobien_2[$i]["descripcion"] ?>',
      <?php
    }
    ?>
  ];
  $( "#txt_bienDescripcion").autocomplete({
    source: tipoBien
  });
var select= document.getElementById('txt_bienDescripcion');
for (var i = 0; i < tipoBien.length; i++) {
  var option = document.createElement("option");
  option.text=tipoBien[i];
select.add(option);
}

  $( "#txt_bienDescripcionUpdt").autocomplete({
    source: tipoBien
  });
  </script>
</body>
</html>
