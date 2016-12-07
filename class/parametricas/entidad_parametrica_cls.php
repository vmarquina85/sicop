<?php 
require '../class/conexion/conexion_cls.php';

class parametricas extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}

	function Get_marca(){
		$sql="select id_tipo, descripcion from tablatipo where id_tabla='6' order by 2" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;	

	}

	function Get_tipo_bien(){
		$sql="select distinct b.descripcion,b.id_tipo,b.prefijo from equipos a inner join tablatipo b on a.id_hardware=b.id_tipo and b.id_tabla='5' order by 1" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;	
	}
	function Get_detalleBien($idp){
		$sql="Select a.id_alterno, a.id_patrimonial, a.serie, a.modelo, a.observacion, a.id_estado, a.id_asignado, a.est_bien,
		b.descripcion as tipo_equipo,a.id_alterno, d.descripcion as marca, e.descripcion as color, f.descripcion as estado
		from equipos a 
		left join tablatipo b on a.id_hardware=b.id_tipo and b.id_tabla='5'
		left join tablatipo d on a.id_marca=d.id_tipo and d.id_tabla='6'
		left join tablatipo e on a.id_color=e.id_tipo and e.id_tabla='7'
		left join tablatipo f on a.id_estado=f.id_tipo and f.id_tabla='9'
		where trim(a.id_patrimonial)='" . $idp . "'";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;	
	}
	function Get_operativo(){
		$sql="select descripcion,id_dep from dependencias order by 1" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;	
	}

	function get_personal_nombre($local){
		$sql="select distinct p.id_personal,p.ape_paterno || ' ' || p.ape_materno || ', ' || p.nombres as completo from personal p
		inner join localxfun l on p.id_personal=l.id_personal where l.id_dep='".$local."' order by 2";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function get_personal_datos($idpersonal){
		$sql="select  a.id_personal,
		(a.ape_paterno || ' '|| a.ape_materno || ', '||a.nombres) as funcionario,a.dni,a.id_dep,o.descripcion as operativo,a.id_area, b.descripcion as area,a.id_oficina, f.descripcion as oficina,a.id_cargo,
		d.descripcion as cargo,a.id_oficina,a.id_dep
		from usuarios u 
		inner join personal a on u.usr_idper=a.id_personal  
		left join dependencias o on a.id_dep=o.id_dep
		left join areas b on a.id_area=b.id_area and a.id_dep=b.id_dep
		left join oficinas f on a.id_dep=f.id_dep and a.id_area=f.id_area and a.id_oficina=f.id_oficina
		left join tablatipo d on a.id_cargo=d.id_tipo and d.id_tabla='10'
		where a.id_personal='".$idpersonal."'";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
}
?>

