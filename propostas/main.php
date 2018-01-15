<?php  
session_start();
 require_once('functions.php');   
$proposta1_id = $_POST['proposta1'];
$proposta2_id = $_POST['proposta2'];
$proposta3_id = $_POST['proposta3'];
$proposta4_id = $_POST['proposta4'];
$proposta1 = find('propostas', $proposta1_id);
$proposta2 = find('propostas', $proposta2_id);
$proposta3 = find('propostas', $proposta3_id);
$proposta4= find('propostas', $proposta4_id);


$cliente_id = $_POST['cliente_id'];
$cliente = $_POST['cliente_nome'];
$data = date("d-m-Y");
$cidade = $_POST['cliente_cidade'];
$telefone = $_POST['cliente_telefone'];
$celular = $_POST['cliente_celular'];
$email = $_POST['cliente_email'];
$vendedor = $_POST['vendedor'];
$vendedor_id = $_POST['vendedor_id'];

if ($celular != null){
	$celular = '<strong>Celular : '.$celular.'</strong><br>';
}else{
	$celular = '';
}

$proposta_id = $proposta1['id'];
$valor = $proposta1['valor'];
$titulo = $proposta1['titulo'];
$linha1 = $proposta1['linha1'];
$linha2 = $proposta1['linha2'];
$linha3 = $proposta1['linha3'];
$linha4 = $proposta1['linha4'];
$linha5 = $proposta1['linha5'];
$linha6 = $proposta1['linha6'];
$linha7 = $proposta1['linha7'];
if (strlen($linha7) > 10){
	$linha7 = $linha7.' <br> ';
}

require_once('modelo_1.php');

$valor = $proposta2['valor'];
$titulo = $proposta2['titulo'];
$linha1 = $proposta2['linha1'];
$linha2 = $proposta2['linha2'];
$linha4 = $proposta2['linha4'];
$linha5 = $proposta2['linha5'];
$linha6 = $proposta2['linha6'];
require_once('modelo_2.php');

$valor = $proposta3['valor'];
$titulo = $proposta3['titulo'];
$linha1 = $proposta3['linha1'];
$linha2 = $proposta3['linha2'];
$linha3 = $proposta3['linha3'];
$linha4 = $proposta3['linha4'];
$linha5 = $proposta3['linha5'];
$linha6 = $proposta3['linha6'];
require_once('modelo_3.php');

$valor = $proposta4['valor'];
$titulo = $proposta4['titulo'];
$linha1 = $proposta4['linha1'];
$linha2 = $proposta4['linha2'];
$linha3 = $proposta4['linha3'];
$linha4 = $proposta4['linha4'];
$linha5 = $proposta4['linha5'];
$linha6 = $proposta4['linha6'];
require_once('modelo_4.php');






$saida = $_POST['saida'];


if($saida == "Visualizar"){
	ob_clean();


	if($proposta1_id != 0){
		viewPdf($vendedor_id,$cliente_id,$modelo1);
	}
	if($proposta2_id != 0){
		viewPdf($vendedor_id,$cliente_id,$modelo2);
	}
	if($proposta3_id != 0){
		viewPdf($vendedor_id,$cliente_id,$modelo3);
	}
	if($proposta4_id != 0){
		viewPdf($vendedor_id,$cliente_id,$modelo4);
	}


}elseif($saida == "Imprimir"){

	if($proposta1_id != 0){
		imprimirPdf($vendedor_id,$cliente_id,$modelo1);
	}
	if($proposta2_id != 0){
		imprimirPdf($vendedor_id,$cliente_id,$modelo2);
	}
	if($proposta3_id != 0){
		imprimirPdf($vendedor_id,$cliente_id,$modelo3);
	}
	if($proposta4_id != 0){
		imprimirPdf($vendedor_id,$cliente_id,$modelo4);
	}



	echo "<script>window.print();</script>";
}elseif($saida == "Email"){
	if($proposta1_id != 0 and $proposta2_id != 0){	

		$pdf1 = gerapdf($vendedor_id,$proposta1['id'],$cliente_id,$modelo1,$proposta1['valor']);
		$pdf2 = gerapdf($vendedor_id,$proposta2['id'],$cliente_id,$modelo2,$proposta2['valor']);
		echo ("
<script>
window.location.href = \"../mail/enviar.php?id=".$cliente_id."&proposta1=".$pdf1."&proposta2=".$pdf2."&tipo=2&num=2\";
</script>
");

		
		
	}elseif($proposta1_id != 0 and $proposta2_id == 0){

		$pdf1 = gerapdf($vendedor_id,$proposta1['id'],$cliente_id,$modelo1,$proposta1['valor']);
		 echo ("
<script>
window.location.href = \"../mail/enviar.php?id=".$cliente_id."&proposta1=".$pdf1."&tipo=2&num=1\";
</script>
");
		//header("Location: ../mail/enviar.php?id=".$cliente_id."&proposta1=".$pdf1."&tipo=2&num=1"); exit;
		

	}elseif($proposta2_id != 0 and $proposta1_id == 0){

		$pdf2 = gerapdf($vendedor_id,$proposta2['id'],$cliente_id,$modelo2,$proposta2['valor']);
		echo ("
<script>
window.location.href = \"../mail/enviar.php?id=".$cliente_id."&proposta2=".$pdf2."&tipo=2&num=1\";
</script>
");
		
		
	}elseif($proposta3_id != 0 ){

		$pdf3 = gerapdf($vendedor_id,$proposta3['id'],$cliente_id,$modelo3,$proposta3['valor']);
		echo ("
<script>
window.location.href = \"../mail/enviar.php?id=".$cliente_id."&proposta3=".$pdf3."&tipo=3&num=1\";
</script>
");
		
		
	}elseif($proposta4_id != 0 ){

		$pdf4 = gerapdf($vendedor_id,$proposta4['id'],$cliente_id,$modelo4,$proposta4['valor']);
		echo ("
<script>
window.location.href = \"../mail/enviar.php?id=".$cliente_id."&proposta3=".$pdf4."&tipo=3&num=1\";
</script>
");
		
		
	}


}












?>



