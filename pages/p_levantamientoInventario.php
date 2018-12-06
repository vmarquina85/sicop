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
  <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="../assets/css/animate.min.css" rel="stylesheet" />
  <link href="../assets/css/style.min.css" rel="stylesheet" />
  <link href="../assets/css/style-responsive.min.css" rel="stylesheet" />
  <link href="../assets/css/theme/default.css" rel="stylesheet" id="theme" />
  <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="../assets/plugins/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
  <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
  <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
  <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet">
  <!-- <link href="../assets/plugins/StickyTableHeaders/css/component.css" rel="stylesheet"> -->
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="../assets/plugins/pace/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->
  <style >
  .table-responsive {
    height: 250px;
    overflow-y: auto;
  }

  .default-select2 {
    width: 100% !important;
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
          <button type="button" class="navbar-toggle" data-click="top-menu-toggled">
            <i class="material-icons">menu</i>
          </button>
          <a href="p_main.php" class="navbar-brand" style='width: auto;'>
            <strong class='text-white sombrear'><img src="../assets/img/package.png" alt=""> SICOP</strong>
          </a>
        </div>
        <!-- begin mobile sidebar expand / collapse button -->
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown navbar-user">

            <a href="javascript:;" class="dropdown-toggle text-white sombrear" data-toggle="dropdown">

              <span class="hidden-xs">Hola, <?php echo ucwords(strtolower($_SESSION['sicop_usr_name'])) ?></span>

              <?php if ($_SESSION['sicop_sexo']=='1') {
                echo '<img src="../assets/img/man.png" alt="">';
              } else{
                echo '<img src="../assets/img/girl.png" alt="">';
              }
              ?>
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
      <ul  id='nav_menu' class="nav">
      </ul>
    </div>
    <div class="bg-grey-200 hidden-print">
      <div class="panel-body">
        <button type="button" class="btn btn-sm btn-default" onclick='javascript:nuevo();'><img src="../assets/img/new_slide.png" alt=""> Nuevo</button>
        <button type="button" class="btn btn-sm btn-default"><img src="../assets/img/diskette.png" alt=""> Grabar</button>
        <button type="button" class="btn btn-sm btn-default"><img src="../assets/img/cancel.png" alt=""> Cierre</button>
        <h5 class='pull-right m-0' style='font-weight: 700;' id="time"><i class="fa fa-clock"></i></h5>
      </div>
    </div>
    <div id="content" class="p-l-30 p-r-30 p-t-10 hidden-print">
      <div class="row">
        <div class="col-md-4">
          <div class="input-group m-b-10 ">
            <span class="input-group-addon input-sm" >Hoja Nro</span>
            <input type="text" id='input_nro_hoja' class='form-control input-sm' disabled>
          </div>
        </div>


        <div class="col-md-4">
          <div class="input-group m-b-10 ">
            <span class="input-group-addon input-sm" >Fecha-Inventario</span>
            <input type="text" id='input_fecha_inv' class='datepicker-default form-control input-sm' disabled>
          </div>
        </div>

        <div class="col-md-4">
          <div class="input-group m-b-10 ">
            <span class="input-group-addon input-sm" >Fecha-Cierre</span>
            <input type="text" id='input_fecha_cierre' class='datepicker-default form-control input-sm' disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="input-group m-b-10 ">
            <span class="input-group-addon input-sm" >Centro</span>
            <select  id="sl_local"  onchange="javascript:DisableElement(this);" class='default-select2 ' data-live-search="true" disabled  >
              <option value="*">--Seleccionar--</option>
              <?php for ($i = 0; $i < sizeof($rs_origen); $i++) { ?>
                <option value="<?php echo utf8_encode($rs_origen[$i]['id_dep']); ?>"><?php echo utf8_encode($rs_origen[$i]['descripcion']); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="input-group m-b-10 ">
            <span class="input-group-addon input-sm p-t-0 p-b-0" ><img src="../assets/img/vector/barcode.svg" style='width: 32px; height: 32px; padding=0px' alt=""></span>
            <input type="text" class='form-control input-sm' onkeyup='InvBien(this)' onkeypress="javascript:ValidarCodPatrimonial(this);" maxlength="13">
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id='tb_bienes_inv' class="table table-email hover">
          <thead>
            <tr>
              <th class='bg-grey-200 p-2 text-center'>Código</th>
              <th class='bg-grey-200 p-2 text-center'>Tipo de Bien</th>
              <th class='bg-grey-200 p-2 text-center'>Marca</th>
              <th class='bg-grey-200 p-2 text-center'>Modelo</th>
              <th class='bg-grey-200 p-2 text-center'>Area</th>
              <th colspan='4' class='bg-grey-200 p-2 text-center'>Asignado</th>
            </tr>
          </thead>
          <tbody id='tb_detalle_bienes'>

          </tbody>
        </table>
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
  <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
  <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
  <script src="../assets/plugins/switchery/switchery.min.js"></script>
  <script src="../assets/plugins/StickyTableHeaders/js/jquery.stickyheader.js"></script>
  <script src="../assets/plugins/barcode/barcode.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/Inventario/Inventario.js"></script>
  <script src="../class/bienes/bienes.js"></script>
  <script src="../class/menu/menu.js"></script>

  <!-- ================== END BASE JS ================== -->
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <!-- <script src="../class/desplazamiento/pasignacionIndividual.js"></script> -->

  <!--   <script src="../class/login/killerSession.js"></script>-->

  <!-- ================== END PAGE LEVEL JS ================== -->
  <script>
  //globals-----------------------------------------------------
  var selectedIdUser='';
  construirMenu();
  iniciarCentros();
  startTimeAndDate();
  //------------------------------------------------------------
  $(document).ready(function () {
    App.init();

    // startTimeAndDate();
    // renderSwitcher();

    $('.table-container').stickyTableHeader();

    $(".datepicker-default").datepicker({
      todayHighlight: !0,
      format: 'dd/mm/yyyy'
    })
  });
  function showProgressBar(){
    for (var i = 0; i < 101; i++) {
      $(".progress-bar").css('width', (i+'%'));
      document.getElementById('pb_listInv').innerHTML=(i+'%');
    }
    $('.progress').fadeOut();
  }
  // Build the chart
  //  Highcharts.chart('graph', {
  //      chart: {
  //          plotBackgroundColor: null,
  //          plotBorderWidth: null,
  //          plotShadow: false,
  //          type: 'pie'
  //      },
  //      title: {
  //          text: 'Grafica'
  //      },
  //      tooltip: {
  //          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  //      },
  //      plotOptions: {
  //          pie: {
  //              allowPointSelect: true,
  //              cursor: 'pointer',
  //              dataLabels: {
  //                  enabled: false
  //              },
  //              showInLegend: true
  //          }
  //      },
  //      series: [{
  //          name: 'Brands',
  //          colorByPoint: true,
  //          data: [{
  //              name: 'otros',
  //              y: 30
  //          },  {
  //              name: 'Inventariados',
  //              y: 60
  //          }]
  //      }]
  //  });
  // $('#graph').highcharts({
  //
  //   chart: {
  //
  //     renderTo: 'detalle_ingresos',
  //     type: 'column'
  //   },
  //
  //   colors:["#99DC79"],
  //   title: {
  //     text: 'GRÁFICO'
  //   },
  //   subtitle: {
  //     // text: 'Fecha : '+ f.getDate() + "/" + pad(f.getMonth()+1,2) + "/" + f.getFullYear()
  //     text: 'INGRESOS POR ESPECIALIDAD'
  //   },
  //   xAxis: {
  //     type: 'category',
  //     labels: {
  //
  //       enabled: true
  //     }
  //   },
  //   legend: {
  //     layout: 'vertical',
  //     align: 'right',
  //     verticalAlign: 'top',
  //     x: -70,
  //     y: 100,
  //     floating: true,
  //     borderWidth: 1,
  //     backgroundColor: '',
  //     shadow: true
  //   },
  //   yAxis: {
  //     min: 0,
  //     title: {
  //       text: 'Ingresos (Soles)'
  //     }
  //   },
  //   tooltip: {
  //     pointFormat: 'Ventas: S/. <b>{point.y:.2f} </b>'
  //   },
  //   credits: {
  //     enabled: false
  //   },
  //   exporting: {
  //     enabled: false
  //   },
  //   series: [{
  //     name: 'Ingresos',
  //     data: [ ]
  //   }]
  // });
</script>
</body>
</html>
