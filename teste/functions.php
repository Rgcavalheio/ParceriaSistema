<?php
require_once('../config.php');
require_once(DBAPI);



function index() {
  global $propostas;
  $propostas = find2('propostas');
    global $historicos;
  $historicos = find_all_hist('historico');

}

function salva_historico($id,$valor){

  $database = open_database();



  // remove a ultima virgula
  
  $sql = "UPDATE historico SET valor = '".$valor."' WHERE id = ".$id;
  

  try {
    $database->query($sql);
    $array = next_ai();

    $_SESSION['type'] = 'success';
    


  } catch (Exception $e) { 


    $_SESSION['type'] = 'danger';
    
  } 
  close_database($database);


}











