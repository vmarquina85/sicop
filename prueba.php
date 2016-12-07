<?php 
session_start();
echo json_encode($_SESSION['matriz']);
$ni = count($_SESSION['matriz']);
echo '<br>';
echo $ni;
echo '<br>';
echo $_SESSION['matriz'][1]['obs'];
 ?>