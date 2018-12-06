<?php
include('../class/historial/p_historial_cls.php');
$clase= new historial;
$id_patrimonial=$_REQUEST["idpat"];
$rs_detalle=$clase->historialSelect($id_patrimonial);
echo  "<table id='detalleConsulta' class='dt table table-codensed table-bordered'>
            <thead>
              <th class='p-0 text-center  bg-grey-200'>Tipo</th>
              <th class='p-0 text-center  bg-grey-200'>Numero</th>
              <th class='p-0 text-center  bg-grey-200'>Registro</th>
              <th class='p-0 text-center  bg-grey-200'>Situación</th>
              <th class='p-0 text-center  bg-grey-200'>Origen</th>
              <th class='p-0 text-center  bg-grey-200'>Destino</th>
              <th class='p-0 text-center  bg-grey-200'>motivo</th>
              <th class='p-0 text-center  bg-grey-200'>Entrega</th>
              <th class='p-0 text-center  bg-grey-200'>Recibe</th>
            </thead>";
for ($i=0; $i <sizeof($rs_detalle) ; $i++) {
echo  "<tr>
        <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>";
        if ($rs_detalle[$i]['mov_tipo'] == '1') {
        echo "INTERNA";
    }
    if ($rs_detalle[$i]['mov_tipo'] == '2') {
        echo "EXTERNA";
    }
    if ($rs_detalle[$i]['mov_tipo'] == '3') {
        echo "MANTENIMIENTO";
    }
    if ($rs_detalle[$i]['mov_tipo'] == '4') {
        echo "CUADRO";
    }
    if ($rs_detalle[$i]['mov_tipo'] == '5') {
        echo "ASIGNACION";
    }
    if ($rs_detalle[$i]['mov_tipo'] == '6') {
        echo "TRASLADO MANUAL";
    }; echo "</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".substr($rs_detalle[$i]['mov_orden'], 1, 8)."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".$rs_detalle[$i]['mov_fecha']."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>";
          if ($rs_detalle[$i]['mov_status'] == 'A') {
              echo "<span class='label label-danger'>Anulado</span>";
          }else if ($rs_detalle[$i]['mov_status'] == 'R') {
              echo "<span class='label label-success'>Recibido</span>";
          }else if ($rs_detalle[$i]['mov_status'] == 'I') {
              echo "<span class='label label-warning'>Pendiente</span>";
          }
          echo
          "</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['source'])."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['target'])."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['motivo'])."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".($rs_detalle[$i]['entrego'])."</td>
          <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>".($rs_detalle[$i]['recibio'])."</td>
          </tr>";
}
echo "</table>
</div>";
?>
