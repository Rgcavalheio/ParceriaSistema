<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */


function index() {
  global $clientes;
  $clientes = find_por_vendedor();
    global $propostas1;
  $propostas1 = find_por_tipo('1');
      global $propostas2;
  $propostas2 = find_por_tipo('2');
        global $propostas3;
  $propostas3 = find_por_tipo('3');
      global $propostas4;
  $propostas4 = find_por_tipo('4');
}
function add() {


    

  if (!empty($_POST['cliente'])) {    
    
     
    $cliente = $_POST['cliente'];

   

    
    save('clientes', $cliente);
    header('location: index.php');
    
  }
}
function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['cliente'])) {
      $cliente = $_POST['cliente'];      
      update('clientes', $id, $cliente);
      header('location: index.php');
    } else {
      global $cliente;
      $cliente = find('clientes', $id);
    } 
  } else {
    header('location: index.php');
  }
}
function view($id = null) {
  global $cliente;
  $cliente = find('clientes', $id);
}
function delete($id = null) {
  global $cliente;
  $customer = remove('clientes', $id);
  header('location: index.php');
}

function desativar($id = null){
  $database = open_database();




  $sql = "UPDATE `clientes` SET `situacao` = '2' WHERE `clientes`.`id` = '".$id."'";

  try {
    $database->query($sql);
  
     header('location: index.php');
}catch (Exception $e) {
  echo "erro";

}
close_database();

}
function ativar($id = null){
  $database = open_database();




  $sql = "UPDATE `clientes` SET `situacao` = '1' WHERE `clientes`.`id` = '".$id."'";

  try {
    $database->query($sql);
  
     header('location: index.php');
}catch (Exception $e) {
  echo "erro";

}
close_database();

}