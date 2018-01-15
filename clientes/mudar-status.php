<?php include("../inc/logica_login.php"); 
  check_acesso(2);
?>

<?php 
  require_once('functions.php'); 
  index();
  $database = open_database();


$id = $_GET['id'];
$tipo = $_GET['tipo'];

  $sql = "UPDATE `clientes` SET `situacao` = '".$tipo."' WHERE `clientes`.`id` = '".$id."'";

  try {
    $database->query($sql);
  
     header('location: index.php');
}catch (Exception $e) {
	echo "erro";

}






?>