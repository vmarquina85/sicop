<?php require '../class/bienes/bienes_cls.php' ;
$bien=new bien;
$Operativo=$_REQUEST["local"];
$rs_bienes=$bien-> Get_bien2('*','','','','','',$Operativo,'*','A','A');
?>

<?php for ($i=0; $i <sizeof($rs_bienes) ; $i++) {?>
  <tr>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_decode($rs_bienes[$i]["id_patrimonial"]); ?></td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_decode($rs_bienes[$i]["tipo_equipo"]); ?></td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_decode($rs_bienes[$i]["marca"]); ?></td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_decode($rs_bienes[$i]["modelo"]); ?></td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10' ><?php echo utf8_decode($rs_bienes[$i]["area"]); ?></td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10' ><?php echo utf8_decode($rs_bienes[$i]["personal"]); ?></td>
    <!-- <td style='cursor: pointer; color: rgba(255,255,255,0)' class='p-3 f-s-11 text-center m-r-10 m-l-10' title='Seleccionar' onclick='seleccionar(this)'><i id='$i' class='fa fa-check'></i></td> -->
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>
      <a href="javascript:;" onclick='seleccionarMod(this)' class="email-btn" data-click="email-archive"><i class="material-icons">account_box</i></a>
    </td>
    <td class='p-2 f-s-11 text-center m-r-10 m-l-10'>
        <a href="javascript:;" onclick='seleccionarOk(this)' class="email-btn" data-click="email-highlight"><i class="material-icons">done</i></a>
    </td>
    <td  onclick='imprimirCodbar(this,0,1)' class='p-3 f-s-11 text-center m-r-10 m-l-10'><a href="javascript:;">
      <img title='Imprimir código de barras' src="../assets/img/barcode.png" alt="">
    </a></td>




  </tr>
<?php };?>
