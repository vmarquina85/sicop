<?php
include ("../class/desplazamiento/pasignacionIndividual_cls.php");
include ("../class/bienes/print_cls.php");
$class=new asignacion;
$class2=new imprimir;
$idpapeleta=$_REQUEST['id_papeleta'];
$rs_datos=$class->Get_asignaciones(1, 0,$idpapeleta,'*','*','*');
$rs_detalles=$class2->obtenerDet('A'.$idpapeleta);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Papeleta Asignacion</title>
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
  <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
  <link href="../assets/css/sysinv.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN BASE JS ================== -->
  <!-- <script src="../assets/plugins/pace/pace.min.js"></script> -->
  <!-- ================== END BASE JS ================== -->
  <style>
  .ui-front {
    z-index: 1150;
  }
  .print-setup{
    float:right;
    width: 30% ;

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
  <style type="text/css" media="print">
  @page {
    size: landscape;
    margin:0;
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
  <div class="p-10">
    <div class="well">
      <div class="row">
        <div class="col-md-12">
          <!-- <p><strong>SISTEMA METROPOLITANO DE LA SOLIDARIDAD-SISOL</strong></p> -->
          <button type="button" onclick='window.print()' class='btn btn-blue-grey hidden-print ' name="button">Imprimir</button>
        </div>
      </div>
      <div class="text-center">
        <h4>PAPELETA DE ASIGNACION INDIVIDUAL</h4>
        <h6>NRO° - <?php echo substr(@$rs_datos[0]['mov_orden'],1,4); ?></h6>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="input-group pull-left"  style='display: inline;'>
            <table class='table table-bordered  table-condensed'>
              <tr>
                <td class='bg-grey-200'>DEPENDENCIA</td>
                <td><?php echo @$rs_datos[0]['target']; ?></td>
              </tr>
            </table>
          </div>
          <div class="input-group pull-right"  style='display: inline;'>
            <table class="table table-bordered table-condensed text-center  width-200">
              <thead>
                <tr>
                  <th colspan='3' class='text-center'>FECHA</th>
                </tr>
              </thead>
              <tbody>
                <td class=' f-s-11  text-center m-r-10 m-l-10'><?php echo substr(@$rs_datos[0]['mov_fecha'],0,2); ?></td>
                <td class=' f-s-11  text-center m-r-10 m-l-10'><?php echo substr(@$rs_datos[0]['mov_fecha'],3,2); ?></td>
                <td class=' f-s-11  text-center m-r-10 m-l-10'><?php echo substr(@$rs_datos[0]['mov_fecha'],6,4); ?></td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <h5>DATOS DE USUARIO:</h5>
      <div class="input-group f-s-14">
        <span for="">AREA: </span>
        <span><?php echo @$rs_datos[0]['area_tar']; ?></span>
      </div>
      <div class="input-group f-s-14">
        <span for=""> OFICINA: </span>
        <span><?php echo @$rs_datos[0]['oficina_tar']; ?></span>
      </div>
      <div class="input-group f-s-14">
        <span for=""> NOMBRE: </span>
        <span><?php echo @$rs_datos[0]['recibio']; ?></span>
      </div>
      <div class="input-group f-s-14">
        <span for=""> CARGO:</span>
        <span> <?php echo @$rs_datos[0]['cargo_recibe']; ?></span>
      </div>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class='text-center' style='font-size: 10px ;'>RECIBI CONFORME</td>
            <td class='text-center' style='font-size: 10px ;'>CONTROL PATRIMONIAL</td>
            <td class='text-center' style='font-size: 10px ; '>V°B° ADMINISTRACIÓN</td>
          </tr>
        </table>
      </div>


      <div class="table-responsive">
        <table class='table table-bordered table-condensed'>
          <tr>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>IT</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>CODIGO PATRIMONIAL</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>NOMBRE</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>MARCA</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>MODELO</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>TIPO</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>COLOR</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>SERIE/DIMENSION</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>E</td>
            <td class='p-3 f-s-11 bg-grey-200  text-center m-r-10 m-l-10'>OBSERVACION</td>
          </tr>

          <?php  for ($i=0; $i <sizeof($rs_detalles) ; $i++) {
            echo   "  <tr><td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".($i+1)."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['id_patrimonial'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['descripcion'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['marca'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>" .utf8_encode($rs_detalles[$i]['modelo'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['tipo_bien'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['color'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['serie'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalles[$i]['det_est'])."</td>
              <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".$rs_detalles[$i]['observacion']."</td>
            </td></tr>";
          } ?>

        </table>


      </div>
      <p>E=ESTADO: ANOTAR: N=NUEVO, B=BUENO, R=REGULAR, M=MALO</p>
      <p style='font-size: 9px;'>NOTA: EL TRABAJADOR ES RESPONSABLE DEL BUEN USO DE LOS BIENES ASIGNADOS EN CASO DE PERDIDA, ESTOS SERAN REPUESTOS O REEMBOLSADOS POR EL TRABAJADOR CUALQUIER MOVIMIENTO DENTRO O FUERA DE SU DEPENDENCIA DEBERA SER COMUNICADO AL RESPONSABLE DE PATRIMONIO, BAJO RESPONSABILIDAD</p>


    </div>
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
  <script src="../class/bienes/bienes.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/login/killerSession.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
  //globals-----------------------------------------------------

  //------------------------------------------------------------
  $(document).ready(function() {
    App.init();
  });
  </script>
</body>
</html>
