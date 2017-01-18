<?php 
$arrayPHP=array("casa","coche","moto");
echo json_encode($arrayPHP)	;

 ?>
 <script>
var array=<?php echo  json_encode($arrayPHP)?>

alert(array[1]);


 </script>