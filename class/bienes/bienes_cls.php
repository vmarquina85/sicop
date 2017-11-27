<?php
require '../class/conexion/conexion_cls.php';

class bien extends conectar
{
	private $t;

	function __construct()
	{
		$this->t=array();
	}

	function Get_bien($limit, $offset,$tipo,$prefix,$patrimonial,$serie,$codigointerno,$DocumentoAlta,$Operativo,$Marca,$Asignado,$Estado){
		$sql="Select p.descripcion as dependencia, a.id_areact, a.id_depact, a.id_ofiact, a.id_alterno, a.id_patrimonial, a.serie, a.modelo,
		a.observacion, a.id_estado, a.id_hardware, a.id_marca, a.id_color,to_char(a.fec_registro,'dd/mm/yy HH24:MI') as fechar,
		b.descripcion as tipo_equipo, d.descripcion as marca, e.descripcion as color, f.descripcion as estado, cc.tipo_cta as tip_c, cc.tip_uso_cta,
		g.descripcion as grupo,cl.descripcion as clase,a.doc_alta,
		r.descripcion as area, (s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres) as personal,u.usr_login,um.usr_login as modificado,
		a.tipo_cta,a.cuenta,a.forma_adq,to_char(a.fecha_adq,'dd/mm/yyyy') as fecha_adq,a.id_interno,a.doc_alta,a.valor_lib,a.valor_tasa,
		a.asegurado,a.id_asignado,a.tipo_bien,a.nro_motor,a.nro_chasis,a.placa,a.est_bien ,a.dimension
		from equipos a
		inner join dependencias p on a.id_depact=p.id_dep
		left join areas r on a.id_depact=r.id_dep and a.id_areact=r.id_area
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
		where a.est_bien<>'E'";
		if ($tipo!='*') {
			$sql=$sql." and id_hardware='".$tipo."'";
		}
		if($prefix!='*'){
			$sql=$sql." and a.id_patrimonial like '".$prefix."%'";

		}
		if($patrimonial!=''){
			$sql=$sql." and a.id_patrimonial like '%".$patrimonial."%'";

		}
		if ($serie!='') {
			$sql=$sql." and a.serie like '%".$serie."%'";
		}
		if ($codigointerno!='') {
			$sql=$sql." and a.id_interno like '%".$codigointerno."%'";
		}
		if ($DocumentoAlta!='') {
			$sql=$sql." and a.doc_alta like '%".$DocumentoAlta."%'";
		}
		if ($Operativo!='*') {
			$sql=$sql." and  a.id_depact like '%".$Operativo."%'";
		}
		if ($Marca!='*') {
			$sql=$sql." and a.id_marca like '%".$Marca."%'";
		}
		if ($Asignado!='*') {
			if ($Asignado=='A') {
				$sql=$sql." and trim((s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres))!=''";
			}
			if ($Asignado=='N') {
				$sql=$sql." and trim((s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres)) =''";
			}
		}
		if ($Estado!='*') {
			$sql=$sql." and a.est_bien='".$Estado."'";
		}
		$sql=$sql." order by a.id_patrimonial desc,a.id_patrimonial limit ".$limit. " offset ".$offset ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
function get_grupoClase($prefix){
$sql="select t.prefijo,t.id_tipo,G.descripcion as grupo,c.descripcion as clase from tablatipo t
left join grupos G on g.id_grupo= substring(t.prefijo,1,2)
left join clases c on c.id_clase=substring(t.prefijo,3,2)
where id_tabla='5' and t.prefijo='".$prefix."'";

	$res=pg_query(parent::con_sinv(),$sql);
	while($reg=pg_fetch_assoc($res)){
		$this->t[]=$reg;
	}
	return $this->t;
}

	function Get_pages($tipo,$prefix,$patrimonial,$serie,$codigointerno,$DocumentoAlta,$Operativo,$Marca,$Asignado,$Estado){
		$sql="Select count(A.*) as cuenta from (Select p.descripcion as dependencia, a.id_areact, a.id_depact, a.id_ofiact, a.id_alterno, a.id_patrimonial, a.serie, a.modelo,
			a.observacion, a.id_estado, a.id_hardware, a.id_marca, a.id_color,to_char(a.fec_registro,'dd/mm/yy HH24:MI') as fechar,
			b.descripcion as tipo_equipo, d.descripcion as marca, e.descripcion as color, f.descripcion as estado, cc.tipo_cta as tip_c, cc.tip_uso_cta,
			g.descripcion as grupo,cl.descripcion as clase,a.doc_alta,
			r.descripcion as area, (s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres) as personal,u.usr_login,um.usr_login as modificado,
			a.tipo_cta,a.cuenta,a.forma_adq,to_char(a.fecha_adq,'dd/mm/yyyy') as fecha_adq,a.id_interno,a.doc_alta,a.valor_lib,a.valor_tasa,
			a.asegurado,a.id_asignado,a.tipo_bien,a.nro_motor,a.nro_chasis,a.placa,a.est_bien ,a.dimension
			from equipos a
			inner join dependencias p on a.id_depact=p.id_dep
			left join areas r on a.id_depact=r.id_dep and a.id_areact=r.id_area
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
			where a.est_bien<>'E'";// est_bien = E equivale a eliminado
			if ($tipo!='*') {
				$sql=$sql." and id_hardware='".$tipo."'";
			}
			if($prefix!='*'){
				$sql=$sql." and a.id_patrimonial like '".$prefix."%'";

			}
			if($patrimonial!=''){
				$sql=$sql." and a.id_patrimonial like '".$patrimonial."%'";

			}
			if ($serie!='') {
				$sql=$sql." and a.serie='".$serie."'";
			}
			if ($codigointerno!='') {
				$sql=$sql." and a.id_interno='".$codigointerno."'";
			}
			if ($DocumentoAlta!='') {
				$sql=$sql." and a.doc_alta='".$DocumentoAlta."'";
			}
			if ($Operativo!='*') {
				$sql=$sql." and  a.id_depact='".$Operativo."'";
			}
			if ($Marca!='*') {
				$sql=$sql." and a.id_marca='".$Marca."'";
			}
			if ($Asignado!='*') {
				if ($Asignado=='A') {
					$sql=$sql." and trim((s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres))!=''";
				}
				if ($Asignado=='N') {
					$sql=$sql." and trim((s.ape_paterno || ' ' || s.ape_materno || ', ' || s.nombres)) =''";
				}

			}
			if ($Estado!='*') {
				$sql=$sql." and a.est_bien='".$Estado."'";
			}
			$sql=$sql." order by b.descripcion,a.id_patrimonial)A" ;
			$res=pg_query(parent::con_sinv(),$sql);
			while($reg=pg_fetch_assoc($res)){
				$this->t[]=$reg;
			}
			return $this->t;
			}
		function eliminarBien($id_patrimonial,$causal){
			$sql="update equipos set est_bien='E',causal_elim='".$causal."' where id_patrimonial='".$id_patrimonial."'";
			pg_query(parent::con_sinv(),$sql);

		}
		function depreciarBienes(){
			$sql="select * from depreciar_all()";
			pg_query(parent::con_sinv(),$sql);

		}
		function bajaBien($id_patrimonial,$fecha,$causal,$resolucion,$doc_baja,$usrreg){
			$sql="update equipos set est_bien='B', fecha_baja='" . $fecha . "', causal_baja='" . $causal . "', resol_baja='" . $resolucion . "',doc_baja='" . $doc_baja. "',fec_modifica=now(),usr_modifica='" . $usrreg . "' where id_patrimonial='" . $id_patrimonial . "'";
			pg_query(parent::con_sinv(),$sql);
		}
		function altaBien($id_patrimonial,$usrreg){
			$sql="update equipos set est_bien='A', causal_baja='', resol_baja='', fecha_baja=null,usr_modifica='" . $usrreg . "', fec_modifica=now() where id_patrimonial='" .$id_patrimonial. "'";
			$res=pg_query(parent::con_sinv(),$sql);
		}
}
?>
