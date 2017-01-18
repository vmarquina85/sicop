<?php 
include "Consultas.php";
 /**
 * 
 */
 class bienesAdapter implements Consultas
 {
 	public function ObtenerRegistros($nombre, $tipo){
	echo "registros bienes";
	echo $hombre;
	echo $tipo;
}
 	public function ObtenerPaginacion($nombre, $tipo){
	echo "paginacion bienes";
	echo $hombre;
	
	echo $tipo;

}
}

?>