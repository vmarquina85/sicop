<?php
require '../class/config/session_val.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Mantenimiento Personal</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />

  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
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
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->
  <style>
  .ui-front {
    z-index: 1150;
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
          <strong class='text-white sombrear'>Mantenimiento Personal</strong>
        </a>
      </div>
      <!-- end mobile sidebar expand / collapse button -->
      <!-- begin header navigation right -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown navbar-user">
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
          <li><a href="../pages/p_generarActa.php">Acta de Devolución</a></li>
          <li><a href="../pages/p_levantamientoInventario.php">Levantamiento de Inventario</a></li>
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
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
        <h4 class="panel-title">Lista de Personal Registrado</h4>
      </div>

      <div class="panel-body">
        <div class='bg-grey-200  m-b-10 '>
          <button class="btn btn-default btn-xs m-b-10 m-t-10  m-l-10" onclick='javascript:nuevoRegistro();'><img src="../assets/img/new_reg.png" alt="Nuevo Registro"> Nuevo Registro</button>
          <button class="btn btn-default btn-xs m-b-10 m-t-10 "><img src="../assets/img/excel.png" alt="Exportar excel"> Exportar a Excel</button>
        </div>
        <div class="table-responsive">
          <table id='tb_personal' class=" dt table table-codensed table-bordered">
            <thead>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='p-0 text-center  bg-grey-200'>Paterno</th>
              <th class='p-0 text-center  bg-grey-200'>Materno</th>
              <th class='p-0 text-center  bg-grey-200'>Nombres</th>
              <th class='p-0 text-center  bg-grey-200'>Dni</th>
              <th class='p-0 text-center  bg-grey-200'>RUC</th>
              <th class='p-0 text-center  bg-grey-200'>Dirección</th>
              <th class='p-0 text-center  bg-grey-200'>Dependencia</th>
              <th class='p-0 text-center  bg-grey-200'>Area</th>
              <th class='p-0 text-center  bg-grey-200'>Cargo</th>
              <th class='p-0 text-center  bg-grey-200'>Estado</th>
              <th class='p-0 text-center  bg-grey-200'>Id</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

 </div>
</div>

<div id='mymodal' class="modal fade" id="modal-dialog" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
  <div class="modal-content ">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title">Nuevo registro de personal</h4>
    </div>

    <div class="modal-body scrolled">
     <form id='formulario'>
      <h5>Datos del Bien</h5>


      <!-- fila 1 -->
      <div class="input-group m-b-5 ">
       <span class="input-group-addon input-sm" >Denominación</span>
       <input id='txt_bienDescripcion' type="text" class="form-control input-sm" >
     </div>
     <!-- fila2 -->
     <div class="row">
       <div class="col-md-6">
        <div class="input-group m-b-5 ">
         <span class="input-group-addon input-sm" >Grupo Genérico</span>
         <input type="text" class="form-control input-sm" >
       </div>
     </div>
     <div class="col-md-6">
       <div class="input-group m-b-5 ">
         <span class="input-group-addon input-sm" >Clase</span>
         <input type="text" class="form-control input-sm" >
       </div>
     </div>
   </div>
   <!-- fila 3 -->
   <div class="row">
     <div class="col-md-3">
       <div class="input-group m-b-5 ">
         <span class="input-group-addon input-sm" >Codigo Patrimonial</span>
         <input type="text" class="form-control input-sm" >
       </div>
     </div>
     <div class="col-md-2">
       <div class="input-group m-b-5 ">
         <span class="input-group-addon input-sm" >Nro Generado</span>
         <input type="text" class="form-control input-sm" >
       </div>

     </div>
   </div>
   <!-- fila 4 -->
   <div class="row">
     <div class="col-md-6">
       <div class="input-group m-b-5 ">
         <span class="input-group-addon input-sm" >Tipo de Cta.</span>
         <select class="form-control input-sm">
           <option value="">-- Seleccione Tipo --</option>
           <option value=""></option>
         </select>
       </div>

     </div>
     <div class="col-md-6">
      <div class="radio">
        <label>
         <input type="radio"  id='radio1' value="">
         Activo Fijo
       </label>
       <label>
         <input type="radio" id='radio1' value="">
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
     <select  class='form-control input-sm'>
       <option value="">-- Seleccione Cuenta --</option>
       <option value=""></option>
       <option value=""></option>
     </select>
   </div>
 </div>
</div>
<!-- fila 6 -->
<div class="row">
 <div class="col-md-5">
  <div class="input-group m-b-5 ">
   <span class="input-group-addon input-sm">Forma Adq.</span>
   <select name="" id="" class='form-control input-sm'>
     <option value="">-- Seleccione Forma --</option>
   </select>
 </div>

</div>
<div class="col-md-3">
<div class="input-group m-b-5 ">

 <input type="text" class="form-control input-sm datepicker-default" id="" placeholder="Fecha Adq.">
 <span class="input-group-addon input-sm">
   <img src="../assets/img/date.png" alt="">
 </span>
</div>

</div>
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Cod. Interno</span>
<input type="text" class='form-control input-sm' >
</div>

</div>
</div>
<!-- fila7 -->
<div class="row">
<div class="col-md-12">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Resolución alta</span>
<input type="text" class='form-control input-sm' >
</div>

</div>
</div>
<!-- fila 8 -->
<div class="row">
<div class="col-md-6">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Valor Adq.</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
<div class="col-md-6">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Valor Libros</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
</div>
<!-- fila 9 -->
<div class="row">
<div class="col-md-6">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Estado del Bien</span>
<select name="" id="" class='form-control input-sm'>
 <option value="">-- Seleccione Forma --</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="checkbox">
<label>
<input type="checkbox" value="">
Asegurado
</label>
</div>
</div>
</div>

<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Usuario</span>
<select name="" id="" class='form-control input-sm'>
<option value="">-- Seleccione Usuario --</option>
</select>
</div>
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Local</span>
<select name="" id="" class='form-control input-sm'>
<option value="">-- Seleccione Forma --</option>
</select>
</div>
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Area</span>
<select name="" id="" class='form-control input-sm'>
<option value="">-- Seleccione Area --</option>
</select>
</div>
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Oficina</span>
<select name="" id="" class='form-control input-sm'>
<option value="">-- Seleccione Oficina --</option>
</select>
</div>
<br>
<h5>Detalle Tecnico</h5>

<!-- fila 11 -->
<div class="row">
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Marca</span>
<select name="" id="" class='form-control input-sm'>
 <option value="">-- Seleccione Marca --</option>
</select>
</div>
</div>
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Modelo</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Tipo</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
</div>

<!-- fila 12 -->
<div class="row">
<div class="col-md-12">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Dimensión</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
</div>
<!-- fila 13 -->
<div class="row">
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Color</span>
<select name="" id="" class='form-control input-sm'>
 <option value="">-- Seleccione Color --</option>
</select>
</div>
</div>
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Serie</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
<div class="col-md-4">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Placa</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
</div>
<!-- fila 14 -->
<div class="row">
<div class="col-md-6">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Nro Motor</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
<div class="col-md-6">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Nro Chasis</span>
<input type="text" class='form-control input-sm' >
</div>
</div>
</div>
<!-- fila 15 -->
<div class="row">
<div class="col-md-12">
<div class="input-group m-b-5 ">
<span class="input-group-addon input-sm">Observación</span>
<textarea name="" id="" rows="3" class='form-control'></textarea>
</div>
</div>
</div>
</form>
</div>


<div class="modal-footer">
<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
<a href="javascript:;" class="btn btn-sm btn-success">Crear</a>
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

<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.js"></script>

   <!-- ================== END BASE JS ================== -->

   <!-- ================== BEGIN PAGE LEVEL JS ================== -->
   <script src="../assets/js/apps.min.js"></script>
   <script src="../class/ajax/ajax.js"></script>
   <script src="../class/personal/p_personal.js"></script>
   <script src="../class/login/killerSession.js"></script>
   <!-- ================== END PAGE LEVEL JS ================== -->

   <script>
   //globals-----------------------------------------------------

    //------------------------------------------------------------
    $(document).ready(function() {
     App.init();
personalSelect();
inicializarDatatables();
   });
    </script>

  </body>
  </html>
