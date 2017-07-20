<?php
require '../class/conexion/conexion_cls.php';

class menu extends conectar
{
	private $t;
	function __construct()
	{
		$this->t=array();
	}

	function get_menu($usrreg){
		$sql="select distinct p.menu_id,m.menu_name,m.menu_icon from permisos p
left join menu m on p.menu_id=m.menu_id where usr_id='".trim($usrreg)."'  order by 1" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;

	}

	function get_submenus($usrreg,$menu_id){
		$sql="select distinct m.submenu_id,m.submenu_name,m.submenu_link from permisos p
left join submenu m on m.menu_id=p.menu_id and m.submenu_id=p.submenu_id where p.usr_id='".trim($usrreg)."' and p.menu_id='".$menu_id."'  order by 1" ;
		$res=pg_query(parent::con_sinv(),$sql);
		while($reg=pg_fetch_assoc($res)){
			$this->t[]=$reg;
		}
		return $this->t;
	}




}
?>
