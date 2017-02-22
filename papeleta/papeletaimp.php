<?php
require('fpdf.php');
//Connect to your database
include('../class/bienes/bienesxusuario_cls.php');
// //Select the Products you want to show in your PDF file
// $conectar=new conectar;
// $cn=$conectar->con();
// //obtener DATOS CABECERA
// $plsql="select * from papeleta_desplazamiento where  id_papeleta='".$_GET['idpapeleta']."' and  id_anno='".$_GET['anio']."'";
// $rs=pg_query($cn,$plsql);
// $cabecera=pg_fetch_array($rs, 0);
// //obtener DATOS DETALLE DE BIENES
$query=new Pendientes;
$recordset=$query->obtenerBienes('E2349');
for ($fila=0; $fila < sizeof($recordset) ; $fila++) {
$detalle[$fila][0]=$recordset[$fila]["id_patrimonial"] ;
$detalle[$fila][1]=$recordset[$fila]["descripcion"] ;
$detalle[$fila][2]=$recordset[$fila]["marca"] ;
$detalle[$fila][3]=$recordset[$fila]["modelo"] ;
$detalle[$fila][4]=$recordset[$fila]["color"] ;
$detalle[$fila][5]=$recordset[$fila]["serie"] ;
$detalle[$fila][6]=$recordset[$fila]["estado"] ;
$detalle[$fila][7]=$recordset[$fila]["observacion"] ;
}
//Create a new PDF file
$pdf = new FPDF();
$pdf->AddPage('L', 'A4');

$Y_sisol_position = 4;
$Y_usp_position = 7;
$Y_titulo_position = 12;
//Fields Name position
$Y_Fields_numero = 20;
$Y_Fields_numerorpc = 26;
$Y_Fields_Name_position = 39;
//Table position, under Fields Name
$Y_Table_Position = 40;
$Y_Table_Positionnumero = 20;
$Y_Table_Positionnumerorpc = 26;
$Y_Table_Positionsegunda = 54;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232, 232, 232);

$pdf->SetMargins(10, 10, 10);

//Bold Font for Field Name
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY($Y_sisol_position);
$pdf->Cell(280, 6, 'SISTEMA METROPOLITANO DE LA SOLIDARIDAD - SISOL', 0, 0, 'L', 0);

