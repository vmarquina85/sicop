<?php
require '../class/conexion/conexion_cls.php';
class Pendientes extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}

	function obtenerBienes($idpersonal){
		$sql="select d.det_orden,c.mov_fecha,b.descripcion,e.modelo,m.descripcion as marca,e.serie,c.mov_status from det_mov d
						left join cab_mov c on c.mov_orden=d.det_orden
						left join equipos e on e.id_alterno=d.det_equipo
						left join tablatipo b on e.id_hardware=b.id_tipo and b.id_tabla='5'
						left join tablatipo m on e.id_marca=m.id_tipo and m.id_tabla='6'
						where d.det_orden in (select mov_orden from cab_mov
						where (mov_transpo='".$idpersonal."') AND MOV_STATUS='I')";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
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
	function obtenerBienes($idpersonal){
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
