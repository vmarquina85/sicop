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
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Parámetros</h3>
            </div>
            <div class="panel-body bg-grey-200">
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Local:</span>
                <select id="selectLugarActual"  onchange="fn_obtenerAreas();fn_obtenerOficina()" class=' default-select2 form-control input-sm'>
                    <option value="*">TODOS</option>
                  <?php for ($i=0; $i <sizeof($rs_operativo) ; $i++) {
                    echo '<option value="'.$rs_operativo[$i]['id_dep'].'">'.$rs_operativo[$i]['descripcion'].'</option>';
                  }
                   ?>
                </select>
              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Area:</span>
                <select id="selectArea"  onchange="fn_obtenerOficina()" class='default-select2 form-control input-sm'>
                    <option value="*">TODOS</option>
                </select>
              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Oficina:</span>
                <select id="selectOficina"  class=' form-control input-sm default-select2'>
                    <option value="*">TODOS</option>
                </select>
              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Tipo Bien:</span>
                <select id="sl_tipobien"  class='default-select2 form-control input-sm m-r-10 m-b-15'>
                  <option value="*">TODOS</option>
                  <?php for ($i=0; $i < sizeof($rs_tipobien) ; $i++) {  ?>
                    <option value="<?php echo $rs_tipobien[$i]['prefijo'].'@'.$rs_tipobien[$i]['id_tipo']; ?>"><?php echo utf8_encode($rs_tipobien[$i]['descripcion']); ?></option>
                  <?php  }?>
                </select>
              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Cuenta:</span>
                <select id="sl_tipobien"  class='default-select2 form-control input-sm m-r-10 m-b-15'>
                  <option value="*">TODOS</option>
                  <?php for ($i=0; $i < sizeof($rs_cuentac_noFilter) ; $i++) {  ?>
                  <option value="<?php echo $rs_cuentac_noFilter[$i]['cuenta']  ?>"><?php echo utf8_encode($rs_cuentac_noFilter[$i]['denomina']); ?></option>
                  <?php  }?>
                </select>

              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Estado:</span>
                <select id="sl_estadoBien"  class='default-select2 form-control input-sm m-r-10 m-b-15'>
                  <option value="*">TODOS</option>
                  <?php for ($i=0; $i < sizeof($rs_estado) ; $i++) {  ?>
                  <option value="<?php echo $rs_estado[$i]['id_tipo']  ?>"><?php echo utf8_encode($rs_estado[$i]['descripcion']); ?></option>
                  <?php  }?>
                </select>

              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Forma:</span>
                <select  class='default-select2 form-control input-sm m-r-10 m-b-15'>
                  <option value="*">TODOS</option>
                  <?php for ($i=0; $i < sizeof($rs_forma) ; $i++) {  ?>
                    <option value="<?php echo $rs_forma[$i]['id_tipo'] ?>"><?php echo utf8_encode($rs_forma[$i]['descripcion']); ?></option>
                  <?php  }?>
                </select>
              </div>
              <div class="input-group m-b-10 ">
                <span class="input-group-addon input-sm" >Fecha de Adquisición:</span>
                <input id='txt_bienDescripcion' type="text" class="form-control datepicker-default input-sm" >
              </div>
            </div>
            <div class="panel-footer text-center">

              <button type="button" class='btn btn-default' name="button">Generar Reporte</button>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vista Previa de Reporte</h3>

            </div>
            <div class="panel-body">
<iframe src="" frameborder="0">

</iframe>
                <button class="btn btn-default btn-sm m-b-10 m-t-10 m-r-10 pull-right" onclick="javascript:;"><i class="fa fa-print fa-2x"></i></button>

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
    <script src="../class/personal/p_personal.js"></script>
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
    iniciarSelect();
    $(".datepicker-default").datepicker({
      todayHighlight: !0,
      autoclose: true,
      format: 'dd/mm/yyyy'
    })
  });

  </script>
</body>
</html>
