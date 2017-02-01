<?php
include('../class/personal/p_personal_cls.php');
$clase= new personal;
$rs_detalle=$clase->personalSelect();
echo  "<table id='tb_personal' class='dt table table-codensed table-bordered'>
            <thead>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='p-0 text-center  bg-grey-200'></th>
              <th class='text-center  bg-grey-200'>Paterno</th>
              <th class='text-center  bg-grey-200'>Materno</th>
              <th class='text-center  bg-grey-200'>Nombres</th>
              <th class='text-center  bg-grey-200'>Dni</th>
              <th class='text-center  bg-grey-200'>RUC</th>
              <th class='text-center  bg-grey-200'>Dirección</th>
              <th class='text-center  bg-grey-200'>Dependencia</th>
              <th class='text-center  bg-grey-200'>Area</th>
              <th class='text-center  bg-grey-200'>Cargo</th>
              <th class='text-center  bg-grey-200'>Estado</th>
              <th class='text-center  bg-grey-200'>Id</th>
            </thead>";
for ($i=0; $i <sizeof($rs_detalle) ; $i++) {
echo  "<tr>
  <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><img src='../assets/img/user_edit.png' alt='' /> </td>
    <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><img src='../assets/img/cancel.png' alt='' /> </td>
      <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><img src='../assets/img/house.png' alt='' /> </td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['paterno'])."</td>
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
echo "</table>
</div>";
?>
