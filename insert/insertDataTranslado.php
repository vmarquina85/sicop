<?php require '../class/conexion/conexion_cls.php';
session_start();
$mov_tipo=$_GET['mov_tipo'];
$fecha=$_GET['fecha'];
$motivo=$_GET['motivo'];
$matriz=$_SESSION["matriz"];
//datos destino
$con = new conectar;
$cn=$con->con_sinv();
$generado = '';
//Busca el maximo y aumenta en una unidad

//$arreglo=pg_fetch_array($result,0);
//$generado='C'.$arreglo["maximo"];
if ($mov_tipo==1) {
  $cad3 = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(mov_orden,2,7)) as int)) + 1 as maximo	from cab_mov where mov_tipo='".$mov_tipo."')x";
  $rs = pg_query($cn, $cad3);
$generado = 'I' . pg_fetch_result($rs, 0, 'maximo');
}elseif ($mov_tipo==2) {
  $cad3 = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(mov_orden,2,7)) as int)) + 1 as maximo	from cab_mov where mov_tipo='".$mov_tipo."')x";
  $rs = pg_query($cn, $cad3);
$generado = 'E' . pg_fetch_result($rs, 0, 'maximo');
}elseif ($mov_tipo==3) {
  $cad3 = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(substring(mov_orden,2,7)) as int)) + 1 as maximo	from cab_mov where mov_tipo='".$mov_tipo."')x";
  $rs = pg_query($cn, $cad3);
$generado = 'M' . pg_fetch_result($rs, 0, 'maximo');
}

$retu = pg_fetch_result($rs, 0, 'maximo');
$cad1 = "Insert into cab_mov(mov_fecha,mov_tipo,mov_orden,mov_usring,mov_fecing,mov_motivo,mov_transpo,
mov_personal,mov_areaper,mov_src,mov_areatra,mov_carper,mov_cartra,
mov_tar,mov_ofitra,mov_ofiper,mov_status) values(now()::timestamp,'". $mov_tipo ."','" . $generado . "','" . rtrim($_SESSION['sicop_usr_id']) . "',now(),'".$motivo."','" . rtrim($_GET['recibe']) . "','" . rtrim($_SESSION['usr_idper']) . "','" . rtrim($_SESSION['id_area']) . "','" . rtrim($_SESSION['id_dep']) . "','" . rtrim($_GET['area_d']) . "','" . rtrim($_SESSION['id_cargo']) . "','" . rtrim($_GET['cargo']) . "','" . rtrim($_GET['destino']) . "','" . rtrim($_GET['oficina_d']) . "','" . rtrim( $_SESSION['id_oficina']) . "','I')";
pg_query($cn, $cad1);
//Graba detalle
$ni = count($matriz);
for ($i = 0;$i < $ni;$i++) {
    $id_equipo = $matriz[$i]['id_alterno'];
    //$id_proced=$matriz[$i][8];
    $id_estado = $matriz[$i]['id_estado'];
    $obs = $matriz[$i]['obs'];
    $cad2 = "Insert into det_mov values('" . $generado . "','" . rtrim($id_equipo) . "','" . rtrim($id_estado) . "','" . rtrim($obs) . "')";
    pg_query($cn, $cad2);
}
echo json_decode($retu);
pg_close($cn);
 ?>
