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
	function desactivarUsuario($id_usr,$usrreg){
		$sql="update usuarios set usr_est='0',fecha_mod=current_date,mod_id_usr='".$usrreg."' where usr_id='".$id_usr."'";
		pg_query(parent::con_sinv(),$sql);
	}
	function activarUsuario($id_usr,$usrreg){
		$sql="update usuarios set usr_est='1',fecha_mod=current_date,mod_id_usr='".$usrreg."' where usr_id='".$id_usr."'";
		pg_query(parent::con_sinv(),$sql);
	}
	function get_Permisos_Activos($user){
		$sql="select m.menu_id, m.menu_name, s.submenu_id,s.submenu_name, case when m.menu_id||s.submenu_id in (select distinct p.menu_id||p.submenu_id from permisos p
		left join menu m on m.menu_id=p.menu_id
		left join submenu s on s.menu_id=p.menu_id and s.submenu_id=p.submenu_id where p.usr_id='".trim($user)."'   order by 1) then true else false end as active  from menu m
		left join submenu s on s.menu_id= m.menu_id order by 1";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function get_Perfil($user){
		$sql="select usr_niv from usuarios where usr_id='".trim($user)."' order by 1";
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}
	function eliminarPermisos($id_usr){
		$sql="delete from permisos where usr_id='".$id_usr."'";
		pg_query(parent::con_sinv(),$sql);
	}
	function insertarPermisosNuevos($menu_id,$submenu_id,$id_usr,$nivel){
		$sql="insert into permisos(usr_id, menu_id, submenu_id)values ('".$id_usr."', '".$menu_id."', '".$submenu_id."')";
		pg_query(parent::con_sinv(),$sql);
		$udpate="update usuarios set usr_niv='".$nivel."' where usr_id='".$id_usr."'";
		pg_query(parent::con_sinv(),$udpate);
		session_start();
		$_SESSION["usr_niv"]=$nivel;
	}

	function insertarUsuarioNuevo($funcionario,$login,$nivel,$passwrd){
		$sqllogin="select usr_login from usuarios where usr_login='".strtoupper($login)."'";
		$rs1=pg_query(parent::con_sinv(),$sqllogin);
		$numbers=pg_num_rows($rs1);
		if ($numbers!=0) {
			return "0";
		}else{
			session_start();
			$sqlCode="select max(cast(usr_id as integer))+1 as maximo from usuarios";
			$rs=pg_query(parent::con_sinv(),$sqlCode);
			$codigo=pg_fetch_result($rs, 0, 'maximo');
			$sql="insert into usuarios(
				usr_login, usr_name, usr_id, usr_pwd, usr_dep, usr_est, usr_niv,
				usr_idper, usr_flag, mod_id_usr, fecha_mod)
				values('".strtoupper($login)."', null, '".trim($codigo)."', '".$passwrd."', null, '1', '".$nivel."',
				'".$funcionario."', null, '".$_SESSION["sicop_usr_id"]."', current_date)";
				pg_query(parent::con_sinv(),$sql);
				return "1";
			}
		}




	}
	?>
