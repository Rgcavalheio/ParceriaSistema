<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */


function index() {
	global $vendedores;
	$vendedores = find_all('vendedores');
}
function add() {
    

  if (!empty($_POST['vendedor'])) {    
    
     
    $vendedor = $_POST['vendedor'];

    
    save('vendedores', $vendedor);
    header('location: index.php');
    
  }
}
function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['vendedor'])) {
      $vendedor = $_POST['vendedor'];      
      update('vendedores', $id, $vendedor);
      header('location: index.php');
    } else {
      global $vendedor;
      $vendedor = find('vendedores', $id);
    } 
  } else {
    header('location: index.php');
  }
}
function view($id = null) {
  global $vendedor;
  $vendedor = find('vendedores', $id);
}
function delete($id = null) {
  global $vendedor;
  $vendedor = remove('vendedores', $id);
  header('location: index.php');
}