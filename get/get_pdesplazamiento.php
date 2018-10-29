<?php
require '../class/desplazamiento/pdesplazamiento_cls.php';
$desp = new desplazamiento;
$tam = $_REQUEST["limit"];
$inicio = $_REQUEST["offset"];
$numero = $_REQUEST["numero"];
$origen = $_REQUEST["origen"];
$destino = $_REQUEST["destino"];
$estado = $_REQUEST["estado"];
$mov_tipo = $_REQUEST["motivo"];
$rs_desp = $desp->Get_desplazamiento($tam, $inicio, $numero, $origen, $destino, $estado, $mov_tipo);
?>
<tbody id='tb_detalle_bienes'>
<?php for ($i = 0; $i < sizeof($rs_desp); $i++) { ?>
        <tr>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'  onclick='imprimir(this)'>
                <a href="javascript:;">
                    <img src="../assets/img/printer.png" alt="">
                </a>
            </td>
<td class='p-2 f-s-11 text-center m-r-10 m-l-10 hide'><?php echo utf8_encode($rs_desp[$i]["mov_tipo"]); ?></td>
<td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["prefijo"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["numero"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["mov_fecha"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["source"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["target"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["motivo"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["entrego"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo ($rs_desp[$i]["recibio"]); ?></td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php
            if ($rs_desp[$i]["mov_status"] == 'A') {
                echo "<span class='label label-danger'>Anulado</span>";
            } else if ($rs_desp[$i]["mov_status"] == 'R') {
                echo "<span class='label label-success'>Recibido</span>";
            } else if ($rs_desp[$i]["mov_status"] == 'I') {
                echo "<span class='label label-warning'>Pendiente</span>";
            };
            ?>
            </td>
            <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["mov_fecing"]); ?></td>
        </tr>
<?php }; ?>
</tbody>
