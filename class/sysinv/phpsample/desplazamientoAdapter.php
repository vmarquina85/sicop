<?php 
include "Consultas.php";
 /**
 * 
 */
 class desplazamientoAdapter implements Consultas
 {
 	public function ObtenerRegistros($nombre, $tipo){
	echo "registros desplazamiento";
	echo $hombre;
	echo $tipo;
}
 	public function ObtenerPaginacion($nombre, $tipo){
	echo "paginacion desplazamiento";
	echo $hombre;
	
	echo $tipo;

}
}

?>