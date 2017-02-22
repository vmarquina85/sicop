<?php
require '../class/conexion/conexion_cls.php';

class historial extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
	function historialSelect($idp){
		$sql="select distinct A.* from (Select  e.descripcion as source,g.descripcion as target,a.mov_tipo,a.mov_orden,
a.mov_status,to_timestamp(to_char(a.mov_fecha,'dd/mm/yy HH24:MI'),'dd/mm/yy HH24:MI') as mov_fecha,b.descripcion as motivo,
to_char(a.mov_fecing,'dd/mm/yy HH24:MI') as mov_fecing,
(c.ape_paterno || ' ' || c.ape_materno || ', ' || c.nombres) as entrego,
(d.ape_paterno || ' ' || d.ape_materno || ', ' || d.nombres) as recibio,
aso.descripcion as area_src, at.descripcion as area_tar
from cab_mov a
inner join det_mov det on a.mov_orden=det.det_orden
inner join equipos eq on eq.id_alterno=det.det_equipo
inner join motivos b on a.mov_motivo=b.id_motivo
left join personal c on a.mov_personal=c.id_personal
left join personal d on a.mov_transpo=d.id_personal
left join dependencias e on a.mov_src=e.id_dep
left join dependencias g on a.mov_tar=g.id_dep
left join areas aso on a.mov_areaper=aso.id_area and a.mov_src=aso.id_dep
left join areas at on a.mov_areatra=at.id_area and a.mov_tar=at.id_dep
where eq.id_patrimonial='" . $idp . "')A  order by a.mov_fecha desc";
// 		$sql="Select e.descripcion as source,g.descripcion as target,a.mov_tipo,a.mov_orden,
// a.mov_status,to_char(a.mov_fecha,'dd/mm/yyyy') as mov_fecha,b.descripcion as motivo,
// to_char(a.mov_fecing,'dd/mm/yy HH24:MI') as mov_fecing,
// (c.ape_paterno || ' ' || c.ape_materno || ', ' || c.nombres) as entrego,
// (d.ape_paterno || ' ' || d.ape_materno || ', ' || d.nombres) as recibio,
// aso.descripcion as area_src, at.descripcion as area_tar
// from cab_mov a
// inner join det_mov det on a.mov_orden=det.det_orden
// inner join equipos eq on eq.id_alterno=det.det_equipo
// inner join motivos b on a.mov_motivo=b.id_motivo
// left join personal c on a.mov_personal=c.id_personal
// left join personal d on a.mov_transpo=d.id_personal
// left join dependencias e on a.mov_src=e.id_dep
// left join dependencias g on a.mov_tar=g.id_dep
// left join areas aso on a.mov_areaper=aso.id_area and a.mov_src=aso.id_dep
// left join areas at on a.mov_areatra=at.id_area and a.mov_tar=at.id_dep
// where eq.id_patrimonial='" . $idp . "' order by a.mov_fecha desc";
								$res=pg_query(parent::con_sinv(),$sql);
								while($reg=pg_fetch_assoc($res)){
									$this->t[]=$reg;
								}
								return $this->t;
	}
	function personalAsignado($idp){
		$sql="select nombres||' '||ape_paterno||' '||ape_materno as asignado from personal
		where id_personal in (select id_asignado from  equipos where id_patrimonial='" . $idp . "')";
								$res=pg_query(parent::con_sinv(),$sql);
								while($reg=pg_fetch_assoc($res)){
									$this->t[]=$reg;
								}
								return $this->t;
	}







}
?>
