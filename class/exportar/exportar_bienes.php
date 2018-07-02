<?php header("Content-type: application/vnd.ms-excel");
if (!ini_get('register_globals')) {
$superglobals = array($_SERVER, $_ENV,
$_FILES, $_COOKIE, $_POST, $_GET);
if (isset($_SESSION)) {
array_unshift($superglobals, $_SESSION);
}
foreach ($superglobals as $superglobal) {
extract($superglobal, EXTR_SKIP);
}
}
header("Content-Disposition: attachment;filename=Bienes.xls");
include '../conexion/conexion_cls.php';
require '../config/session_val.php';
echo '<html>
<title>Reporte</title>
<head></head>
<body>
';
$conexion= new conectar;
$cn = $conexion->con_sinv();
$cad = "Select p.descripcion as dependencia, a.id_areact, a.id_depact, a.id_ofiact,o.descripcion as oficina, a.id_alterno, a.id_patrimonial, a.serie, a.modelo,
a.observacion, a.id_estado, a.id_hardware, a.id_marca, a.id_color,to_char(a.fec_registro,'dd/mm/yy HH24:MI') as fechar,
b.descripcion as tipo_equipo, d.descripcion as marca, e.descripcion as color, f.descripcion as estado, cc.tipo_cta as tip_c, cc.tip_uso_cta,
g.descripcion as grupo,cl.descripcion as clase,a.doc_alta,
r.descripcion as area, (s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres) as personal,u.usr_login,um.usr_login as modificado,
a.tipo_cta,a.cuenta,a.forma_adq,to_char(a.fecha_adq,'dd/mm/yyyy') as fecha_adq,a.id_interno,a.doc_alta,a.valor_lib,a.valor_tasa,
a.asegurado,a.id_asignado,a.tipo_bien,a.nro_motor,a.nro_chasis,a.placa,a.est_bien ,a.dimension
from equipos a
inner join dependencias p on a.id_depact=p.id_dep
left join areas r on a.id_depact=r.id_dep and a.id_areact=r.id_area
left join oficinas o on a.id_depact=o.id_dep and a.id_areact=o.id_area and a.id_ofiact=o.id_oficina
left join personal s on a.id_asignado=s.id_personal
left join usuarios u on a.usr_registra=u.usr_id
left join usuarios um on a.usr_modifica=um.usr_id
left join tablatipo b on a.id_hardware=b.id_tipo and b.id_tabla='5'
left join tablatipo d on a.id_marca=d.id_tipo and d.id_tabla='6'
left join tablatipo e on a.id_color=e.id_tipo and e.id_tabla='7'
left join tablatipo f on a.id_estado=f.id_tipo and f.id_tabla='9'
left join cuentac cc on a.cuenta=cc.cuenta
left join grupos g on substring(a.id_patrimonial,1,2)=g.id_grupo
left join clases cl on substring(a.id_patrimonial,3,2)=cl.id_clase
where a.est_bien<>'E' ";

if (!empty($serie)) $cad= $cad. "and a.serie like '%" . trim($serie) . "%' ";
if (!empty($id_interno)) $cad= $cad. "and a.id_interno like '%" . $id_interno . "%' ";
if (!empty($oc))  $cad= $cad. "and upper(doc_alta) like '%" . strtoupper(trim($oc)) . "%' ";
if (!empty($id_local)) {
    if ($id_local <> "*")  {
    	$cad= $cad. "and a.id_depact='" . $id_local . "' ";
}
}
if (!empty($id_hard)) {
    if ($id_hard <> "*") {
        $id_tip = trim(substr($id_hard, (strpos($id_hard, '@') + 1), 6));
        $cad.= "and a.id_hardware='" . $id_tip . "' ";
    }
}
if (!empty($id_marc)) {
    if ($id_marc <> "*") $cad.= "and a.id_marca='" . $id_marc . "' ";
}
if (!empty($asignado)) {
    if ($asignado <> "*") {
        if ($asignado == 'A') {
            $cad.= "and a.id_asignado<>'' ";
        } elseif ($asignado = 'N') {
            $cad.= "and a.id_asignado='' ";
        }
    }
}
//
if (!empty($est_bien)) {
    if ($est_bien <> "*") {
        if ($est_bien == 'A') {
            $cad.= "and a.est_bien='A' ";
        } elseif ($est_bien == 'B') {
            $cad.= "and a.est_bien='B' ";
        }
    }
}
//
$cad.= " order by b.descripcion,a.id_patrimonial";
$result = pg_query($cn, $cad);
echo '<table border="1">
<tr>
<td class="bg-grey">CODIGO PATRIMONIAL</td><td class="bg-grey">DESCRIPCION</td><td class="bg-grey">MARCA</td><td class="bg-grey">MODELO</td><td class="bg-grey">COLOR</td><td class="bg-grey">SERIE</td><td class="bg-grey">ESTADO FISICO</td>
<td class="bg-grey">ID INTERNO</td><td class="bg-grey">VALOR ADQ</td><td class="bg-grey">VALOR LIBROS</td><td class="bg-grey">FECHA ADQ</td><td class="bg-grey">DOC ALTA</td><td class="bg-grey">CUENTA</td><td class="bg-grey">ACT/BAJ/ELI</td>
<td class="bg-grey">FECHA BAJA</td><td class="bg-grey">RESOL BAJA</td><td class="bg-grey">ID LOCAL</td><td class="bg-grey">LOCAL</td>
<td class="bg-grey">ID AREA</td><td class="bg-grey">AREA</td><td class="bg-grey">ID OFICINA</td><td class="bg-grey">OFICINA</td><td class="bg-grey">FUNCIONARIO</td><td class="bg-grey">ASEGURADO</td><td class="bg-grey">NRO MOTOR</td><td class="bg-grey">PLACA</td>
</tr>
';
while ($row = pg_fetch_array($result)) {
    echo '<tr>
<td>';
    echo $row["id_patrimonial"];
    echo '</td>
<td>';
    echo $row["tipo_equipo"];
    echo '</td>
<td>';
    echo $row["marca"];
    echo '</td>
<td>';
    echo $row["modelo"];
    echo '</td>
<td>';
    echo $row["color"];
    echo '</td>
<td>';
    echo $row["serie"];
    echo '</td>
<td>';
    echo $row["estado"];
    echo '</td>
<td>';
    echo $row["id_interno"];
    echo '</td>
<td>';
    echo $row["valor_tasa"];
    echo '</td>
<td>';
    echo $row["valor_lib"];
    echo '</td>
<td>';
    echo $row["fecha_adq"];
    echo '</td>
<td>';
    echo $row["doc_alta"];
    echo '</td>
<td>';
    echo $row["cuenta"];
    echo '</td>
<td>';
    echo $row["est_bien"];
    echo '</td>
<td>';
    echo $row["fecha_baja"];
    echo '</td>
<td>';
    echo $row["resol_baja"];
    echo '</td>
<td>';
    echo $row["id_depact"];
    echo '</td>
<td>';
    echo $row["dependencia"];
    echo '</td>
<td>';
    echo $row["id_areact"];
    echo '</td>
<td>';
    echo $row["area"];
    echo '</td>
<td>';
    echo $row["id_ofiact"];
    echo '</td>
<td>';
    echo $row["oficina"];
    echo '</td>
<td>';
    echo $row["personal"];
    echo '</td>
<td>';
    echo $row["asegurado"];
    echo '</td>
<td>';
    echo $row["nro_motor"];
    echo '</td>
<td>';
    echo $row["placa"];
    echo '</td>
</tr>';
}
pg_free_result($result);
pg_close($cn);
echo '</table>
</body></html>';