$pdf->SetY($Y_usp_position);
$pdf->Cell(280, 6, 'UNIDAD DE SISTEMAS Y PROCESOS', 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY($Y_titulo_position);
$pdf->Cell(280, 6, utf8_decode('PAPELETA') . " " . $motivo . " " . utf8_decode('DE DESPLAZAMIENTO PATRIMONIAL'), 1, 0, 'C', 1);
$pdf->SetX(45);

//numeros
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY($Y_Fields_numero);
$pdf->SetX(10);

$pdf->Cell(60, 6, utf8_decode('DEPENDENCIA ORIGEN:'), 1, 0, 'R', 1);
$pdf->SetX(140);

$pdf->Cell(80, 6, utf8_decode('MOTIVO (TRANFERENCIA, PRESTAMO, ETC)'), 1, 0, 'C', 1);
$pdf->SetX(230);
$pdf->Cell(30, 6, 'PAPELETA NRO:', 1, 0, 'R', 1);

$pdf->SetY($Y_Fields_numerorpc);
$pdf->SetX(10);

$pdf->Cell(60, 6, 'DEPENDENCIA DESTINO:', 1, 0, 'R', 1);
$pdf->SetX(140);
$pdf->Cell(80, 6, utf8_decode($cabecera['motivo']), 1,0, 'C');
$pdf->SetX(230);
$pdf->Cell(30, 6, 'FECHA:', 1, 0, 'R', 1);
$pdf->SetX(260);
$pdf->MultiCell(30, 6, utf8_decode($cabecera['fecha_emision']), 1, 'C');
$pdf->Ln();





//campos de respuesta
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY($Y_Table_Positionnumero);
$pdf->SetX(70);

$pdf->MultiCell(60, 6,utf8_decode($cabecera['origen']), 1, 'C');
$pdf->SetY($Y_Table_Positionnumero);
$pdf->SetX(260);

$pdf->MultiCell(30, 6, utf8_decode($cabecera['id_papeleta']), 1, 'C');
$pdf->SetY($Y_Table_Positionnumero);
$pdf->SetX(60);


$pdf->SetY($Y_Table_Positionnumerorpc);
$pdf->SetX(70);

$pdf->MultiCell(60, 6, utf8_decode($cabecera['destino']), 1, 'C');
$pdf->SetY($Y_Table_Positionnumerorpc);



$pdf->SetY($Y_Table_Positionnumerorpc);
$pdf->SetX(80);

//SE ENTREGA EL EQUIPO A:
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(33);
$pdf->SetX(10);
$pdf->Cell(70, 6, 'DATOS DE ORIGEN', 0, 0, 'L', 0);
$pdf->SetX(139);
$pdf->Cell(70, 6, 'DATOS DE DESTINO', 0, 0, 'L', 0);
//ENTREGA Y RECIBE
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(10);
$pdf->Cell(35, 6, 'ENTREGA:', 1, 0, 'L', 1);
$pdf->SetX(139);
$pdf->Cell(35, 6, 'RECIBE:', 1, 0, 'L', 1);
$pdf->SetY(39);
$pdf->SetX(45);
$pdf->MultiCell(80, 6,  utf8_decode($cabecera['entrega']), 1, 'L');
$pdf->SetY(39);
$pdf->SetX(174);
$pdf->MultiCell(80, 6,  utf8_decode($cabecera['recibe']), 1, 'L');
//AREA ORIGEN Y DESTINO
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(45);
$pdf->SetX(10);
$pdf->Cell(35, 6, 'AREA:', 1, 0, 'L', 1);
$pdf->SetX(139);
$pdf->Cell(35, 6, 'AREA:', 1, 0, 'L', 1);
$pdf->SetY(45);
$pdf->SetX(45);
$pdf->MultiCell(80, 6, utf8_decode($cabecera['area_o']), 1, 'L');
$pdf->SetY(45);
$pdf->SetX(174);
$pdf->MultiCell(80, 6,  utf8_decode($cabecera['area_d']), 1, 'L');

//AREA ORIGEN Y DESTINO
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(51);
$pdf->SetX(10);
$pdf->Cell(35, 6, 'CARGO:', 1, 0, 'L', 1);
$pdf->SetX(139);
$pdf->Cell(35, 6, 'CARGO:', 1, 0, 'L', 1);
$pdf->SetY(51);
$pdf->SetX(45);
$pdf->MultiCell(80, 6,  utf8_decode($cabecera['cargo_o']), 1, 'L');
$pdf->SetY(51);
$pdf->SetX(174);
$pdf->MultiCell(80, 6,  utf8_decode($cabecera['cargo_d']), 1, 'L');
$pdf->SetY(58);
$pdf->SetX(139);
$pdf->Cell(35, 6, utf8_decode('OBSERVACIÓN:'), 0, 0, 'L', 0);
$pdf->SetY(58);
$pdf->SetX(174);
$pdf->MultiCell(90, 6,  utf8_decode($cabecera['observacion']), 0, 'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
// //tabla primera
// $pdf->SetFont('Arial', '', 8);
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(10);

// $pdf->MultiCell(70, 4, $nombre . " " . $apellidopat . " " . $apellidomat, 1, 'C');
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(80);

// $pdf->MultiCell(20, 4, $dni, 1, 'C');
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(100);

// $pdf->MultiCell(60, 4, $establecimiento, 1, 'C');
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(160);

// $pdf->MultiCell(70, 4, $dependencia, 1, 'C');
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(230);

// $pdf->MultiCell(60, 4, $cargo, 1, 'C');
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(290);






//FIRMAS
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(70);
$pdf->Cell(140, 3, '---------------------------------------------------------------------', 0, 0, 'C', 0);
$pdf->SetX(180);
$pdf->Cell(140, 3, '---------------------------------------------------------------------', 0, 0, 'C', 0);

$pdf->SetFont('Arial', '', 8);
$pdf->SetY(75);
$pdf->Cell(140, 3,  utf8_decode('ENTREGUÉ CONFORME'), 0, 0, 'C', 0);
$pdf->SetX(180);
$pdf->Cell(140, 3,  utf8_decode('RECIBÍ CONFORME'), 0, 0, 'C', 0);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
//cabecera------------------------------
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetY(83);
$pdf->Cell(70, 6, 'DATOS DE LOS BIENES', 0, 0, 'L', 0);


$pdf->SetY(90);
$pdf->SetX(10);
$pdf->Cell(20, 6, 'CODIGO.', 1, 0, 'C', 1);
$pdf->SetX(30);

$pdf->Cell(80, 6, 'DESCRIPCION', 1, 0, 'C', 1);
$pdf->SetX(110);

$pdf->Cell(30, 6, 'MARCA', 1, 0, 'C', 1);
$pdf->SetX(140);

$pdf->Cell(30, 6, 'MODELO', 1, 0, 'C', 1);
$pdf->SetX(170);

$pdf->Cell(20, 6, 'COLOR', 1, 0, 'C', 1);
$pdf->SetX(190);
$pdf->Cell(30, 6, 'SERIE', 1, 0, 'C', 1);
$pdf->SetX(220);
$pdf->Cell(20, 6, 'ESTADO', 1, 0, 'C', 1);
$pdf->SetX(240);
$pdf->Cell(55, 6, utf8_decode('OBSERVACIÓN'), 1, 0, 'C', 1);
//fin cabecera------------------------------

//Inicio Detalle------------------------------
$FILAS=sizeof($detalle);
 for ($F=0; $F < $FILAS ; $F++) { //NRO DE FILAS
  $yini=96;
  $alto=5;
  $ini=10;
  $siguiente=0;
  $pdf->SetY($yini+$sigAlt);
  $pdf->SetX($ini);


for ($C=0; $C < 8 ; $C++)
  {

    $ancho=[20,80,30,30,20,30,20,55];
      $pdf->SetX($ini+$siguiente);
  $pdf->Cell($ancho[$C],$alto,$detalle[$F][$C],1,0, 'C');

  $siguiente=$siguiente+$ancho[$C];

  }
$sigAlt=$sigAlt+$alto;
 }


//Inicio Detalle------------------------------
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(10);
$pdf->MultiCell(275, 6, 'NOTA: ESTE DOCUMENTO DEBE SER ALCANZADO AL ENCARGADO DE COMPUTO DEL LOCAL DE DESTINO Y ESTE A SU VEZ AL AREA DE PATRIMONIO, BAJO RESPONSABILIDAD DEL ENCARGADO DE SOPORTE TECNICO DE LA USP', 0,  'C');

$pdf->Output();
?>
