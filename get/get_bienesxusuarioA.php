<?php
include('../class/bienes/bienesxusuario_cls.php');
$classA= new Asignados;
session_start();
$rs_asignados=$classA->obtenerPepeletas($_SESSION['usr_idper']);
if (sizeof($rs_asignados)>0 ){
  echo  "<table id='tab_asignados' style='height:30px' class='table table-bordered f-s-11' style='cursor: pointer;'>
    <thead>
      <tr>
        <th class='text-center bg-grey-200'>Codigo Patrimonial</th>
        <th class='text-center bg-grey-200'>Descripcion</th>
        <th class='text-center bg-grey-200'>Modelo</th>
        <th class='text-center bg-grey-200'>Marca</th>
        <th class='text-center bg-grey-200'>Serie</th>
        <th class='text-center bg-grey-200'>E</th>
      </tr>
    </thead>
    <tbody>";
 for ($i=0; $i <sizeof($rs_asignados) ; $i++) {
   echo   "<tr>

          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_asignados[$i]['id_patrimonial'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_asignados[$i]['descripcion'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_asignados[$i]['modelo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>" .utf8_encode($rs_asignados[$i]['marca'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_asignados[$i]['serie'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><i style ='color:#2C9943;' title='' class='fa fa-check'></i>
          </td>
          </tr>";
}
  echo  "</tbody>";
echo  "</table>";
} ?>
