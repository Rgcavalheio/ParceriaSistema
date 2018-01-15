<?php
require_once('functions.php');


global $vendedores;
$vendedores = find3();



include(HEADER_TEMPLATE); 
check_acesso(2);
?>


<header>


	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">





	<div class="row">
		<div class="col-sm-6">
			<h2>Detalhes de propostas geradas</h2>
		</div>
		
	</div>
</header>



<?php

if(isset($_POST['ini'])){
	$data1 = $_POST['ini'];
}else{
	$data1 = null;
}
if(isset($_POST['fim'])){
	$data2 = $_POST['fim'];
}else{
	$data2 = null;
}


?>





<hr>
<div id="alert"></div>

<form action="index.php" method="post">
	<div class="row">
		
	</div>
	<div class="row"> 
		<div class="form-group col-sm-2">
			<br>
			<label >Defina o Periodo:</label>
		</div>
		<div class="form-group col-sm-3">
			<p>Data Inicial: <input name="data1" type="text" value="<?php if(isset($_POST['data1'])){echo $_POST['data1'];} ?>" id="datepicker1"></p>
		</div>
		<div class="form-group col-sm-3">
			<p>Data Final: <input  name="data2" type="text" value="<?php if(isset($_POST['data2'])){echo $_POST['data2'];} ?>"  id="datepicker2"></p>
		</div>
		<div class="form-group col-sm-3">
			<br>
			<button type="submit" class="btn btn-default">Pesquisar</button>
		</div>
	</div>


</form>

<?php if ($vendedores) :
	$lista = array();
	$pessoa = array();

	?>
	<?php foreach ($vendedores as $vendedor) : 
	unset($historicos);

	if(isset($_POST['data1']) and isset($_POST['data2'])){

		$data1 =  $_POST['data1'];
		$data2 =  $_POST['data2'];


		$new1 = convert_date($data1,'db');
		$new2 = convert_date($data2,'db');


		
		$historicos = find_por_vendedor_h($vendedor['id'],$new1,$new2);

	}else{	
		$historicos = find_por_vendedor_h($vendedor['id']);
	}
	$pessoa['nome'] = $vendedor['nome'];
	$pessoa['qnde'] = count($historicos);
	$soma = 0;

	if($historicos != null){
		foreach ($historicos as $historico) {


			$atual = intval(str_replace('.', '', $historico['valor']));
			$atual = intval(str_replace(',', '', $atual));
			$soma = $soma + $atual;
		}


		$pessoa['soma'] = $soma;
		$pessoa['media'] = floor($soma/$pessoa['qnde']);
	}

	if($pessoa['qnde'] > 0){
	array_push($lista, $pessoa);
	}
	arsort($lista);
	endforeach; 

	endif; 


	?>

	<table class="table table-bordered table-hover" id="id_da_tabela">
		<thead>
			<tr>
				<td>Nome</td>
				<td>Propostas Enviadas</td>
				<td>Valor Total (R$)</td>
				<td>Média (R$)</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($lista as $pessoa) {
				?>
				<tr>
					<td><?php echo $pessoa['nome']; ?></td>
					<td><?php echo $pessoa['qnde']; ?></td>
					<td><?php echo number_format($pessoa['soma'], 2, '.', ','); ?></td>

					<td><?php echo number_format($pessoa['media'], 2, '.', ',');  ?></td>

				</tr>
				<?php } ?>

			</tbody>
		</table>
		<?php












		include(FOOTER_TEMPLATE); ?>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


		<script>
			$(document).ready(function(){
				$('#id_da_tabela').DataTable({
					"order": [[ 1, "desc" ]],
					"bInfo" : false,
					paging: false,
					"searching": false,
					"language": {
						"lengthMenu": "Mostrando _MENU_ registros por página",
						"zeroRecords": "Nada encontrado",
						"info": "Mostrando página _PAGE_ de _PAGES_",
						"infoEmpty": "Nenhum registro disponível",
						"infoFiltered": "(filtrado de _MAX_ registros no total)"
					}
				});
			});

			$('#datepicker1').datepicker({
				format: 'dd/mm/yyyy'

			});
			$('#datepicker2').datepicker({
				format: 'dd/mm/yyyy'

			});


		</script>

