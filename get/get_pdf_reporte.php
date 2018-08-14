<?php
require '../class/reportes/Reportes.php' ;
require '../assets/plugins/fpdf/fpdf.php';
$reporte= new Reporte;
$rs_reporte=$reporte->Select_Reporte_Bienes($_REQUEST['0'],$_REQUEST['1'],$_REQUEST['2'],$_REQUEST['3'],$_REQUEST['4'],$_REQUEST['5'],$_REQUEST['6'],$_REQUEST['7'],$_REQUEST['8']);

class PDF extends FPDF {
    //Cabecera de pgina
    function Header() {
        //Logo
        //$this->Image('logo_pb.png',10,8,33);
        //Arial bold 15
        //Movernos a la derecha
        $ti = 'REPORTE GENERAL DE BIENES ACTIVOS';
        $dat = date('d/m/Y');
        $col = ceil((297 - strlen($ti)) / 2);
        $this->Cell($col);
        //Ttulo
        $this->SetFont('Arial', 'UB', 10);
        $this->Cell(20, 6, $ti, 0, 0, 'C');
        //Fecha
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 6, 'Fecha: ' . $dat, 0, 1, 'R');
        //Aubtitles
        $this->Cell(30, 4, 'Entidad', 0, 0, '');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80, 4, ': MUNICIPALIDAD DE LIMA METROPOLITANA', 0, 0, '');
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 4, 'Pagina: ' . $this->PageNo() . '/{nb}', 0, 1, 'R');
        $this->Cell(30, 4, 'Dependencia', 0, 0, '');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80, 4, ': SISTEMA METROPOLITANO DE LA SOLIDARIDAD', 0, 1, '');
        if ($_GET['0'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Local', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['ltarget'], 0, 1, '');
        }
        if ($_GET['1'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Area', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['atarget'], 0, 1, '');
        }
        if ($_GET['2'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Oficina', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['otarget'], 0, 1, '');
        }
        //Salto de lnea
        //$this->Ln(20);
        $this->SetDrawColor(128, 128, 128);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(10, 4, 'ITEM', 'LT', 0, '');
        $this->Cell(20, 4, 'CODIGO', 'T', 0, '');
        $this->Cell(30, 4, 'CODIGO', 'T', 0, '');
        $this->Cell(104, 4, 'TIPO DE BIEN', 'T', 0, '');
        $this->Cell(20, 4, 'FECHA', 'T', 0, '');
        $this->Cell(16, 4, 'ESTADO', 'T', 0, '');
        $this->Cell(24, 4, 'VALOR', 'T', 0, 'R');
        $this->Cell(10, 4, 'LOCAL', 'T', 0, '');
        $this->Cell(20, 4, 'AREA', 'T', 0, '');
        $this->Cell(20, 4, 'OFICINA', 'T', 0, '');
        $this->Cell(10, 4, 'USU', 'TR', 1, '');
        $this->Cell(10, 4, '', 'LB', 0, '');
        $this->Cell(20, 4, 'PATRIMONIAL', 'B', 0, '');
        $this->Cell(30, 4, 'INTERNO', 'B', 0, '');
        $this->Cell(104, 4, '', 'B', 0, '');
        $this->Cell(20, 4, 'DE ADQ', 'B', 0, '');
        $this->Cell(16, 4, '', 'B', 0, '');
        $this->Cell(24, 4, 'EN LIBROS', 'B', 0, 'R');
        $this->Cell(10, 4, '', 'B', 0, '');
        $this->Cell(20, 4, '', 'B', 0, '');
        $this->Cell(20, 4, '', 'B', 0, '');
        $this->Cell(10, 4, '', 'BR', 1, '');
        $this->SetFont('Arial', '', 7);
    }

}
$pdf = new PDF('L', 'mm', 'A4');
//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true, 6);
$pdf->SetMargins(6, 6, 6);
$pdf->AliasNbPages();
$pdf->AddPage();
$j = 0;
$v = 0;
$pdf->SetDrawColor(128, 128, 128);

for ($i=0; $i <sizeof($rs_reporte) ; $i++) {
  $j++;
  $pdf->Cell(10, 4, $j, 'LTB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['id_patrimonial'], 'TB', 0, '');
  $pdf->Cell(30, 4, $rs_reporte[$i]['id_interno'], 'TB', 0, '');
  $pdf->Cell(104, 4, $rs_reporte[$i]['tipo_equipo'], 'TB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['fecha_adq'], 'TB', 0, '');
  $pdf->Cell(16, 4, $rs_reporte[$i]['estado'], 'TB', 0, '');
  $pdf->Cell(24, 4, $rs_reporte[$i]['valor_lib'], 'TB', 0, 'R');
  $pdf->Cell(10, 4, $rs_reporte[$i]['id_depact'], 'TB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['area'], 'TB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['oficina'], 'TB', 0, '');
  $pdf->Cell(10, 4, $rs_reporte[$i]['id_asignado'], 'RTB', 1, '');
  $v = $v + $rs_reporte[$i]['valor_lib'];
}
$pdf->Cell(60, 4, 'TOTAL DE BIENES:', 1, 0, '');
$pdf->Cell(40, 4, number_format($j, 0, '', ','), 1, 1, '');
$pdf->Cell(60, 4, 'TOTAL DE VALOR EN LIBROS S/.:', 1, 0, '');
$pdf->Cell(40, 4, number_format($v, 2, '.', ','), 1, 1, '');
$pdf->Output();




?>
