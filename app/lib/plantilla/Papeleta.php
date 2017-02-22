<?php
include('../class/bienes/bienesxusuario_cls.php');
$clase= new Pendientes;
$rs_detalle=$clase->obtenerBienes('A1145');

$html = '<body style="font-family: PT Sans;padding: 30px;">
      <div >
        <img  style="height: 40px;" src="../../../assets/img/logo.png" alt="">
      </div>
      <div class="text-center title">
        <h3>Papeleta de Asignación Nro [ORDEN]</h3>
      </div>
            <label>LOCAL:</label>
            <span>[UNIDAD DE SISTEMAS Y PROCESOS]</span>
            <div class="pull-right text-center">FECHA
              <table class="table  table-bordered table-condensed">
                <tr>
                  <td>06</td>
                  <td>02</td>
                  <td>2017</td>
                </tr>
              </table>
            </div>
            <br>
            <h4>Datos del Usuario</h4>
            <label for="">NOMBRE:</label>
            <span>[VICTOR ALEJANDRO MARQUINA CARDENAS]</span>
            <br>
            <label for="">DNI:</label>
            <span>[42940246]</span>
            <br>
            <label for="">CARGO:</label>
            <span>[ESPECIALISTA EN BASE DE DATOS]</span>
            <br>
            <label for="">AREA:</label>
            <span>[DESARROLLO]</span>
            <br>
            <br>
            <div class="detallePapeleta">
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th class="p-3 text-center bg-grey-200">Codigo</th>
                    <th class="p-3 text-center bg-grey-200">Descripción</th>
                    <th class="p-3 text-center bg-grey-200">Modelo</th>
                    <th class="p-3 text-center bg-grey-200">Marca</th>
                    <th class="p-3 text-center bg-grey-200">Serie</th>
                  </tr>
                </thead>'.
    for ($i=0; $i <sizeof($rs_detalle) ; $i++) {
              '<tr>
                      <td class="p-3 f-s-11 text-center m-r-10 m-l-10">'.utf8_encode($rs_detalle[$i]["id_patrimonial"]).'</td>
                      <td class="p-3 f-s-11 text-center m-r-10 m-l-10">'.utf8_encode($rs_detalle[$i]["descripcion"]).'</td>
                      <td class="p-3 f-s-11 text-center m-r-10 m-l-10">'.utf8_encode($rs_detalle[$i]["modelo"]).'</td>
                      <td class="p-3 f-s-11 text-center m-r-10 m-l-10">'.utf8_encode($rs_detalle[$i]["marca"]).'</td>
                      <td class="p-3 f-s-11 text-center m-r-10 m-l-10">'.utf8_encode($rs_detalle[$i]["serie"]).'</td>
                      </td>
                      </tr>';
                    }.'</table></body>';


//==============================================================
//==============================================================
//==============================================================

include("../pdf/mpdf.php");

$mpdf=new mPDF('c', 'A4-L');
$stylesheet = file_get_contents('css/style.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($html.$html2,2);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>
