<?php
include('../class/bienes/bienesxusuario_cls.php');
$classP= new Pendientes;
session_start();
$rs_pendientes=$classP->obtenerPepeletas($_SESSION['usr_idper']);
if (sizeof($rs_pendientes)>0 ){
  echo  "<div class='panel-body' id='tab_pendientes'>
  <div class='table-responsive'>
  <button id='mark_all' class='btn btn-warning btn-xs'><i class='fa fa-check-square-o'></i> Marcar todos</button>
  <br>
  <br>
  <table id='table-pendientes'  class='table table-bordered table-hover f-s-11'>
    <thead>
      <tr>
      <th class='p-3 text-center bg-grey-200'></th>
      <th class='p-3 text-center bg-grey-200'></th>
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
 for ($i=0; $i <sizeof($rs_pendientes) ; $i++) {
   echo   "<tr>
     <td style='cursor: pointer;' class='p-3 f-s-11 text-center m-r-10 m-l-10' title='Ver Bienes' onclick='VerDetalles(this)'><i class='fa fa-eye hover-blue'></i></td>
     <td style='cursor: pointer; color: rgba(255,255,255,0)' class='p-3 f-s-11 text-center m-r-10 m-l-10' title='Seleccionar' onclick='seleccionar(this)'><i id='$i' class='fa fa-check'></i></td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_pendientes[$i]['mov_orden'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_pendientes[$i]['mov_fecha'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['source'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['target'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['motivo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>" .utf8_encode($rs_pendientes[$i]['entrego'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['recibio'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><i style ='color:#FFBA37;' title='' class='fa fa-exclamation-triangle'></i>
          </td>
          </tr>";
}
  echo  "</tbody>";
echo  "</table>
</div>
<span class='pull-right'>
  <button id='aceptarPendientes' onclick='AceptarPapeletas()' class='btn btn-success btn-xs'>Aceptar</button>
  <button class='btn btn-danger btn-xs'>Rechazar</button>
</span>
</div>";
}?>
