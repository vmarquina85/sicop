<?php include 'clases/library.class.php';
session_start();
$idusuariox = $_SESSION['usr_id'];
$id_distx = $_POST['id_dist'];
$nombrex = strtoupper($_POST['nombre']);
$paternox = strtoupper($_POST['paterno']);
$maternox = strtoupper($_POST['materno']);
$dnix = $_POST['dni'];
$rucx = $_POST['ruc'];
$fec_nacx = $_POST['fec_nac'];
$direccionx = strtoupper($_POST['direccion']);
$telefonox = $_POST['telefono'];
$celularx = $_POST['celular'];
$est_civx = $_POST['est_civ'];
$g_instx = $_POST['g_inst'];
//$fec_ingx=$_POST['fec_ing'];
$id_cargox = $_POST['id_cargo'];
$id_profx = $_POST['id_prof'];
$id_depex = $_POST['id_depe'];
$id_areax = $_POST['id_area'];
$sexox = $_POST['sexo'];
$id_oficinax = $_POST['id_oficina'];
//$mesdesde = substr($fec_ingx,3,2);
//$diadesde = substr($fec_ingx,0,2);
//$aniodesde =substr($fec_ingx,6,4);
//$fechax=$aniodesde."/".$mesdesde."/".$diadesde;
$db = conectar();

$find = "select dni from personal where dni='" . $dnix . "'";
$rs = pg_query($db, $find);
$nr = pg_num_rows($rs);
if ($nr > 0) {
    echo $bodyone . "Nro de DNI ya existe por favor..." . $bodytwo;
    exit();
}
$max = "Select case when maximo is null then 1 else maximo end  from (select max(cast(trim(id_personal) as int)) + 1 as maximo from personal)x";
$resultado = pg_query($db, $max);
$arra = pg_fetch_array($resultado, 0);
$id_persx = $arra['maximo'];
//insertando en data
$insertar = "insert into personal(id_personal, nombres, ape_paterno, ape_materno, dni, sexo, fec_nac, direccion, id_distrito, telefono, celular, est_civil, id_area, id_ginst, id_profesion, estado, id_cargo, us_crea, fec_crea, ruc, id_dep, id_oficina)
		  values('" . $id_persx . "','" . $nombrex . "','" . $paternox . "','" . $maternox . "','" . $dnix . "','" . $sexox . "','" . $fec_nacx . "','" . $direccionx . "','" . $id_distx . "','" . $telefonox . "','" . $celularx . "','" . $est_civx . "','" . $id_areax . "','" . $g_instx . "','" . $id_profx . "','1','" . $id_cargox . "','" . $idusuariox . "', now(),'" . $rucx . "','" . $id_depex . "', '" . $id_oficinax . "')";
$nrequest = pg_query($db, $insertar);
//insertando en locaxfun
$ins = "insert into localxfun(id_personal,id_dep,id_area,usr_registra,fec_registro,id_cargo,
id_oficina,flag_def) values('" . $id_persx . "','" . $id_depex . "','" . $id_areax . "','" . $idusuariox . "',now(),'" . $id_cargox . "','" . $id_oficinax . "','1')";
pg_query($db, $ins);
pg_close($db);
header("Location:main_personal.php");
