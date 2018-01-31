<?php
require '../class/conexion/conexion_cls.php';

class personal extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
	function personalSelect($limit, $offset,$nombre,$apepat,$apemat,$dependencia){
		$sql="select a.ape_paterno as paterno,a.ape_materno as materno,a.nombres,a.dni,a.ruc,a.id_cargo,a.direccion as domicilio,
		(a.direccion ||' ' || u.distrito) as direccion,a.id_area,a.id_personal,
		o.descripcion as operativo, b.descripcion as area, f.descripcion as oficina,
		d.descripcion as cargo,a.fec_nac,a.sexo,a.id_distrito,a.telefono,a.celular,a.est_civil,a.id_oficina,
		a.id_ginst,a.id_profesion,a.id_dep,to_char(a.fec_ing,'dd/mm/yyyy') as fec_ing,a.estado
		from personal a
		left join dependencias o on a.id_dep=o.id_dep
		left join areas b on a.id_area=b.id_area and a.id_dep=b.id_dep
		left join oficinas f on a.id_dep=f.id_dep and a.id_area=f.id_area and a.id_oficina=f.id_oficina
		left join ubigeo u on a.id_distrito=u.ubigeo
		left join tablatipo d on a.id_cargo=d.id_tipo and d.id_tabla='10'
		where a.id_personal<>''";
		if ($nombres!='') {
			$sql=$sql." and a.nombres='" . $nombres . "'";
		}
		if ($apepat!='') {
			$sql=$sql." and a.ape_paterno='" . $apepat . "'";
		}
		if ($apemat!='') {
			$sql=$sql." and a.ape_materno='" . $apemat . "'";
		}
		if ($dependencia!='*') {
			$sql=$sql." and a.id_dep='" . $dependencia . "'";
		}
		$sql=$sql." order by a.ape_paterno,a.ape_materno,a.nombres    limit ".$limit. " offset ".$offset ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function GET_pages($nombre,$apepat,$apemat,$dependencia){
		$sql="Select count(A.*) as cuenta from (select a.ape_paterno as paterno,a.ape_materno as materno,a.nombres,a.dni,a.ruc,a.id_cargo,a.direccion as domicilio,
		(a.direccion ||' ' || u.distrito) as direccion,a.id_area,a.id_personal,
		o.descripcion as operativo, b.descripcion as area, f.descripcion as oficina,
		d.descripcion as cargo,a.fec_nac,a.sexo,a.id_distrito,a.telefono,a.celular,a.est_civil,a.id_oficina,
		a.id_ginst,a.id_profesion,a.id_dep,to_char(a.fec_ing,'dd/mm/yyyy') as fec_ing,a.estado
		from personal a
		left join dependencias o on a.id_dep=o.id_dep
		left join areas b on a.id_area=b.id_area and a.id_dep=b.id_dep
		left join oficinas f on a.id_dep=f.id_dep and a.id_area=f.id_area and a.id_oficina=f.id_oficina
		left join ubigeo u on a.id_distrito=u.ubigeo
		left join tablatipo d on a.id_cargo=d.id_tipo and d.id_tabla='10'
		where a.id_personal<>'' ";
		if ($nombres!='') {
			$sql=$sql." and a.nombres='" . $nombres . "'";
		}
		if ($apepat!='') {
			$sql=$sql." and a.ape_paterno='" . $apepat . "'";
		}
		if ($apemat!='') {
			$sql=$sql." and a.ape_materno='" . $apemat . "'";
		}
		if ($dependencia!='*') {
			$sql=$sql." and a.id_dep='" . $dependencia . "'";
		}
		$sql=$sql." order by a.ape_paterno,a.ape_materno,a.nombres)A";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
?>
