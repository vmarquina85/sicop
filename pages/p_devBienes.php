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
  <link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.css" rel="stylesheet" />
  <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="../assets/css/animate.min.css" rel="stylesheet" />
  <link href="../assets/css/style.min.css" rel="stylesheet" />
  <link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
  <link href="../assets/css/theme/default.css" rel="stylesheet" id="theme" />

  <link href="../assets/css/datatables.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
  <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->

</head>
<body>
  <div id="page-loader">
    <div class="material-loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
      </svg>
      <div class="message">Cargando...</div>
    </div>
  </div>
  <div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
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
    <div id="top-menu" class="top-menu">
      <!-- begin top-menu nav -->
      <ul class="nav">
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <img src="../assets/img/mixer-icon.png" alt="">
            <span>Mantenimiento</span>
          </a>
          <ul class="sub-menu">
            <li><a href="../pages/p_bienes.php">Bienes</a></li>
            <!-- <li><a href="../pages/p_personal.php">Personal</a></li> -->
            <li><a href="../pages/p_usuarios.php">Usuarios</a></li>
            <!-- <li><a href="../pages/p_levantamientoInventario.php">Empresas</a></li> -->
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <img src="../assets/img/lightning-icon.png" alt="">
            <span>Procesos</span>
          </a>
          <ul class="sub-menu">
            <li><a href="../pages/p_asignacion.php">Asignación</a></li>
            <li><a href="../pages/p_traslados.php">Traslados</a></li>
            <!-- <li><a href="../pages/p_generarActa.php">Acta de Devolución</a></li>
            <li><a href="../pages/p_levantamientoInventario.php">Levantamiento de Inventario</a></li> -->
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <img src="../assets/img/sign-check-icon.png" alt="">
            <span>Tareas</span>
          </a>
          <ul class="sub-menu">
            <li><a href="../pages/p_bienesxusuario.php">Recepción de Bienes</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <img src="../assets/img/file-powerpoint-icon.png" alt="">
            <span>Reportes</span>
          </a>
          <ul class="sub-menu">
            <!-- <li><a href="email_inbox.html">Bienes Activos</a></li>
            <li><a href="email_inbox.html">Bienes Dados de Baja</a></li>
            <li><a href="email_inbox.html">Areas por Local</a></li>
            <li><a href="email_inbox.html">Estadistica General</a></li> -->
            <li><a href="../pages/p_historial.php">Historial</a></li>
          </ul>
        </li>
        <li class="menu-control menu-control-left">
          <a href="#" data-click="prev-menu"><i class="material-icons">arrow_back</i></a>
        </li>
        <li class="menu-control menu-control-right">
          <a href="#" data-click="next-menu"><i class="material-icons">arrow_forward</i></a>
        </li>
      </ul>
    </div>
    <div id="content" class="content">
          <div class="row">
        <div class="col-md-12">
          <div id='panelAsignados' class="panel panel-success">
            <div class="panel-heading">
              <div class="panel-heading-btn">

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="Ampliar"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="Minimizar/Maximinzar"><i class="fa fa-minus"></i></a>
              </div>
              <h4 class="panel-title"> Bienes a Devolver </h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table id='tab_asignados'  class='dt dataTable table table-bordered f-s-11'>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="modal" id="modal_papeleta_detalle" aria-hidden="false" style="display: none;">
      <div class="dialog-normal modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="false">×</button>
            <h4 class="modal-title">Bienes</h4>
          </div>
          <div class="modal-body">
            <div id='detallePapeleta'>

            </div>
          </div>
          <div class="modal-footer">
            <a id='btn_mod_seleccion' href="javascript:;" onclick='seleccionar(fila)' class="btn btn-sm btn-success" data-dismiss="modal"></a>
            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cerrar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
  <script src="../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
  <script src="../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
  <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
  <script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.js"></script>
  <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/menu/menu.js"></script>
  <!-- ================== END BASE JS ================== -->
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <script src="../class/bienes/bienesxusuario.js"></script>
  <script>
  var selectedIdUser='';
  construirMenu();
  $(document).ready(function () {
    var fila;
    var array=[];
    App.init();


    bienesAsignados();

  })


  </script>
</body>
</html>
