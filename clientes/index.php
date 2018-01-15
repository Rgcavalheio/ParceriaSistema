<?php
require_once('functions.php');
include(HEADER_TEMPLATE);



index();

check_acesso(1);

function limitador($txt,$num){

$len = strlen($txt);

if ($len > $num){
	$txt = substr($txt, 0, $num);
	$txt = $txt.'...';
}
 return $txt;
}

?>

<header>

	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">





	<div class="row">
		<div class="col-sm-2">
			<h2>Clientes</h2>
			
		</div>
		<div class="col-sm-4" style="padding-top: 25px;">
			
		
		</div>



		<div class="col-sm-6 text-right h2">

			<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
			<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>	    
			<?php
			if ($_SESSION['UsuarioNivel'] > 1){  
				?>	 
				
				
				<a href="index2.php" class="btn btn-default">Carregar Todos</a>
				<?php
			}
			?>

		</div>
	</div>
</header>



<?php
$estadosBrasileiros = array(
'Acre'=>'AC',
'Alagoas'=>'AL',
'Amapá'=>'AP',
'Amazonas'=>'AM',
'Bahia'=>'BA',
'Ceará'=>'CE',
'Distrito Federal'=>'DF',
'Espírito Santo'=>'ES',
'Goiás'=>'GO',
'Maranhão'=>'MA',
'Mato Grosso'=>'MT',
'Mato Grosso do Sul'=>'MS',
'Minas Gerais'=>'MG',
'Pará'=>'PA',
'Paraíba'=>'PB',
'Paraná'=>'PR',
'Pernambuco'=>'PE',
'Piauí'=>'PI',
'Rio de Janeiro'=>'RJ',
'Rio Grande do Norte'=>'RN',
'Rio Grande do Sul'=>'RS',
'Rondônia'=>'RO',
'Roraima'=>'RR',
'Santa Catarina'=>'SC',
'São Paulo'=>'SP',
'Sergipe'=>'SE',
'Tocantins'=>'TO'
);
?>




<hr>
<div id="alert"></div>
<div class="container">



	<table class="table table-bordered table-hover" id="id_da_tabela">
		<thead>
			<tr>
			<th width="40px">Id</th>
			<th width="110px">Nome</th>
			<th width="115px">Telefone(s)</th>
			<th width="150px">Cidade</th>
			<th width="350px">Email</th>
			<th width="100px">Situação</th>
			<th width="200px">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($clientes as $cliente) {
				?>
				<tr>
					<td><?php echo $cliente['id']; ?></td>
					<td><?php echo limitador(strtoupper($cliente['nome']),10); ?></td>
					<td><div class="fone"><?php echo $cliente['telefone'];
					// if($cliente['celular'] != null){
					// 	echo ' - '.$cliente['celular'];
					// }

					 ?></div></td>							
					<td><?php echo limitador($cliente['cidade'].' - '.$estadosBrasileiros[$cliente['uf']],15); ?></td>

					<td><div class="mail"><?php echo limitador(strtolower($cliente['email']),40); ?></div></td>
					<td><?php
						if( $cliente['situacao'] == 1){
							echo "<b style='color: green;'>Ativo</b>";
						}else{
							echo "<b style='color: red;'>Inativo</b>";
						}


						?></td>
						<td class="actions">

							<div class="btn-group">
								
								<button type="button" class="btn btn-danger dropdown-toggle tamanho" data-toggle="dropdown">
									<span class="caret"></span>
									
								</button>
								<ul class="dropdown-menu" role="menu">



									<li>
										<a href="proposta.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-success"><b> Gerar Proposta </b></a>
									</li>
									<li>
										<a href="../mail/enviar.php?id=<?php echo $cliente['id']; ?>&tipo=1" class="btn btn-sm btn-success"><b>Enviar Apresentação </b></a>
									</li>
									<li>
											<a href="edit.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-warning"> <b>Editar </b></a>
										</li>	
									<?php
									if ($_SESSION['UsuarioNivel'] > 1){  
										?>	
																	
										<li>
											<?php
											if( $cliente['situacao'] == 1){ ?>
											<a href="mudar-status.php?id=<?php echo $cliente['id']; ?>&tipo=2" class="btn btn-sm btn-danger">	
												<b>Desativar </b>
											</a>
											<?php	
										}else{ ?>
										<a href="mudar-status.php?id=<?php echo $cliente['id']; ?>&tipo=1" class="btn btn-sm btn-success">	
											<b>Ativar </b>
										</a>
										<?php
									}
									?>
									<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $cliente['id']; ?>">
										<b> Excluir</b>
									</a>




								</li>

								<?php
							}
							?>



						</ul>
					</div>

				</td>
				</tr>
				<?php } ?>

			</tbody>
		</table>


</div>


<div id="output1"></div>
<div id="output2"></div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


		<script>
			$(document).ready(function(){
				$('#id_da_tabela').DataTable({
					"order": [[ 0, "desc" ]],
					"bInfo" : false,
					paging: true,
					"searching": true,
					"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        },
				});
			});
			</script>
