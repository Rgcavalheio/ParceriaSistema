<?php
require_once('../config.php');
require_once(DBAPI);

/**
 *  Listagem de Clientes
 */
function login($login = null , $password = null) {
  
  	$table = 'usuarios';
	$database = open_database();
	$found = false;
	try {



	  
	    $sql = "SELECT login,password FROM usuarios WHERE login = '" . $login . "' and password = '" . $password . "'";
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = true;
	    }
	    
	




	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);


	return $found;
}
