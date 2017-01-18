<?php
require '../class/conexion/conexion_cls.php';
class Pendientes extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
	function obtenerPepeletas($idpersonal){
$sql="Select e.descripcion as source,g.descripcion as target,a.mov_tar,a.mov_areatra,a.mov_ofitra,
				a.mov_status,a.mov_src,a.mov_orden,to_char(a.mov_fecha,'dd/mm/yyyy') as mov_fecha,b.descripcion as motivo,
				a.mov_motivo,a.mov_personal,a.mov_transpo,to_char(a.mov_fecing,'dd/mm/yy HH24:MI') as mov_fecing,
				(c.ape_paterno || ' ' || c.ape_materno || ', ' || c.nombres) as entrego,c.dni as dni_entrega,
				(d.ape_paterno || ' ' || d.ape_materno || ', ' || d.nombres) as recibio,d.dni as dni_recibe,
				aso.descripcion as area_src, at.descripcion as area_tar, os.descripcion as oficina_src, ot.descripcion as oficina_tar,
				ce.descripcion as cargo_entrega, cr.descripcion as cargo_recibe
				from cab_mov a inner join motivos b on a.mov_motivo=b.id_motivo
				inner join personal c on a.mov_personal=c.id_personal
				inner join personal d on a.mov_transpo=d.id_personal
				inner join dependencias e on a.mov_src=e.id_dep
				inner join dependencias g on a.mov_tar=g.id_dep
				inner join areas aso on a.mov_areaper=aso.id_area and a.mov_src=aso.id_dep
				inner join areas at on a.mov_areatra=at.id_area and a.mov_tar=at.id_dep
				inner join oficinas os on a.mov_areaper=os.id_area and a.mov_src=os.id_dep and a.mov_ofiper=os.id_oficina
				inner join oficinas ot on a.mov_areatra=ot.id_area and a.mov_tar=ot.id_dep and a.mov_ofitra=ot.id_oficina
				inner join tablatipo ce on a.mov_carper=ce.id_tipo and ce.id_tabla='10'
				inner join tablatipo cr on a.mov_cartra=cr.id_tipo and cr.id_tabla='10'
				where a.mov_transpo='".$idpersonal."' AND a.mov_status='I'";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function obtenerBienes($orden){
$sql="select e.id_patrimonial,b.descripcion,e.modelo,m.descripcion as marca,e.serie from det_mov d
						left join cab_mov c on c.mov_orden=d.det_orden
						left join equipos e on e.id_alterno=d.det_equipo
						left join tablatipo b on e.id_hardware=b.id_tipo and b.id_tabla='5'
						left join tablatipo m on e.id_marca=m.id_tipo and m.id_tabla='6'
						where d.det_orden ='".$orden."'";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function AceptarBienes($orden){
session_start();
 $sql="update cab_mov set mov_status='R' where mov_orden='".$orden."'";
	pg_query(parent::con_sinv(),$sql);
 $sql2="update equipos set fec_modifica=current_date, id_asignado='".$_SESSION['usr_idper']."',id_depact='".$_SESSION['id_dep']."',id_areact='".$_SESSION['id_area']."',id_ofiact='".$_SESSION['id_oficina']."'  where id_alterno in (select det_equipo from det_mov where det_orden='".$orden."')";
 	pg_query(parent::con_sinv(),$sql2);
	}
}
/**
 *
 */
class Asignados extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
	function obtenerPepeletas($idpersonal){
		$sql="select e.id_patrimonial,b.descripcion,e.modelo,m.descripcion as marca,e.serie
from  equipos e
left join tablatipo b on e.id_hardware=b.id_tipo and b.id_tabla='5'
left join tablatipo m on e.id_marca=m.id_tipo and m.id_tabla='6'
where e.id_asignado='".$idpersonal."'";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}


?>
