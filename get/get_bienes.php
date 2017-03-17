<?php require '../class/bienes/bienes_cls.php' ;
$bien=new bien;
$tam=$_REQUEST["limit"];
$inicio=$_REQUEST["offset"];

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
$rs_bienes=$bien-> Get_bien($tam, $inicio,$tipo,$prefix,$patrimonial,$serie,$codigointerno,$DocumentoAlta,$Operativo,$Marca,$Asignado,$Estado);
?>
<tbody id='tb_detalle_bienes'>
  <?php for ($i=0; $i <sizeof($rs_bienes) ; $i++) {?>
    <tr>
      <td class='p-3 f-s-11 text-center m-r-10 m-l-10'>
        <a href="javascript:;">
        <img title='Editar' src="../assets/img/page_edit.png" alt="">
      </a>
    </td>
      <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><a href="javascript:;">
        <img title='Imprimir' src="../assets/img/printer.png" alt="">
      </a></td>
      <!-- <td class='p-3 f-s-11 text-center m-r-10 m-l-10'><a href="javascript:;">
        <img title='Dar de Alta' src="../assets/img/arrow_up.png" alt="">
      </a></td> -->
      <?php
      if ($rs_bienes[$i]["est_bien"]=='A'){
        echo  "<td class='p-3 f-s-11 text-center m-r-10 m-l-10' onclick='AlertBaja(this)' style='cursor:pointer;'><a>
                <img title='Dar de Baja' src='../assets/img/Baja.png'>
              </a></td>";
      }else{
        echo  "<td class='p-3 f-s-11 text-center m-r-10 m-l-10' onclick='AltaBien(this)' style='cursor:pointer;'><a>
                <img title='Dar de Alta' src='../assets/img/arrow_up.png'>
              </a></td>";
      };?>
      <td class='p-3 f-s-11 text-center m-r-10 m-l-10' style='cursor:pointer;' onclick='AlertEliminar(this)'><a>
        <img title='Eliminar' src="../assets/img/cancel.png" alt="">
      </a></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["id_patrimonial"]); ?></td>

      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["tipo_equipo"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["marca"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["fecha_adq"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["estado"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["valor_tasa"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["valor_lib"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_decode($rs_bienes[$i]["doc_alta"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["dependencia"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["area"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo $rs_bienes[$i]["personal"]; ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php
      if ($rs_bienes[$i]["est_bien"]=='A'){
        echo  "<img src='../assets/img/checked.png' alt='Activo'>";
      }else{
        echo "<img src='../assets/img/unchecked.png' alt='Baja'>";
      };?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["id_interno"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["usr_login"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["fechar"]); ?></td>
      <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_bienes[$i]["modificado"]); ?></td>
    </tr>
    <?php };?>

  </tbody>
