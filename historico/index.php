<?php
require_once('functions.php');

index();
include(HEADER_TEMPLATE); 
check_acesso(2);
?>


<header>

	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">





	<div class="row">
		<div class="col-sm-6">
			<h2>Histórico de propostas geradas</h2>
		</div>
		
	</div>
</header>






<div class="col-sm-5">

</div>
<hr>
<div id="alert"></div>


<table class="table table-bordered table-hover" id="id_da_tabela">
	<thead>
		<tr>
			<th width="240px">Data</th>
			<th width="120px">Contato</th>
			<th width="120px">Cidade</th>
			<th width="200px">Telefone</th>
			<th width="120px">E-mail</th>
			<th width="120px">Vendedor</th>
			<th width="120px">Proposta</th>
			<th width="120px"></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($historicos as $historico) {


			$historico = array_map('utf8_encode', $historico);
			view_cliente($historico['id_cliente']);
			view_vendedor($historico['id_vendedor']);
			view_proposta($historico['id_proposta']);


			?>
			<tr>
				<td><?php 
					$newDate = date("d-m-Y", strtotime($historico['data']));
					echo $newDate;


					?></td>
					<td><?php  echo strtoupper($cliente['nome']);  ?></td>	
					<td><?php  echo $cliente['cidade'];  ?></td>
					<td><?php  echo $cliente['telefone'];  ?></td>	
					<td><?php  echo strtolower($cliente['email']);  ?></td>				
					<td><?php  echo $vendedor['nome'];  ?></td>
					<td><?php  echo $proposta['descricao']; ?></td>
					<td><a href="..\propostas_geradas\<?php echo $historico['id'] ?>.pdf"><span class="glyphicon glyphicon-eye-open"></span>Visualizar </a> </td>
				</tr>
				<?php } ?>

			</tbody>
		</table>











		<?php include(FOOTER_TEMPLATE); ?>


		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


		<script>
			$(document).ready(function(){
				$('#id_da_tabela').DataTable({
					"order": [[ 1, "desc" ]],
					"bInfo" : false,
					paging: true,
										"searching": true,
					"language": {
						"lengthMenu": "Mostrando _MENU_ registros por página",
						"zeroRecords": "Nada encontrado",
						"info": "Mostrando página _PAGE_ de _PAGES_",
						"infoEmpty": "Nenhum registro disponível",
						"infoFiltered": "(filtrado de _MAX_ registros no total)"
					}
				});
			});
		</script>

