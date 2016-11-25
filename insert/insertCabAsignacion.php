<?php require '../class/conexion/conexion_cls.php';
session_start();

$fecha=$_GET['fecha'];
//datos destino 
$con = new conectar;
$cn=$con->con_sinv();
$generado = '';
//Busca el maximo y aumenta en una unidad
$cad3 = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(mov_orden,2,7)) as int)) + 1 as maximo	from cab_mov where mov_tipo='5')x";
$rs = pg_query($cn, $cad3);
//$arreglo=pg_fetch_array($result,0);
//$generado='C'.$arreglo["maximo"];
$generado = 'A' . pg_fetch_result($rs, 0, 'maximo');
$retu = pg_fetch_result($rs, 0, 'maximo');
$cad1 = "Insert into cab_mov(mov_fecha,mov_tipo,mov_orden,mov_usring,mov_fecing,mov_motivo,mov_transpo,
mov_personal,mov_areaper,mov_src,mov_areatra,mov_carper,mov_cartra,
mov_tar,mov_ofitra,mov_ofiper,mov_status) values('" . $fecha . "','5','" . $generado . "','" . rtrim($_SESSION['usr_id']) . "',now(),'2','" . rtrim($_GET['recibe']) . "','" . rtrim($_SESSION['usr_idper']) . "','" . rtrim($_SESSION['id_area']) . "','" . rtrim($_SESSION['id_dep']) . "','" . rtrim($_GET['id_arearecibe']) . "','" . rtrim($_SESSION['id_cargo']) . "','" . rtrim($_GET['cargo']) . "','" . rtrim($_GET['destino']) . "','" . rtrim($_GET['oficina_d']) . "','" . rtrim( $_SESSION['id_oficina']) . "','I')";
pg_query($cn, $cad1);
echo $retu;


 ?>