<?php
require '../class/parametricas/entidad_parametrica_cls.php';
require '../class/config/session_val.php';
require '../class/config/preconfig_cls.php'
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
    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
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
    <div id="header" class="header navbar bg-navbar navbar-inverse  navbar-fixed-top">
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
            <strong class='text-white sombrear'>Historial</strong>
            <!--   <img src="../assets/img/logo.png" alt=""> -->
          </a>
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown navbar-user ">
            <a href="javascript:;" class="dropdown-toggle text-white sombrear" data-toggle="dropdown">
              <img src="../assets/img/man.png" alt="">
              <span class="hidden-xs">Hola, <?php echo ucwords(strtolower($_SESSION["usr_name"])) ?></span>

            </a>
            <ul class="dropdown-menu animated fadeInLeft">
              <!-- <li class="arrow"></li> -->
              <!-- <li><a href="javascript:;">Cambiar Contraseña</a></li> -->
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
      <ul class="nav">
        <!-- <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <img src="../assets/img/mixer-icon.png" alt="">
            <span>Mantenimiento</span>
          </a>
          <ul class="sub-menu">
            <li><a href="../pages/p_bienes.php">Bienes</a></li>
            <li><a href="../pages/p_personal.php">Personal</a></li>
            <li><a href="../pages/p_generarActa.php">Usuarios</a></li>
            <li><a href="../pages/p_levantamientoInventario.php">Empresas</a></li>
          </ul>
        </li> -->
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

    <div class="panel panel-success">
      <div class="panel-heading">
        <h4 class="panel-title">Seguimiento de Bienes</h4>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tipo de Bien:</label>
              <select id="sl_tipobien" class='default-select2 form-control input-sm m-r-10 m-b-5' onChange='setCodigo();'>
                <option value="*">--Seleccionar Tipo--</option>
                <?php for ($i = 0; $i < sizeof($rs_tipobien); $i++) { ?>
                  <option value="<?php echo $rs_tipobien[$i]['prefijo'] . '@' . $rs_tipobien[$i]['id_tipo']; ?>"><?php echo utf8_encode($rs_tipobien[$i]['descripcion']); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <label class="control-label">Codigo Patrimonial:</label>
              <div class='input-group input-group-sm  m-b-5'>
                <input type="text" id="txt_cod_1" class="form-control "  disabled >
                <span class="input-group-addon">-</span>
                <input type="text" id="txt_cod_2" class="form-control width-50" maxlength='4' onkeypress="ValidaSoloNumeros();" >
              </div>
            </div>
            <div class="col-md-1">
              <br>
              <a href='javascript:consultar();' id='btnConsultar' title='Consultar' class='btn btn-sm btn-success'>Consultar</a>
            </div>
            <div id='datosAsignado' class="col-md-5">

            </div>
          </div>
          <br>
<div class="table-responsive">
  <table id="detalleConsulta" class='table table-bordered table-condensed table-hover' >
    <thead>
      <th class='p-0 text-center  bg-grey-200'>Tipo</th>
      <th class='p-0 text-center  bg-grey-200'>Numero</th>
      <th class='p-0 text-center  bg-grey-200'>Registro</th>
      <th class='p-0 text-center  bg-grey-200'>Situación</th>
      <th class='p-0 text-center  bg-grey-200'>Origen</th>
      <th class='p-0 text-center  bg-grey-200'>Destino</th>
      <th class='p-0 text-center  bg-grey-200'>Motivo</th>
      <th class='p-0 text-center  bg-grey-200'>Entrega</th>
      <th class='p-0 text-center  bg-grey-200'>Recibe</th>
    </thead>

  </table>
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
  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
  <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
    <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <script src="../class/login/killerSession.js"></script>
  <script src="../class/historial/p_historial.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
  <script>
  $(document).ready(function() {
    App.init();
    iniciarSelect();
  });
</script>
</body>
</html>
