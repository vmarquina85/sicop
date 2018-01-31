<?php
require "../class/parametricas/entidad_parametrica_cls.php";
$clase= new parametricas;
$rs_operativo=$clase->Get_Operativo();
$rs_departamento=$clase->get_departamentos();
$rs_estadoCivil=$clase->get_tablatipo('ESTADO_CIVIL');
$rs_GradoInst=$clase->get_tablatipo('GRADO_INSTRUCCION');
$rs_Profesion=$clase->get_tablatipo('PROFESIONES');
$rs_cargo=$clase->get_tablatipo('CARGO_LABORAL');
?>
