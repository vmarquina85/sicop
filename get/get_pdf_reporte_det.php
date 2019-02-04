<?php
require '../class/reportes/Reportes.php' ;
require '../assets/plugins/fpdf/fpdf.php';
$reportedet= new Reporte;
$rs_reporte=$reportedet->Select_Reporte_Bienes_det($_REQUEST['0'],$_REQUEST['1'],$_REQUEST['2'],$_REQUEST['3'],$_REQUEST['4'],$_REQUEST['5'],$_REQUEST['6'],$_REQUEST['7'],$_REQUEST['8'],$_REQUEST['9']);

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
        $this->SetFont('Arial', 'UB', 9);
        $this->Cell(20, 6, $ti, 0, 0, 'C');
        //Fecha
        $this->SetFont('Arial', '', 7);
        $this->Cell(0, 6, 'Fecha: ' . $dat, 0, 1, 'R');
        //Aubtitles
        $this->Cell(30, 4, 'Entidad', 0, 0, '');
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(80, 4, ': MUNICIPALIDAD DE LIMA METROPOLITANA', 0, 0, '');
        $this->SetFont('Arial', '', 7);
        $this->Cell(0, 4, 'Pagina: ' . $this->PageNo() . '/{nb}', 0, 1, 'R');
        $this->Cell(30, 4, 'Dependencia', 0, 0, '');
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(80, 4, ': SISTEMA METROPOLITANO DE LA SOLIDARIDAD', 0, 1, '');
        if ($_GET['0'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Usuario', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['utarget'], 0, 1, '');
        }
        if ($_GET['1'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Local', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['ltarget'], 0, 1, '');
        }
        if ($_GET['2'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Area', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['atarget'], 0, 1, '');
        }
        if ($_GET['3'] <> '*') {
            $this->SetFont('Arial', '', 8);
            $this->Cell(30, 4, 'Oficina', 0, 0, '');
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(80, 4, ': ' . $_GET['otarget'], 0, 1, '');
        }
        if ($_GET['8'] <> '') {
          $this->SetFont('Arial', '', 8);
          $this->Cell(30, 4, 'Bienes Adquiridos Del', 0, 0, '');
          $this->SetFont('Arial', 'B', 8);
          $this->Cell(20, 4, ': ' . $_GET['8'], 0, 0, '');
          $this->SetFont('Arial', '', 8);
          $this->Cell(4, 4, 'Al', 0, 0, '');
          $this->SetFont('Arial', 'B', 8);
          $this->Cell(20, 4, ': ' . $_GET['9'], 0, 1, '');
        }






        //Salto de lnea
        //$this->Ln(20);
        $this->SetDrawColor(128, 128, 128);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(10, 4, 'ITEM', 'LT', 0, '');
        $this->Cell(20, 4, 'CODIGO', 'T', 0, '');
        $this->Cell(20, 4, 'CODIGO', 'T', 0, '');
        $this->Cell(70, 4, 'TIPO DE BIEN', 'T', 0, '');
        $this->Cell(80, 4, 'DETALLE TECNICO', 'T', 0, '');
        $this->Cell(16, 4, 'FECHA', 'T', 0, '');
        $this->Cell(16, 4, 'ESTADO', 'T', 0, '');
        $this->Cell(18, 4, 'VALOR', 'T', 0, 'R');
        $this->Cell(10, 4, 'LOCAL', 'T', 0, '');
        $this->Cell(10, 4, 'AREA', 'T', 0, '');
        $this->Cell(12, 4, 'OFICINA', 'T', 0, '');
        $this->Cell(10, 4, 'USU', 'TR', 1, '');
        $this->Cell(10, 4, '', 'LB', 0, '');
        $this->Cell(20, 4, 'PATRIMONIAL', 'B', 0, '');
        $this->Cell(20, 4, 'INTERNO', 'B', 0, '');
        $this->Cell(70, 4, '', 'B', 0, '');
        $this->Cell(80, 4, '', 'B', 0, '');
        $this->Cell(16, 4, 'DE ADQ', 'B', 0, '');
        $this->Cell(16, 4, '', 'B', 0, '');
        $this->Cell(18, 4, 'EN LIBROS', 'B', 0, 'R');
        $this->Cell(10, 4, '', 'B', 0, '');
        $this->Cell(10, 4, '', 'B', 0, '');
        $this->Cell(12, 4, '', 'B', 0, '');
        $this->Cell(10, 4, '', 'BR', 1, '');
        $this->SetFont('Arial', '', 7);
    }
    //Pie de pgina
    // function Footer() {
    //     //Posicin: a 1,5 cm del final
    //     $this->SetY(-10);
    //     //Arial italic 8
    //     $this->SetFont('Arial', 'I', 6);
    //     //Nmero de pgina
    //     //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    //     $this->Cell(30, 4, '', 'B', 0, 0, '');
    //     $this->Cell(30, 4, '', 'B', 0, 0, '');
    //     $this->Cell(16, 4, '', 'B', 0, 0, '');
    //     $this->Cell(6, 4, '', 'B', 0, 0, '');
    //     $this->Cell(16, 4, '', 'B', 0, 0, '');
    //     $this->Cell(70, 4, '', 'B', 0, 0, '');
    //     $this->Cell(74, 4, '', 'B', 0, 0, '');
    //     $this->Cell(12, 4, '', 'B', 0, 0, '');
    //     $this->Cell(3, 4, '', 'B', 0, 0, '');
    //     $this->Cell(36, 4, '', 'B', 0, 0, '');
    // }
}
//$pdf=new FPDF('L','mm','A4');
$pdf = new PDF('L', 'mm', 'A4');
//$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(true, 4);
$pdf->SetMargins(1, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();

$j = 0;
$v = 0;
$pdf->SetDrawColor(128, 128, 128);
for ($i=0; $i <sizeof($rs_reporte) ; $i++) {
    $j++;
    $pdf->Cell(10, 4, $j, 'LTB', 0, '');
    $pdf->Cell(20, 4, $rs_reporte[$i]['id_patrimonial'], 'TB', 0, '');
    $pdf->Cell(20, 4, $rs_reporte[$i]['id_interno'], 'TB', 0, '');
    $pdf->Cell(70, 4, substr($rs_reporte[$i]['tipo_equipo'], 0, 46), 'TB', 0, '');
    $ch = '';
    if (!empty($rs_reporte[$i]['marca'])) $ch.= "MARCA: " . $rs_reporte[$i]['marca'] . "; ";
    if (!empty($rs_reporte[$i]['modelo'])) $ch.= "MODELO: " . $rs_reporte[$i]['modelo'] . "; ";
    if (!empty($rs_reporte[$i]['serie'])) $ch.= "SERIE: " . $rs_reporte[$i]['serie'] . "; ";
    if (!empty($rs_reporte[$i]['color'])) $ch.= "COLOR: " . $rs_reporte[$i]['color'] . "; ";
    if (!empty($rs_reporte[$i]['tipo_bien'])) $ch.= "TIPO: " . $rs_reporte[$i]['tipo_bien'] . "; ";
    if (!empty($rs_reporte[$i]['dimension'])) $ch.= "DIMEN: " . $rs_reporte[$i]['dimension'] . "; ";
    $ch = substr($ch, 0, 60);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(80, 4, $ch, 'TB', 0, '');
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(16, 4, $rs_reporte[$i]['fecha_adq'], 'TB', 0, '');
    $pdf->Cell(16, 4, $rs_reporte[$i]['estado'], 'TB', 0, '');
    $pdf->Cell(18, 4, $rs_reporte[$i]['valor_lib'], 'TB', 0, 'R');
    $pdf->Cell(10, 4, $rs_reporte[$i]['id_depact'], 'TB', 0, '');
    $pdf->Cell(10, 4, substr($rs_reporte[$i]['area'], 0, 6), 'TB', 0, '');
    $pdf->Cell(12, 4, substr($rs_reporte[$i]['oficina'], 0, 6), 'TB', 0, '');
    $pdf->Cell(10, 4, $rs_reporte[$i]['id_asignado'], 'RTB', 1, '');
    $v = $v + $rs_reporte[$i]['valor_lib'];

}
pg_close($reportedet->con_sinv());
$pdf->Cell(60, 4, 'TOTAL DE BIENES:', 1, 0, '');
$pdf->Cell(40, 4, number_format($j, 0, '', ','), 1, 1, '');
$pdf->Cell(60, 4, 'TOTAL DE VALOR EN LIBROS S/.:', 1, 0, '');
$pdf->Cell(40, 4, number_format($v, 2, '.', ','), 1, 1, '');
$pdf->Output();





























$j = 0;
$v = 0;
$pdf->SetDrawColor(128, 128, 128);

for ($i=0; $i <sizeof($rs_reporte) ; $i++) {
  $j++;
  $pdf->Cell(7, 4, $j, 'LTB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['id_patrimonial'], 'TB', 0, '');
  $pdf->Cell(13, 4, $rs_reporte[$i]['id_interno'], 'TB', 0, '');
  $pdf->Cell(80, 4, $rs_reporte[$i]['tipo_equipo'], 'TB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['fecha_adq'], 'TB', 0, '');
  $pdf->Cell(16, 4, $rs_reporte[$i]['estado'], 'TB', 0, '');
  $pdf->Cell(16, 4, $rs_reporte[$i]['valor_lib'], 'TB', 0, 'R');
  $pdf->Cell(60, 4, $rs_reporte[$i]['id_depact'], 'TB', 0, '');
  $pdf->Cell(20, 4, $rs_reporte[$i]['area'], 'TB', 0, '');
  $pdf->Cell(25, 4, $rs_reporte[$i]['oficina'], 'TB', 0, '');
  $pdf->Cell(10, 4, $rs_reporte[$i]['id_asignado'], 'RTB', 1, '');
  $v = $v + $rs_reporte[$i]['valor_lib'];
}
pg_close($reporte->con_sinv());
$pdf->Cell(60, 4, 'TOTAL DE BIENES:', 1, 0, '');
$pdf->Cell(40, 4, number_format($j, 0, '', ','), 1, 1, '');
$pdf->Cell(60, 4, 'TOTAL DE VALOR EN LIBROS S/.:', 1, 0, '');
$pdf->Cell(40, 4, number_format($v, 2, '.', ','), 1, 1, '');
$pdf->Output();




?>
