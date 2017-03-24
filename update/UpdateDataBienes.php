<?php require '../class/conexion/conexion_cls.php';
session_start();
$con = new conectar;
$cn=$con->con_sinv();
$usrreg = $_SESSION['usr_id'];
$fecha = $_REQUEST['fecha_adq'];
$mesdesde = substr($fecha, 3, 2);
$diadesde = substr($fecha, 0, 2);
$aniodesde = substr($fecha, 6, 4);
$fecha = $aniodesde . "/" . $mesdesde . "/" . $diadesde;
//idcorrelativo
$id_pat = trim($_REQUEST['id_patrimonial']);
//idalterno
$updt = "insert into equipos(id_patrimonial,id_hardware,id_marca,id_asignado,serie,id_color,modelo,id_estado,id_alterno,
fec_registro,usr_registra,observacion,id_depact,id_areact,id_ofiact,tipo_cta,cuenta,forma_adq,valor_lib,nro_motor,nro_chasis,
fecha_adq,placa,asegurado,est_bien,doc_alta,tipo_bien,id_interno,dimension,valor_tasa)
values('" . $id_pat . "','" . $_REQUEST['id_tip'] . "','" . $_REQUEST['id_marca'] . "','" . $_REQUEST['id_personal'] . "','" . strtoupper($_REQUEST['serie']) . "','" . $_REQUEST['id_col'] . "','". strtoupper($_REQUEST['modelo']) . "','" . $_REQUEST['id_est'] . "','" . $id_alt . "',now(),'" . $usrreg . "','" . trim(utf8_decode($_REQUEST['observa'])) . "','" . $_REQUEST['id_local'] . "','" . $_REQUEST['id_area'] . "','" . $_REQUEST['id_oficina'] . "','" . $_REQUEST['tipo_cta'] . "','" . $_REQUEST['cuenta'] . "','" . $_REQUEST['forma_adq'] . "','" . $_REQUEST['valor_libros'] . "','" . $_REQUEST['motor'] . "','" . strtoupper($_REQUEST['chasis']) . "','" . $fecha . "','" . strtoupper($_REQUEST['placa']) . "','" . $_REQUEST['chkasegurado'] . "','A','" . utf8_decode(strtoupper($_REQUEST['resol_alta'])) . "','" . $_REQUEST['tipo'] . "','" . $_REQUEST['id_interno'] . "','" . $_REQUEST['dime'] . "','" . $_REQUEST['valor_adq'] . "')";
pg_query($ins);
pg_close($cn);
echo substr($ind, -4);
?>
