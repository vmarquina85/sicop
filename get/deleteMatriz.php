<?php 
session_start();
$indexforDelete=$_GET["index"]-1;
unset($_SESSION['matriz'][$indexforDelete]);
 ?>