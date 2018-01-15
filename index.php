<?php require_once 'config.php';
 session_start();


if (!isset($_SESSION['UsuarioID'])){
 session_start();
header('location: login/index.php');	
}else{
	header('location: menu.php');	
}






 ?>