<?php
include('../class/bienes/bienesxusuario_cls.php');
$classR= new Rechazados;
session_start();
$rs_rechazados=$classR->obtenerPepeletas($_SESSION['usr_idper']);
if (sizeof($rs_rechazados)>0 ){
  echo  "<div class='panel-body' id='tab_rechazados'>
  <div class='table-responsive'>
    <table id='table-rechazados'  class='table table-bordered table-hover f-s-11'>
    <thead>
      <tr>
        <th class='p-3 text-center bg-grey-200'>Nro</th>
        <th class='p-3 text-center bg-grey-200'>Fecha</th>
        <th class='p-3 text-center bg-grey-200'>Origen</th>
        <th class='p-3 text-center bg-grey-200'>Destino</th>
        <th class='p-3 text-center bg-grey-200'>Motivo</th>
        <th class='p-3 text-center bg-grey-200'>Envía</th>
        <th class='p-3 text-center bg-grey-200'>Recepciona</th>
        <th class='p-3 text-center bg-grey-200'>E</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($rs_rechazados) ; $i++) {
   echo   "<tr>

          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_rechazados[$i]['mov_orden'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_rechazados[$i]['mov_fecha'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_rechazados[$i]['source'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_rechazados[$i]['target'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_rechazados[$i]['motivo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>" .utf8_encode($rs_rechazados[$i]['entrego'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_rechazados[$i]['recibio'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><span class='label label-danger'>Rechazado</span>
          </td>
          </tr>";
}
  echo  "</tbody>";
echo  "</table>
</div>
</div>";
}?>
