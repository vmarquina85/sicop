<?php
$page=$_REQUEST["page"];

if ($page=='desplazamiento') {

require '../class/desplazamiento/pdesplazamiento_cls.php' ;
$desp=new desplazamiento;
$numero=$_REQUEST["numero"];
$origen=$_REQUEST["origen"];
$destino=$_REQUEST["destino"];
$estado=$_REQUEST["estado"];
$motivo=$_REQUEST["motivo"];
$rs_desp=$desp-> Get_pages($numero,$origen,$destino,$estado,$motivo);
$rows=$rs_desp[0]["cuenta"];
}
if ($page=='asignacion') {

require '../class/desplazamiento/pasignacionIndividual_cls.php' ;
$desp=new asignacion;
$numero=$_REQUEST["numero"];
$origen=$_REQUEST["origen"];
$destino=$_REQUEST["destino"];
$estado=$_REQUEST["estado"];
$rs_desp=$desp-> Get_pages($numero,$origen,$destino,$estado);
$rows=$rs_desp[0]["cuenta"];
}
if ($page=='desplazamientoInterno') {

require '../class/desplazamiento/pdesplazamientoInterno_cls.php' ;
$despInt=new dinterno;
$numero=$_REQUEST["numero"];
$origen=$_REQUEST["origen"];
$destino=$_REQUEST["destino"];
$estado=$_REQUEST["estado"];
$rs_despInt=$despInt-> Get_pages($numero,$origen,$destino,$estado);
$rows=$rs_despInt[0]["cuenta"];
}
if ($page=='bienes') {

require '../class/bienes/bienes_cls.php' ;
$bien=new bien;
//obtener total de rows
$tipo=$_REQUEST["tipo"];
$prefix=$_REQUEST["prefix"];
$patrimonial=$_REQUEST["patrimonial"];
$serie=$_REQUEST["serie"];
$codigointerno=$_REQUEST["codigointerno"];
$DocumentoAlta=$_REQUEST["docalta"];
$Operativo=$_REQUEST["operativo"];
$Marca=$_REQUEST["marca"];
$Asignado=$_REQUEST["asignado"];
$Estado=$_REQUEST["estado"];
$rs_bienes=$bien-> GET_pages($tipo,$prefix,$patrimonial,$serie,$codigointerno,$DocumentoAlta,$Operativo,$Marca,$Asignado,$Estado);
$rows=$rs_bienes[0]["cuenta"];
}
if ($page=='personal') {

require '../class/personal/p_personal_cls.php' ;
$personal=new personal;
//obtener total de rows
$nombre=$_REQUEST["nombre"];
$apepat=$_REQUEST["apepat"];
$apemat=$_REQUEST["apemat"];
$dependencia=$_REQUEST["dependencia"];
$rs_personal=$personal->GET_pages($nombre,$apepat,$apemat,$dependencia);
$rows=$rs_personal[0]["cuenta"];
}

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
