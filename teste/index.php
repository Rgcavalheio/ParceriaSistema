<?php

include('functions.php');
index();
$idproposta = array();
$valorproposta = array();


 foreach ($propostas as $proposta) :


array_push($idproposta, $proposta['id']);
array_push($valorproposta, $proposta['valor']);
 endforeach; 



 foreach ($historicos as $historico) :

 foreach ($idproposta as $key => $proposta) :
 	if($historico['id_proposta'] == $proposta){
 		$valor = $valorproposta[$key];
 	}
  endforeach; 	


//echo $historico['id_proposta'];
  salva_historico($historico['id'],$valor);
echo 'id:'.$historico['id'].' valor:'.$valor.'<br>';
 endforeach;