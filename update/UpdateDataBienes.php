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
$id_pat = trim($_REQUEST['id_patrimonial']);
//idalterno
$updt = "update equipos set tipo_cta='".$_REQUEST['tipo_cta'] ."',cuenta='".$_REQUEST['cuenta']."',forma_adq='".$_REQUEST['forma_adq']."'
,fecha_adq='".$_REQUEST['fecha_adq']."',id_interno='".$_REQUEST['id_interno']."',doc_alta='".$_REQUEST['resol_alta']."'
,valor_tasa='".$_REQUEST['valor_adq']."',valor_lib='".$_REQUEST['valor_libros']."', id_estado='".$_REQUEST['id_est']."',asegurado='".$_REQUEST['chkasegurado']."'
,id_marca='".$_REQUEST['id_marca']."',modelo='".$_REQUEST['modelo']."',tipo_bien='".$_REQUEST['tipo']."',dimension='".$_REQUEST['dime']."',id_color='".$_REQUEST['id_col']."'
,serie='".$_REQUEST['serie']."',placa='".$_REQUEST['placa']."',nro_motor='".$_REQUEST['motor']."',nro_chasis='".$_REQUEST['chasis']."',observacion='".$_REQUEST['observa']."' where id_patrimonial='".$id_pat."'";

try {
  pg_query($updt);
  pg_close($cn);
} catch (Exception $e) {
echo $e;
pg_close($cn);
}
echo "ok";

?>
