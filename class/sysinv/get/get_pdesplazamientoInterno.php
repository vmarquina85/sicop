<?php require '../class/desplazamiento/pdesplazamientoInterno_cls.php' ;
$desp=new dinterno;
$tam=$_REQUEST["limit"];
$inicio=$_REQUEST["offset"];
$numero=$_REQUEST["numero"];
$origen=$_REQUEST["origen"];
$destino=$_REQUEST["destino"];
$estado=$_REQUEST["estado"];
$rs_desp=$desp->Get_dinterno($tam, $inicio,$numero,$origen,$destino,$estado);
            ?>
             <tbody id='tb_detalle_bienes'>
           <?php for ($i=0; $i <sizeof($rs_desp) ; $i++) {?>
                           <tr class='<?php if ($rs_desp[$i]["mov_status"]=='A'){echo  "danger";}else if ($rs_desp[$i]["mov_status"]=='R') {echo  "success";}else if($rs_desp[$i]["mov_status"]=='I'){echo  "warning";};?>'>                    
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10' ><a href="javascript:;">
                 <img src="../assets/img/printer.png" alt="">
               </a></td>
               <?php if ($rs_desp[$i]["mov_status"]!='I'){
                echo  "<td class='p-2 f-s-11 text-center m-r-10 m-l-10' style='color:#A2A3A2;'><i title='Recibir' class='fa fa-check fa-1x'></i></td>";
              }else{
                echo "<td class='p-2 f-s-11 text-center m-r-10 m-l-10' ><a href='javascript:;' ><i title='Recibir' class='fa fa-check fa-1x'></i></a></td>";
              }?>
               
               <?php if ($rs_desp[$i]["mov_status"]!='I'){
                echo  "<td class='p-2 f-s-11 text-center m-r-10 m-l-10' style='color:#A2A3A2;'><i title='Anular' class='fa fa-times fa-1x'></i></td>";
              }else{
                echo  "<td class='p-2 f-s-11 text-center m-r-10 m-l-10' ><a href='javascript:;' ><i title='Anular' class='fa fa-times fa-1x'></i></a></td>";
              }?>
             
             <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["numero"]); ?></td> 
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["mov_fecha"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["source"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["area_src"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["area_tar"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["motivo"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["entrego"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["recibio"]); ?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php 
               if ($rs_desp[$i]["mov_status"]=='A'){
                echo  "<i style ='color:#FF190A;' title='Anulado' class='fa fa-times'></i>";
              }else if ($rs_desp[$i]["mov_status"]=='R') {
                  echo  "<i style ='color:#2C9943;' title='' class='fa fa-check'></i>";
              }else if($rs_desp[$i]["mov_status"]=='I'){
                  echo  "<i style ='color:#FFBA37;' title='' class='fa fa-exclamation-triangle'></i>";
              };?></td>
               <td class='p-2 f-s-11 text-center m-r-10 m-l-10'><?php echo utf8_encode($rs_desp[$i]["mov_fecing"]); ?></td>

             </tr>
<?php };?>

             </tbody>



               