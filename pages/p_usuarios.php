<?php
require '../class/parametricas/entidad_parametrica_cls.php';
require '../class/config/preconfig_usuarios_cls.php';
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
  .pointer{
    cursor: pointer;
  }
  .table-responsive{
    min-height: auto;
    overflow-x: auto;
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
      <ul  id='nav_menu' class="nav">
      </ul>
    </div>

    <div id="content" class="content">
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
          <form action"#"  id='panelForm'>
            <div class="input-group m-b-5">
              <input id="inputParametro" placeholder="Buscar" type="text" class="form-control">
              <span  onclick='search(1)' class="input-group-addon pointer"><i class="fa fa-search"></i></span>
            </div>
          </form>
          <div class='table-responsive'>
            <table id='data-table' class='table table-bordered table-hover f-s-11'>
              <thead>
                <tr>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'></th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>ID-USUARIO</th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>LOGIN</th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>NOMBRE</th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>NIVEL</th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>ID-PERSONAL</th>
                  <th class='p-5 f-s-12 text-center  bg-grey-200'>ESTADO</th>
                </tr>
              </thead>
              <tbody id='tb_detalle_usuarios'>
              </tbody>
            </table>
            <ul id='paginator' class="pagination">
            </ul>
            <br>
            <br>
            <br>
          </div>
        </div>
      </div>

      <!-- ACT00 :nivel y permisos -->
      <div id='modal_permisos' class="modal fade"  aria-hidden="true" style="display: none;">
        <div class="dialog-normal modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title text-white">Nivel y Permisos</h4>
            </div>
            <div class="modal-body">
              <div class="panel panel-sm panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><img src="../assets/img/perfil.png" alt="icon_perfil" class='pull-left'>&nbsp;&nbsp;Nivel de Usuario</h4>
                </div>
                <div class="panel-body">
                  <form id='frm_editar_permisos'>
                    <select id='edit_sl_perfil' class="form-control input-sm m-b-10" name="">
                      <option value="">--SELECCIONAR NIVEL--</option>
                      <?php
                      for ($i=0; $i < sizeof($rs_perfil) ; $i++) {
                        echo "<option value='".$rs_perfil[$i]['id_tipo']."'>".$rs_perfil[$i]['descripcion']."</option>";
                      }
                      ?>
                    </select>
                  </form>
                </div>
              </div>
              <div class="panel panel-sm panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><img src="../assets/img/permisos.png" alt="icon_permiso" class='pull-left'>&nbsp;&nbsp;Permisos</h4>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table  class='table table-bordered table-hover' id="tab_permisos">
                      <thead>
                        <tr>
                          <th class='text-center bg-grey-200 hide' >Codigo Menú</th>
                          <th class='text-center bg-grey-200'>Menu</th>
                          <th class='text-center bg-grey-200 hide' >Codigo Submenu</th>
                          <th class='text-center bg-grey-200'>Submenú</th>
                          <th class='text-center bg-grey-200'>Activado <input type='checkbox' id='cb_selectTodoPermisos' class='pointer pull-right'></th>
                        </tr>
                      </thead>
                      <tbody id='permisos_detalle'>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
              <a href="javascript:actualizarUsuarioPermisos();" class="btn btn-sm btn-success">Guardar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- nivel y permisos fin -->


    </div>
  </div>

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
<script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>

<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/js/apps.min.js"></script>
<script src="../class/ajax/ajax.js"></script>
<script src="../class/usuarios/usuarios.js"></script>
<script src="../class/config/config.js"></script>
<script src="../class/menu/menu.js"></script>
<script src="../class/login/killerSession.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
//globals-----------------------------------------------------

//------------------------------------------------------------
$(document).ready(function() {
  var fila;
  var datos;
  var id_tip;
  var selectedIdUser;
  construirMenu();
  App.init();
  search(1);

});
</script>
</body>
</html>
