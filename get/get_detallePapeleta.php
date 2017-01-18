<?php
include('../class/bienes/bienesxusuario_cls.php');
$clase= new Pendientes;
$rs_detalle=$clase->obtenerBienes($_REQUEST["orden"]);
echo  "<div class='detallePapeleta'>
  <table class='table table-bordered table-condensed f-s-11'>
    <thead>
      <tr>
        <th class='p-3 text-center bg-grey-200'>Codigo</th>
        <th class='p-3 text-center bg-grey-200'>Descripción</th>
        <th class='p-3 text-center bg-grey-200'>Modelo</th>
        <th class='p-3 text-center bg-grey-200'>Marca</th>
        <th class='p-3 text-center bg-grey-200'>Serie</th>
      </tr>
    </thead>";
for ($i=0; $i <sizeof($rs_detalle) ; $i++) {
echo  "<tr>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['id_patrimonial'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>".utf8_encode($rs_detalle[$i]['descripcion'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['modelo'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['marca'])."</td>
          <td class='p-3 f-s-11 text-center m-r-10 m-l-10'> ".utf8_encode($rs_detalle[$i]['serie'])."</td>
          </td>
          </tr>";
}
echo "</table>
</div>";
?>
