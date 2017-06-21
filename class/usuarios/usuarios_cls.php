<?php
require '../class/conexion/conexion_cls.php';

class usuarios extends conectar
{
	private $t;

	function __construct()
	{
		$this->t=array();
	}

	function get_usuarios($limit,$offset,$parametro){
		$sql="select u.usr_id,u.usr_login,(p.ape_paterno||' '||p.ape_materno||', '||p.nombres) as completo,u.usr_niv,u.usr_idper,u.usr_est,p.ape_paterno,p.nombres
    from usuarios u inner join personal p on u.usr_idper=p.id_personal where u.usr_id<>'0' ";
    if (!empty($parametro)) {
    $sql=$sql. " and usr_id like '%".strtoupper($parametro)."%' or usr_login like '%".strtoupper($parametro)."%' or (p.ape_paterno||' '||p.ape_materno||', '||p.nombres) like '%".strtoupper($parametro)."%' or usr_niv like '%".strtoupper($parametro)."%' or usr_idper like '%".strtoupper($parametro)."%'";
    }
		$sql=$sql." order by 2 limit ".$limit. " offset ".$offset ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}

	function Get_pages($parametro){
    $sql="select count(A.*) as cuenta from (select u.usr_id,u.usr_login,(p.ape_paterno||' '||p.ape_materno||', '||p.nombres) as completo,u.usr_niv,u.usr_idper,u.usr_est,p.ape_paterno,p.nombres
    from usuarios u inner join personal p on u.usr_idper=p.id_personal where u.usr_id<>'0'";
    if (!empty($parametro)) {
  $sql=$sql." and usr_id like '%".strtoupper($parametro)."%' or usr_login like '%".strtoupper($parametro)."%' or (p.ape_paterno||' '||p.ape_materno||', '||p.nombres) like '%".strtoupper($parametro)."%' or usr_niv like '%".strtoupper($parametro)."%' or usr_idper like '%".strtoupper($parametro)."%'";
    }
		$sql=$sql." order by 2)A" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
			}
		function eliminarUsuario($id_patrimonial,$causal){
			$sql="update equipos set est_bien='E',causal_elim='".$causal."' where id_patrimonial='".$id_patrimonial."'";
			pg_query(parent::con_sinv(),$sql);

		}
}
?>
