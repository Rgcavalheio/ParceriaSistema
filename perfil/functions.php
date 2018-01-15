<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */



function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['usuario'])) {
      $usuario = $_POST['usuario'];      
      update('vendedores', $id, $usuario);
      header('location: index.php');
    } else {
      global $usuario;
      $usuario = find('vendedores', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function view($id = null) {
  global $usuario;
  $usuario = find('vendedores', $id);
}
function delete($id = null) {
  global $lembrete;
  $lembrete = remove('lembretes', $id);





}
