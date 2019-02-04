<?php
require '../class/conexion/conexion_cls.php';
class Reporte extends conectar
{
function Select_Reporte_Bienes($usuario,$local,$area,$oficina,$tipbien,$cuenta,$estado,$situa,$desde,$hasta){
		$respuesta=array();
    $sql="Select a.id_areact, p.descripcion  as id_depact, a.id_patrimonial,
    	b.descripcion as tipo_equipo, f.descripcion as estado,
    	r.siglas as area,o.siglas as oficina,
    	to_char(a.fecha_adq,'dd/mm/yyyy') as fecha_adq,a.id_interno,a.valor_lib,
    	a.id_asignado
    	from equipos a
    	inner join dependencias p on a.id_depact=p.id_dep
    	left join areas r on a.id_depact=r.id_dep and a.id_areact=r.id_area
    	left join oficinas o on a.id_depact=o.id_dep and a.id_areact=o.id_area and a.id_ofiact=o.id_oficina
    	inner join tablatipo b on a.id_hardware=b.id_tipo and b.id_tabla='5'
    	left join tablatipo f on a.id_estado=f.id_tipo and f.id_tabla='9'
    	where a.est_bien<>'E'";
			if ($usuario <> '*') {
					$sql = $sql . "and id_asignado='" . $usuario . "' ";
			}
      if ($local <> '*') {
          $sql = $sql . "and id_depact='" . $local . "' ";
      }
      if ($area <> '*') {
          $sql = $sql . "and id_areact='" . $area . "' ";
      }
      if ($oficina <> '*') {
          $sql = $sql . "and id_ofiact='" . $oficina . "' ";
      }
      if ($tipbien <> '*') {
          $sql = $sql . "and id_hardware='" . $tipbien . "' ";
      }
      if ($estado <> '*') {
          $sql = $sql . "and id_estado='" . $estado . "' ";
      }
      if ($situa <> '*') {
          $sql = $sql . "and est_bien='" . $situa . "' ";
      }
      if ($cuenta<> '*') {
          $sql = $sql . "and cuenta='" . $cuenta. "' ";
      }
      if ($desde <> '') {
          $sql = $sql . "and a.fecha_adq >= '" . $desde . "' ";
      }
      if ($hasta <> '') {
          $sql = $sql . "and a.fecha_adq <= '" . $hasta . "' ";
      }
      $sql = $sql . " order by 4,3";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$respuesta[]=$reg;
		}
		return $respuesta;
	}
	function Select_Reporte_Bienes_det($usuario,$local,$area,$oficina,$tipbien,$cuenta,$estado,$situa,$desde,$hasta){
			$respuesta=array();
	    $sql="Select a.id_areact, a.id_depact,p.descripcion as dependencia, a.id_patrimonial,
			b.descripcion as tipo_equipo, f.descripcion as estado,
			r.descripcion as area,o.descripcion as oficina,per.dni,
			to_char(a.fecha_adq,'dd/mm/yyyy') as fecha_adq,a.id_interno,a.valor_lib,
			a.modelo,a.serie,a.dimension,m.descripcion as marca,c.descripcion as color,a.id_asignado,per.nombres||' '||per.ape_paterno||' '||per.ape_materno as asignado,a.tipo_bien
			from equipos a
			inner join dependencias p on a.id_depact=p.id_dep
			left join areas r on a.id_depact=r.id_dep and a.id_areact=r.id_area
			left join oficinas o on a.id_depact=o.id_dep and a.id_areact=o.id_area and a.id_ofiact=o.id_oficina
			left join personal per on per.id_personal=a.id_asignado
			inner join tablatipo b on a.id_hardware=b.id_tipo and b.id_tabla='5'
			left join tablatipo f on a.id_estado=f.id_tipo and f.id_tabla='9'
			left join tablatipo m on a.id_marca=m.id_tipo and m.id_tabla='6'
			left join tablatipo c on a.id_color=c.id_tipo and c.id_tabla='7'
			where a.est_bien='A' ";
				if ($usuario <> '*') {
						$sql = $sql . "and id_asignado='" . $usuario . "' ";
				}
	      if ($local <> '*') {
	          $sql = $sql . "and id_depact='" . $local . "' ";
	      }
	      if ($area <> '*') {
	          $sql = $sql . "and id_areact='" . $area . "' ";
	      }
	      if ($oficina <> '*') {
	          $sql = $sql . "and id_ofiact='" . $oficina . "' ";
	      }
	      if ($tipbien <> '*') {
	          $sql = $sql . "and id_hardware='" . $tipbien . "' ";
	      }
	      if ($estado <> '*') {
	          $sql = $sql . "and id_estado='" . $estado . "' ";
	      }
	      if ($situa <> '*') {
	          $sql = $sql . "and est_bien='" . $situa . "' ";
	      }
	      if ($cuenta<> '*') {
	          $sql = $sql . "and cuenta='" . $cuenta. "' ";
	      }
	      if ($desde <> '') {
	          $sql = $sql . "and a.fecha_adq >= '" . $desde . "' ";
	      }
	      if ($hasta <> '') {
	          $sql = $sql . "and a.fecha_adq <= '" . $hasta . "' ";
	      }
	      $sql = $sql . "  order by 4, 3";
			$res=pg_query(parent::con_sinv(),$sql);
			while($reg=pg_fetch_assoc($res)){
				$respuesta[]=$reg;
			}
			return $respuesta;
		}





}
?>
