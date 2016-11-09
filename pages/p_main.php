<?php 
require '../class/parametricas/entidad_parametrica_cls.php';
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
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->

</head>
<body class='main-bg'>
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
        <strong class='text-white sombrear'>Pagina Principal</strong>
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
         <li class="arrow"></li>
         <li><a href="javascript:;">Cambiar Contraseña</a></li>
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
        <i class="material-icons">receipt</i>
        <span>Procesos</span>
      </a>
      <ul class="sub-menu">
         <li><a href="../pages/p_asignacion.php">Asignar Bienes</a></li>
         <li><a href="../pages/p_traslados.php">Traslados</a></li>
       <li><a href="../pages/p_generarActa.php">Acta de Devolución</a></li>     
       <li><a href="../pages/p_levantamientoInventario.php">Levantamiento de Inventario</a></li>
     </ul>
   </li>
   <li class="has-sub">
    <a href="javascript:;">
      <b class="caret pull-right"></b>
      <i class="material-icons">pie_chart</i>
      <span>Reportes</span> 
    </a>
    <ul class="sub-menu">
      <li><a href="email_inbox.html">Bienes Activos</a></li>
      <li><a href="email_inbox.html">Bienes Dados de Baja</a></li>
      <li><a href="email_inbox.html">Bienes Activos por Usuario</a></li>
      <li><a href="email_inbox.html">Locales de la Entidad</a></li>
      <li><a href="email_inbox.html">Areas por Local</a></li>
      <li><a href="email_inbox.html">Estadistica General</a></li>
      <li><a href="email_inbox.html">Bienes Activos por Local</a></li>
      <li><a href="email_inbox.html">Historial</a></li>
    </ul>
  </li>
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
     <h4 class="panel-title">Acceso Directo</h4>
   </div>
   <div class="panel-body">
      <div class="row">
      <div class="col-md-3">
      <div class='panel'>
        <div class='panel-body' style='padding: 8px;'>
          <div class='row'>
            <div class='col-md-4 text-center'>
              <img src="../assets/img/new_notepad.png" alt="">
            </div>
            <div class='col-md-8'>
              <h5 class='panel-title m-t-5'>Asignar Bienes</h5>
              <p>Asigne bienes a un usuario <br> específico</p>
              <span>
                <a href='p_asignacion.php' class="btn btn-success btn-xs pull-right">Ingresar</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class='panel'>
        <div class='panel-body' style='padding: 8px;'>
          <div class='row'>
            <div class='col-md-4 text-center'>
              <img src="../assets/img/transfer.png" alt="">
            </div>
  
            <div class='col-md-8'>
              <h5 class='panel-title m-t-5'>Traslados</h5>
             <p>Realice 3 tipos: Externo, Interno y por Mantenimiento</p>
              <span>
                <a href='../pages/p_traslados.php' class="btn btn-success btn-xs pull-right">Ingresar</a>
              </span>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class='panel'>
        <div class='panel-body' style='padding: 8px;'>
          <div class='row'>
            <div class='col-md-4 text-center'>
              <img src="../assets/img/left-arrow.png" alt="">
            </div>
            <div class='col-md-8'>
              <h5 class='panel-title m-t-5'>Acta de Devolución</h5>
              <p>Genere este tipo de documento para casos de entrega de cargo</p>
              <span>
                <a href='' class="btn btn-success btn-xs pull-right">Ingresar</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class='panel'>
        <div class='panel-body' style='padding: 8px;'>
          <div class='row'>
            <div class='col-md-4 text-center'>
              <img src="../assets/img/checklist.png" alt="">
            </div>
            <div class='col-md-8'>
              <h5 class='panel-title m-t-5'>Levantamiendo de Inventario</h5>
              <p>Genere este tipo de documento para casos de entrega de cargo</p>
              <span>
                <a href='' class="btn btn-success btn-xs pull-right">Ingresar</a>
              </span>
            </div>
          </div>
        </div>
      </div>
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

          <!-- ================== END BASE JS ================== -->

          <!-- ================== BEGIN PAGE LEVEL JS ================== -->
          <script src="../assets/js/apps.min.js"></script>
          <script src="../class/ajax/ajax.js"></script>
          <script src="../class/login/killerSession.js"></script>


          <!-- ================== END PAGE LEVEL JS ================== -->

          <script>
         //globals-----------------------------------------------------

          //------------------------------------------------------------
          $(document).ready(function() {
           App.init();


           $(".datepicker-default").datepicker({
            todayHighlight: !0,
            format: 'dd/mm/yyyy'
          })

         });
          function limpiarFormulario(formulario){
            $(formulario)[0].reset();
          }

          function  nuewvoRegistro(){
            $('#mymodal').modal();
            limpiarFormulario('#formulario');

          }
          </script> 

        </body>
        </html>
