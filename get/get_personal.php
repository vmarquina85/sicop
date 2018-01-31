<?php
include('../class/personal/p_personal_cls.php');
$clase= new personal;
$limit=$_REQUEST['limit'];
$offset=$_REQUEST['offset'];
$nombre=$_REQUEST['nombre'];
$apepat=$_REQUEST['apepat'];
$apemat=$_REQUEST['apemat'];
$dependencia=$_REQUEST['dependencia'];
$rs_detalle=$clase->personalSelect($limit, $offset,$nombre,$apepat,$apemat,$dependencia);
for ($i=0; $i <sizeof($rs_detalle) ; $i++) {
echo  "<tr>
  <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><img src='../assets/img/user_edit.png' alt='' /> </td>
    <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><img src='../assets/img/cancel.png' alt='' /> </td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_decode($rs_detalle[$i]['paterno'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['materno'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['nombres'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['dni'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['ruc'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['domicilio'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['operativo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['area'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['cargo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['estado'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['id_personal'])."</td>
          </td>
          </tr>";
}
?>
