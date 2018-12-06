<?php
include('../class/historial/p_historial_cls.php');
$clase= new historial;
$id_patrimonial=$_REQUEST["idpat"];
$rs_detalle=$clase->personalAsignado($id_patrimonial);
echo "<div class='note note-warning'>";
  echo "<label>Asignado Actualmente a:</label>";
  echo "<h4>".ucwords(strtolower((@$rs_detalle[0]['asignado'])))."</h4>";
echo "</div>";
?>
