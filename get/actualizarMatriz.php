<?php 
session_start();
$postArray=array(id_estado=>$_GET['id_estado'],id_alterno=>$_GET['id_alterno'],obs=>$_GET['Obs']);
array_push($_SESSION['matriz'],$postArray);
 ?>