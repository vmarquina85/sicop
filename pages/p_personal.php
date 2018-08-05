<?php
require '../class/config/session_val.php';
require '../class/config/preconfigPersonal_cls.php';
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

  <!-- <link href="../assets/css/datatables.css" rel="stylesheet" /> -->
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
  .prueba{
    background: #E0E0E0;
    border-radius: 3px;
    padding: 5px;

  }
  .radio{
    display: inline;
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
    <div id="top-menu" class="top-menu">
      <!-- begin top-menu nav -->
      <ul  id='nav_menu' class="nav">
      </ul>
    </div>

    <div id="content" class="content">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          </div>
          <h4 class="panel-title">Lista de Funcionarios Registrado</h4>
        </div>

        <div class="panel-body">
          <div class='bg-grey-200  m-b-10 '>
            <button class="btn btn-default btn-xs m-b-10 m-t-10  m-l-10" onclick='javascript:nuevoRegistro();'><img src="../assets/img/new_reg.png" alt="Nuevo Registro"> Nuevo Registro</button>
            <button class="btn btn-default btn-xs m-b-10 m-t-10 "><img src="../assets/img/excel.png" alt="Exportar excel"> Exportar a Excel</button>
          </div>
          <form class='form-inline' method='POST' id='panelForm'>
            <div class="form-group  form-group-sm  m-r-10">
              <input type="text" class="form-control" id="txt_Nombre"  placeholder="Nombre" maxlength="100"/>
            </div>
            <div class="form-group  form-group-sm m-r-10">
              <input type="text" class="form-control" id="txt_Paterno"  placeholder="Apellido Paterno"  maxlength="100"/>
            </div>
            <div class="form-group  form-group-sm m-r-10">
              <input type="text" class="form-control" id="txt_Materno"  placeholder="Apellido Materno" maxlength="100"/>
            </div>
            <select onchange='search(1)' id="sl_Operativo" class=' default-select2 form-control input-sm m-r-10  m-b-5'>
              <option value="*" disabled selected>Operativo</option>
              <option value="*">TODOS</option>
              <?php for ($i=0; $i < sizeof($rs_operativo) ; $i++) {  ?>
                <option value="<?php echo utf8_encode($rs_operativo[$i]['id_dep']);?>"><?php echo utf8_encode($rs_operativo[$i]['descripcion']); ?></option>
              <?php  }?>
            </select>
            <div onclick='search(1)' class="btn btn-info btn-sm submit"><i class="fa fa-search"></i> Buscar</div>
            <div onclick='vertodos()' class="btn btn-default btn-sm "><img src="../assets/img/refresh.png" alt="Ver Todos"> Ver Todos</div>
          </form>
          <br>
          <ul id='paginator' class="pagination">
          </ul>
          <div class="table-responsive">
            <table class=" dt table table-codensed table-bordered">
              <thead>
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
              <tbody id='tb_detallePersonal'>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div id='mymodal' class="modal fade" id="modal-dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog dialog-normal">
          <div class="modal-content ">
            <div class="modal-header header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title text-white">Nuevo registro de Funcionario</h4>
            </div>

            <div class="modal-body">
              <ul class="nav nav-tabs">
                <li class='active'><a href="#tabPersona" data-toggle="tab"><img src="../assets/img/usuario.png" alt=""> Datos de Personal</a></li>
                <li><a href="#tabCentro" data-toggle="tab">Centro de Labores</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id='tabPersona' >
                  <form id='formulario'>
                    <!-- fila 1 -->
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Nombre</span>
                      <input id='inputNombre' type="text" class="form-control input-sm" maxlength="100" >
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Apellido Paterno</span>
                      <input id='inputApePat' type="text" class="form-control input-sm" maxlength="100" >
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Apellido Materno</span>
                      <input id='inputApeMat' type="text" class="form-control input-sm" maxlength="100" >
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">DNI</span>
                          <input id='inputDni' type="text" class="form-control input-sm" maxlength="8" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">RUC</span>
                          <input id='inputRuc' type="text" class="form-control input-sm" maxlength="11" >
                        </div>
                      </div>
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Fecha Nac</span>
                      <input id='inputFecNac' type="text" class="form-control input-sm datepicker-default" >
                    </div>
                    <div class="input-group m-b-10 m-t-10">
                      <span class="prueba">Sexo</span>
                      <div class="radio">
                        <label>
                          <input name="radioSexo" type="radio" value="M"/>
                          Masculino
                        </label>
                        <label>
                          <input name="radioSexo" type="radio" value="F"/>
                          Femenino
                        </label>

                      </div>
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Dirección</span>
                      <input id='inputDireccion' type="text" class="form-control input-sm" maxlength="150" >
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm">Departamento</span>
                        <select id="selectDepartamento"  onchange="fn_obtenerProvincia();fn_obtenerDistrito()" class='form-control input-sm'>
                          <option value="*">--SELECCIONAR--</option>
                          <?php
                          for ($i=0; $i < sizeof($rs_departamento); $i++) {
                            echo '<option value="'.$rs_departamento[$i]["id_dep"].'">'.$rs_departamento[$i]["departamento"].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group m-b-5 ">
                        <span class="input-group-addon input-sm">Provincia</span>
                        <select id="selectProvincia" onchange="fn_obtenerDistrito()"  class='form-control input-sm'>
                          <option value="*">--SELECCIONAR--</option>
                        </select>
                      </div>
                    </div>
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Distrito</span>
                      <select id="selectDistrito"  class='form-control input-sm'>
                        <option value="*">--SELECCIONAR--</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Telefono</span>
                          <input id='Telefono' type="text" class="form-control input-sm" maxlength="9"  >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Celular</span>
                          <input id='Celular' type="text" class="form-control input-sm" maxlength="9" >
                        </div>
                      </div>
                    </div>
                    <div class="input-group m-b-5 ">
                      <span class="input-group-addon input-sm">Estado Civil</span>
                      <select id="selectEstadoCivil"  class='form-control input-sm'>
                        <option value="*">--SELECCIONAR--</option>
                        <?php
                        for ($i=0; $i <sizeof($rs_estadoCivil) ; $i++) {
                          echo '<option value="'.$rs_estadoCivil[$i]['id_tipo'].'">'.$rs_estadoCivil[$i]['descripcion'].'</option>';
                        }?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Grado Inst</span>
                          <select id="SelectGrado"  class='form-control input-sm'>
                            <option value="*">--SELECCIONAR--</option>
                            <?php
                            for ($i=0; $i <sizeof($rs_GradoInst) ; $i++) {
                              echo '<option value="'.$rs_GradoInst[$i]['id_tipo'].'">'.$rs_GradoInst[$i]['descripcion'].'</option>';
                            }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group m-b-5 ">
                          <span class="input-group-addon input-sm">Profesion</span>
                          <select id="selectProfesion"  class='form-control input-sm'>
                            <option value="*">--SELECCIONAR--</option>
                            <?php
                            for ($i=0; $i <sizeof($rs_Profesion) ; $i++) {
                              echo '<option value="'.$rs_Profesion[$i]['id_tipo'].'">'.$rs_Profesion[$i]['descripcion'].'</option>';
                            }?>
                          </select>
                        </div>
                      </div>
                    </div>


                  </form>
                </div>
                <div class="tab-pane fade" id='tabCentro' >
                  <div class="input-group m-b-5 ">
                    <span class="input-group-addon input-sm">Dependencia</span>
                    <select id="selectLugarActual"  onchange="fn_obtenerAreas();fn_obtenerOficina()" class='form-control input-sm'>
                        <option value="*">--SELECCIONAR--</option>
                      <?php for ($i=0; $i <sizeof($rs_operativo) ; $i++) {
                        echo '<option value="'.$rs_operativo[$i]['id_dep'].'">'.$rs_operativo[$i]['descripcion'].'</option>';
                      }
                       ?>
                    </select>

                  </div>
                  <div class="input-group m-b-5 ">
                    <span class="input-group-addon input-sm">Area</span>
                    <select id="selectArea"  onchange="fn_obtenerOficina()" class='form-control input-sm'>
                        <option value="*">--SELECCIONAR--</option>
                    </select>
                  </div>
                  <div class="input-group m-b-5 ">
                    <span class="input-group-addon input-sm">Oficina</span>
                    <select id="selectOficina"  class='form-control input-sm'>
                        <option value="*">--SELECCIONAR--</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon input-sm">Cargo</span>
                    <select id="selectCargo"  class='form-control input-sm'>
                      <option value="*">--SELECCIONAR--</option>
                    <?php for ($i=0; $i <sizeof($rs_cargo) ; $i++) {
                      echo '<option value="'.$rs_cargo[$i]['id_tipo'].'">'.$rs_cargo[$i]['descripcion'].'</option>';
                    }
                     ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancelar</a>
              <a href="javascript:f_NuevoFuncionario();"; class="btn btn-sm btn-success">Crear</a>
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
  <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
  <script src="../class/config/config.js"></script>
  <script src="../class/menu/menu.js"></script>

  <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="../assets/js/apps.min.js"></script>
  <script src="../class/ajax/ajax.js"></script>
  <script src="../class/personal/p_personal.js"></script>
  <script src="../class/login/killerSession.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
  //globals-----------------------------------------------------
  var selectedIdUser='';
  construirMenu();
  //------------------------------------------------------------
  $(document).ready(function() {
    App.init();
    search(1);
    iniciarSelect();
    // inicializarDatatables();
    $(".datepicker-default").datepicker({
      todayHighlight: !0,
      autoclose: true,
      format: 'dd/mm/yyyy'
    })
  });
  </script>

</body>
</html>
