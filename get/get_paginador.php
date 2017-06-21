<?php
require '../class/usuarios/usuarios_cls.php' ;
$usuarios=new usuarios;
//obtener total de rows
$parametro=$_REQUEST["parametro"];
$rs_usuarios=$usuarios-> GET_pages($parametro);
$rows=$rs_usuarios[0]["cuenta"];


//numeros total de registros

//nuemro de resultados que se mostraran
$pageRows=20;
//numero de la ultima pagina
$last=ceil($rows/$pageRows);
//asegurar de que $last no pueda ser menor que 1
if ($last<1){
  $last=1;
}
//establecer variable $numeroPagina
$numeroPagina=1;
//obtener el numero de pagina
if(isset($_REQUEST['pn'])){
  $numeroPagina=preg_replace('#[^0-9]#','', $_REQUEST['pn']);
}
// esto asegura de que el numero de pagina no este debajo de 1, o mas de nuestra ultima pagina
if ($numeroPagina<1) {
  $numeroPagina=1;
}else if ($numeroPagina>$last) {
  $numeroPagina=$last;
}
echo "<h6 class='pull-right m-l-10'>Total de Registros ".$rows."</h6>";
echo "<ul id='paginator' class='pagination  p-b-10'>";
if ($last>1) {
  echo "<li><a href='javascript:search(".($numeroPagina-1).")' aria-label='Anterior'><span aria-hidden='true'>&laquo;</span></a></li>";
  echo "<li class='active'><a href='javascript:search(".$numeroPagina.")'>".$numeroPagina."</a></li>";

  if ($numeroPagina+4<$last) {
    for ($i=($numeroPagina+1); $i <=$numeroPagina+4; $i++) {
      echo "<li><a href='javascript:search(".$i.")'>".$i."</a></li>";
    }
  }else{
      for ($i=($numeroPagina+1); $i <=$last; $i++) {
      echo "<li><a href='javascript:search(".$i.")'>".$i."</a></li>";
    }
  }



if ($numeroPagina==$last) {
  echo "<li>
  <a href='javascript:search(".$last.")' aria-label='Siguiente'>
  <span aria-hidden='true'>&raquo;</span>
  </a>
  </li>";
}else{
    echo "<li>
  <a href='javascript:search(".($numeroPagina+1).")' aria-label='Siguiente'>
  <span aria-hidden='true'>&raquo;</span>
  </a>
  </li>";
}


}
echo "</ul> ";
?>
