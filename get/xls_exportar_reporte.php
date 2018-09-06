<?php header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=bienesactivosgeneral.xls");
require '../class/reportes/Reportes.php' ;
$reporte= new Reporte;
$rs_reporte=$reporte->Select_Reporte_Bienes($_REQUEST['0'],$_REQUEST['1'],$_REQUEST['2'],$_REQUEST['3'],$_REQUEST['4'],$_REQUEST['5'],$_REQUEST['6'],$_REQUEST['7'],$_REQUEST['8'],$_REQUEST['9']);
$j=0;
$v=0;
echo '<html>
<title>Reporte</title>
<head></head>
<body>
<table width="200" border="1" cellspacing="1" cellpadding="1">
<tr><td colspan="11" align="center">REPORTE DE BIENES ACTIVOS GENERAL</td></tr>
';
if ($_GET['0'] <> '') {
    echo "<tr><td>USUARIO:</td><td>" . $_GET['utarget'] . "</td></tr>";
}
if ($_GET['1'] <> '') {
    echo "<tr><td>LOCAL:</td><td>" . $_GET['ltarget'] . "</td></tr>";
}
if ($_GET['2'] <> '') {
    echo "<tr><td>AREA:</td><td>" . $_GET['atarget'] . "</td></tr>";
}
if ($_GET['3'] <> '') {
    echo "<tr><td>OFICINA:</td><td>" . $_GET['otarget'] . "</td></tr>";
};
echo '
  <tr>
    <td>ITEM</td>
    <td>ID PATRIMONIAL</td>
    <td>ID INTERNO</td>
    <td>TIPO DE BIEN</td>
    <td>FECHA DE ADQ</td>
    <td>ESTADO</td>
    <td>VALOR EN LIBROS</td>
    <td>LOCAL</td>
    <td>AREA</td>
    <td>OFICINA</td>
    <td>FUNCIONARIO</td>
  </tr>

';
for ($i=0; $i <sizeof($rs_reporte) ; $i++) {
    $j++;
  echo '<tr>
<td nowrap="nowrap">';
  echo $j;;
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['id_patrimonial'];
  echo ' </td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['id_interno'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['tipo_equipo'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['fecha_adq'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['estado'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['valor_lib'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['id_depact'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['area'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['oficina'];
  echo '</td>
<td nowrap="nowrap">';
  echo $rs_reporte[$i]['id_asignado'];
  echo '</td> ';
  $v = $v + $rs_reporte[$i]['valor_lib'];
  echo '</tr>';
}


echo '<tr><td nowrap="nowrap" colspan="2">TOTAL DE BIENES</td><td colspan="9">';
echo number_format($j, 0, '', ',');;
echo '</td></tr>
<tr><td nowrap="nowrap" colspan="2">TOTAL VALOR EN LIBROS S/.</td><td colspan="9">';
echo number_format($v, 2, '.', ',');;
echo '</td></tr>
</table>
</body>
</html>
';
