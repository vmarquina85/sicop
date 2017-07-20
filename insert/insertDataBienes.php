<?php require '../class/conexion/conexion_cls.php';
session_start();
$con = new conectar;
$cn=$con->con_sinv();
$usrreg = $_SESSION['sicop_usr_id'];
$fecha = $_REQUEST['fecha_adq'];
$mesdesde = substr($fecha, 3, 2);
$diadesde = substr($fecha, 0, 2);
$aniodesde = substr($fecha, 6, 4);
$fecha = $aniodesde . "/" . $mesdesde . "/" . $diadesde;
//idcorrelativo
$bot_pat = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(id_patrimonial,10,6)) as int)) + 1 as maximo
from equipos where id_hardware='" . trim($_REQUEST['id_tip']) . "')x";
$rs = pg_query($cn, $bot_pat);
$ind = pg_fetch_result($rs, 0, 'maximo');
$ind = '0000' . $ind;
$id_pat = trim($_REQUEST['id_pat']) . '-' . substr($ind, -4);
//idalterno
$bot_alt = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(id_alterno) as int)) + 1 as maximo from equipos)x";
$rse = pg_query($cn, $bot_alt);
$id_alt = pg_fetch_result($rse, 0, 'maximo');
$ins = "insert into equipos(id_patrimonial,id_hardware,id_marca,id_asignado,serie,id_color,modelo,id_estado,id_alterno,
fec_registro,usr_registra,observacion,id_depact,id_areact,id_ofiact,tipo_cta,cuenta,forma_adq,valor_lib,nro_motor,nro_chasis,
fecha_adq,placa,asegurado,est_bien,doc_alta,tipo_bien,id_interno,dimension,valor_tasa)
values('" . $id_pat . "','" . $_REQUEST['id_tip'] . "','" . $_REQUEST['id_mar'] . "','" . $_REQUEST['id_personal'] . "','" . strtoupper($_REQUEST['serie']) . "','" . $_REQUEST['id_col'] . "','". strtoupper($_REQUEST['modelo']) . "','" . $_REQUEST['id_est'] . "','" . $id_alt . "',now(),'" . $usrreg . "','" . trim(utf8_decode($_REQUEST['observa'])) . "','" . $_REQUEST['id_local'] . "','" . $_REQUEST['id_area'] . "','" . $_REQUEST['id_oficina'] . "','" . $_REQUEST['tipo_cta'] . "','" . $_REQUEST['cuenta'] . "','" . $_REQUEST['forma_adq'] . "','" . $_REQUEST['valor_libros'] . "','" . $_REQUEST['motor'] . "','" . strtoupper($_REQUEST['chasis']) . "','" . $fecha . "','" . strtoupper($_REQUEST['placa']) . "','" . $_REQUEST['chkasegurado'] . "','A','" . utf8_decode(strtoupper($_REQUEST['resol_alta'])) . "','" . $_REQUEST['tipo'] . "','" . $_REQUEST['id_interno'] . "','" . $_REQUEST['dime'] . "','" . $_REQUEST['valor_adq'] . "')";
pg_query($ins);
pg_close($cn);
echo substr($ind, -4);
?>
