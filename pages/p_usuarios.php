<?php
require '../class/parametricas/entidad_parametrica_cls.php';
// require '../class/config/preconfig_cls.php';
require '../class/config/session_val.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Mantenimiento Usuarios</title>
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

            <strong class='text-white sombrear'>Mantenimiento Usuarios</strong>
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
              <li><a href="javascript:getPasswordModal();">Cambiar Contraseña</a></li>
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
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="panel panel-sm panel-success">
      <div class="panel-heading">
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
        <h4 class="panel-title">Usuarios</h4>
      </div>

      <div class="panel-body">

        <div class='bg-grey-200  m-b-10 '>
          <button class="btn btn-default btn-xs m-b-10 m-t-10  m-l-10" onclick='javascript:nuevoRegistro();'><img src="../assets/img/new_reg.png" alt="Nuevo Registro"> Nuevo Registro</button>

        </div>


        <form class='form-inline' method='POST' id='panelForm'>
          <div class="form-group  form-group-md  m-r-10">
            <input type="text" class="form-control" id="inputParametro"  placeholder="Buscar Usuarios" />
          </div>
          <div onclick='search(1)' class="btn btn-info btn-sm m-b-10 m-t-10 submit"><i class="fa fa-search"></i> Buscar</div>
          <div onclick='vertodos()' class="btn btn-default btn-sm m-b-10 m-t-10 "><img src="../assets/img/refresh.png" alt="Ver Todos"> Ver Todos</div>
        </form>
        <ul id='paginator' class="pagination">
        </ul>
        <div class='table-responsive'>
          <table id='data-table' class='table table-bordered table-hover f-s-11'>
            <thead>
              <tr>
                <th class='p-0 text-center  bg-grey-200'></th>
                <th class='p-0 text-center  bg-grey-200'>ID</th>
                <th class='p-0 text-center  bg-grey-200'>LOGIN</th>
                <th class='p-0 text-center  bg-grey-200'>NOMBRE</th>
                <th class='p-0 text-center  bg-grey-200'>NIVEL</th>
                <th class='p-0 text-center  bg-grey-200'>ID FUNCIONARIO</th>
                <th class='p-0 text-center  bg-grey-200'>ESTADO</th>
              </tr>
            </thead>
            <tbody id='tb_detalle_usuarios'>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>

      <div id='mymodal' class="modal fade"  aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title text-white">Nuevo Usuario</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
              <a href="javascript:crearUsuario();" class="btn btn-sm btn-success">Crear</a>
            </div>
          </div>
        </div>
      </div>

      <div id='modal_editar' class="modal fade"  aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-warning">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title text-white">Editar Usuario</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
              <a href="javascript:UpdateUsuario();" class="btn btn-sm btn-warning" disabled>Actualizar</a>
            </div>
          </div>
        </div>
      </div>

      <div id='modal_eliminar' class="modal fade" aria-hidden="true" style="display: none;">
        <div class="dialog-normal modal-dialog">
          <div class="modal-content ">
            <div class="modal-header header-danger">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title text-white">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
              <form id='alertform'>
                <div class="alert alert-danger m-b-0">
                  <p><i class="fa fa-info-circle"></i> Esta Seguro?.</p>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
              <a href="javascript:eliminarBien(fila);" class="btn btn-sm btn-danger">Elminar</a>
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
  <!--[if lt IE 9]>
  <script src="../assets/crossbrowserjs/html5shiv.js"></script>
  <script src="../assets/crossbrowserjs/respond.min.js"></script>
  <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->
  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
  <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>

  <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <script src="../class/usuarios/usuarios.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/login/killerSession.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
  //globals-----------------------------------------------------

  //------------------------------------------------------------
  $(document).ready(function() {
    var fila;
    var datos;
    var id_tip;
    App.init();
    search(1);

  });
  </script>
</body>
</html>
