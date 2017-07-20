<?php require '../class/bienes/bienes_cls.php' ;
$clase_main= new bien;
session_start();
$id_patrimonial=$_REQUEST["id_patrimonial"];
$fecha = $_REQUEST['fecha_resol'];
$causal=$_REQUEST['causal'];
$resolucion=strtoupper(utf8_encode($_REQUEST['resol_baja']));
$doc_baja=strtoupper($_REQUEST['doc_sbn']) ;
$usrreg = $_SESSION['sicop_usr_id'];
$mesdesde = substr($fecha, 3, 2);
$diadesde = substr($fecha, 0, 2);
$aniodesde = substr($fecha, 6, 4);

$fecha = $aniodesde . "/" . $mesdesde . "/" . $diadesde;
$clase_main->bajaBien($id_patrimonial,$fecha,$causal,$resolucion,$doc_baja,$usrreg);
?>
