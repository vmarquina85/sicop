<?php 
require '../class/conexion/conexion_cls.php';

class asignacion extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}

	function Get_asignaciones($limit, $offset,$nro,$origen,$destino,$estado){
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
						where a.mov_motivo='2'";
		if ($nro!='') {
			$sql=$sql."and substring(a.mov_orden,2,7)='" . $nro . "'";
		}
		if($origen!='*'){
			$sql=$sql." and a.mov_src='" . $origen . "'";
		}
		if($destino!='*'){
			$sql=$sql." and mov_tar='" . $destino . "' ";
		}
		if ($estado!='*') {
			$sql=$sql." and mov_status='" . $estado . "'";
		}
		session_start();
		if ($_SESSION["usr_niv"] <> 'A') {
            $sql .= " and (mov_transpo='" . $_SESSION['usr_idper'] . "' or mov_personal='" . $_SESSION['usr_idper'] . "') ";
        }
        $sql=$sql." order by cast(substring(mov_orden,2,7) as smallint) desc  limit ".$limit. " offset ".$offset ;
	
			$res=pg_query(parent::con_sinv(),$sql);
			while($reg=pg_fetch_assoc($res)){
				$this->t[]=$reg;
			}
			return $this->t;	

		
	}
		function Get_pages($nro,$origen,$destino,$estado){
		$sql="select count(A.*) as cuenta from (Select e.descripcion as source,g.descripcion as target,a.mov_tar,a.mov_areatra,a.mov_ofitra,
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
						where a.mov_motivo='2'";
		if ($nro!='') {
			$sql=$sql."and substring(a.mov_orden,2,7)='" . $nro . "'";
		}
		if($origen!='*'){
			$sql=$sql." and a.mov_src='" . $origen . "'";
		}
		if($destino!='*'){
			$sql=$sql." and mov_tar='" . $destino . "' ";
		}
		if ($estado!='*') {
			$sql=$sql." and mov_status='" . $estado . "'";
		}
		session_start();
		if ($_SESSION["usr_niv"] <> 'A') {
			$sql.= " and (mov_transpo='" . $_SESSION['usr_idper'] . "' or mov_personal='" .  $_SESSION['usr_idper'] . "') ";
		}

			
		$sql=$sql." order by cast(substring(mov_orden,2,7) as smallint) desc  )A" ;
	
			$res=pg_query(parent::con_sinv(),$sql);
			while($reg=pg_fetch_assoc($res)){
				$this->t[]=$reg;
			}
			return $this->t;	

		
	}

}
?>

