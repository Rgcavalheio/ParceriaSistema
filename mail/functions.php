<?php
require_once('../config.php');
require_once(DBAPI);


$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */


function view($id = null) {
  global $cliente;
  $cliente = find('clientes', $id);

  global $vendedor;
  $vendedor = find('vendedores', $_SESSION['UsuarioID']);
}
