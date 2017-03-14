<?php
$clase= new parametricas;$clase2= new parametricas;$clase3= new parametricas;$clase4= new parametricas;$clase5= new parametricas;
$clase6=new parametricas;$clase7=new parametricas;$clase8=new parametricas;
$clase9= new parametricas;
$rs_marca=$clase->Get_marca();
$rs_tipobien=$clase2->Get_tipo_bien();
$rs_operativo=$clase3->Get_Operativo();
$rs_origen=$clase4->Get_Operativo();
$rs_destino=$clase5->Get_Operativo();
$rs_forma=$clase6->get_tablatipo('FORMA_ADQUISICION');
$rs_estado=$clase7->get_tablatipo('ESTADO_EQUIPO');
$rs_colores=$clase8->get_tablatipo('COLORES');
$rs_personal=$clase9->get_personal_nombre('');
?>
