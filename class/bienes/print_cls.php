<?php
class imprimir extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}
function obtenerDet($orden){
$sql="select e.id_patrimonial,b.descripcion,e.modelo,m.descripcion as marca,e.serie,k.descripcion as color, s.descripcion as det_est, d.det_obs as observacion, e.tipo_bien from det_mov d
						left join cab_mov c on c.mov_orden=d.det_orden
						left join equipos e on e.id_alterno=d.det_equipo
						left join tablatipo k on e.id_color=k.id_tipo and k.id_tabla='7'
						left join tablatipo b on e.id_hardware=b.id_tipo and b.id_tabla='5'
						left join tablatipo m on e.id_marca=m.id_tipo and m.id_tabla='6'
						left join tablatipo s on d.det_est=s.id_tipo and s.id_tabla='9'
          where d.det_orden ='".$orden."'";
  $res=pg_query(parent::con_sinv(),$sql);
  while($reg=pg_fetch_assoc($res)){
    $this->t[]=$reg;
  }
  return $this->t;
}
}
?>
