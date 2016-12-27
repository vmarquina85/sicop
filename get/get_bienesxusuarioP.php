<?php
include('../class/bienes/bienesxusuario_cls.php');
$classP= new Pendientes;
session_start();
$rs_pendientes=$classP->obtenerBienes($_SESSION['usr_idper']);
if (sizeof($rs_pendientes)>0 ){
  echo  "<table id='tab_pendientes' class='table table-bordered f-s-11' style='cursor: pointer;'>
    <thead>
      <tr>
        <th class='p-3 text-center bg-grey-200'>Nro</th>
        <th class='p-3 text-center bg-grey-200'>Fecha</th>
        <th class='p-3 text-center bg-grey-200'>Descripcion</th>
        <th class='p-3 text-center bg-grey-200'>Modelo</th>
        <th class='p-3 text-center bg-grey-200'>Marca</th>
        <th class='p-3 text-center bg-grey-200'>Serie</th>
        <th class='p-3 text-center bg-grey-200'>E</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($rs_pendientes) ; $i++) {
   echo   "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_pendientes[$i]['det_orden'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['mov_fecha'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['descripcion'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['modelo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>" .utf8_encode($rs_pendientes[$i]['marca'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_pendientes[$i]['serie'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><i style ='color:#FFBA37;' title='' class='fa fa-exclamation-triangle'></i>
          </td>
          </tr>";
}
  echo  "</tbody>";
echo  "</table>";
} ?>
