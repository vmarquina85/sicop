<?php
$clase= new parametricas;
$rs_marca=$clase->Get_marca();
$rs_tipobien=$clase->Get_tipo_bien();
$rs_operativo=$clase->Get_Operativo();
$rs_origen=$clase->Get_Operativo();
$rs_destino=$clase->Get_Operativo();
$rs_forma=$clase->get_tablatipo('FORMA_ADQUISICION');
$rs_estado=$clase->get_tablatipo('ESTADO_EQUIPO');
$rs_colores=$clase->get_tablatipo('COLORES');
$rs_personal=$clase->get_personal_nombre('');
$rs_personal_edit=$clase->get_personal_nombre_edit('');
$rs_cuentac_noFilter=$clase->Get_cuentaContable_noFilter();
?>
