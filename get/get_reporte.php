<?php require '../class/reportes/Reportes.php' ;
$reporte= new Reporte;
$rs_reporte=$reporte->Select_Reporte_Bienes($_REQUEST['0'],$_REQUEST['1'],$_REQUEST['2'],$_REQUEST['3'],$_REQUEST['4'],$_REQUEST['5'],$_REQUEST['6'],$_REQUEST['7'],$_REQUEST['8']);
echo json_encode($rs_reporte);
?>
