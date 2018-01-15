<?php
session_start();
require_once('functions.php'); 
require_once("mail_config.php");

view($_GET['id']);

 $id_proposta1 = $_GET['proposta1']; 
  $id_proposta2 = $_GET['proposta2'];
   $id_proposta3 = $_GET['proposta3'];  


$tipo = $_GET['tipo'];
$num = $_GET['num'];

$mail_to = $cliente['email'];
$nome_cliente = $cliente['nome'];
$vendedor_nome = $vendedor['nome'];
$user = $vendedor['email'];
$pass = $vendedor['senha'];



$envia = enviar($tipo,$user,$pass,$mail_to,$nome_cliente,$vendedor_nome,$num,$id_proposta1,$id_proposta2,$id_proposta3);





if($envia == true){


      echo '<!DOCTYPE html>';
   echo '<html xmlns="http://www.w3.org/1999/xhtml">';
   echo '<head>';
   echo '   <meta http-equiv="refresh" content="1; url=../clientes/">';
   echo '</head>';
   echo '<body>';
   echo "<script>alert('".$msg."');location.href=\"../clientes/\"</script>";
   echo '</body>';
   echo '</html>';
}else{
//var_dump($msg);


   //    echo '<!DOCTYPE html>';
   // echo '<html xmlns="http://www.w3.org/1999/xhtml">';
   // echo '<head>';
   // echo '   <meta http-equiv="refresh" content="1; url=../clientes/">';
   // echo '</head>';
   // echo '<body>';
   // echo "<script>alert('".$msg."');location.href=\"../clientes/\"</script>";
   // echo '</body>';
   // echo '</html>';
}


	//   echo $msg;



?>




