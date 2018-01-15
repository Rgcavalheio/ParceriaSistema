<?php
require_once('../config.php');
require_once(DBAPI);



function index() {
  global $propostas;
  $propostas = find2('propostas');

}

function grava_historico($data,$vendedor,$proposta,$cliente){

  $database = open_database();



  // remove a ultima virgula
  
  $sql = "INSERT INTO historico (data,id_vendedor,id_proposta,id_cliente) VALUES ('".$data."','".$vendedor."','".$proposta."','".$cliente."');";

  try {
    $database->query($sql);
    $array = next_ai();

    $_SESSION['type'] = 'success';
    


  } catch (Exception $e) { 


    $_SESSION['type'] = 'danger';
    
  } 
  close_database($database);


}











