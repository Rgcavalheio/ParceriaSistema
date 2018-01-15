<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */


function index() {
  global $historicos;
  $historicos = find_all_hist('historico');
  
}
function view_vendedor($id = null) {
  global $vendedor;
  $vendedor = find('vendedores', $id);
}
function view_proposta($id = null) {
  global $proposta;
  $proposta = find('propostas', $id);
}
function view_cliente($id = null) {
  global $cliente;
  $cliente = find('clientes', $id);
}

