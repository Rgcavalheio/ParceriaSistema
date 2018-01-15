<?php
require_once('functions.php');
include(HEADER_TEMPLATE);

?>

<?php 



index();

check_acesso(1);

?>

<header>

	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">





	<div class="row">
		<div class="col-sm-2">
			<h2>Clientes</h2>
			
		</div>
		<div class="col-sm-4" style="padding-top: 25px;">
			
			<input class="form-control" id="search" name="search" placeholder="Pesquisar" type="text" data-list=".list">
		</div>



		<div class="col-sm-6 text-right h2">

			<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
			<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>	    
			<?php
			if ($_SESSION['UsuarioNivel'] > 1){  
				?>	 
				<button class="btn btn-default" onclick="copyMail()">Copiar E-mails</button>
				<button class="btn btn-default" onclick="copyFone()">Copiar Telefones</button>
				<?php
			}
			?>

		</div>
	</div>
</header>








<hr>
<div id="alert"></div>

<table class="table table-hover" style="white-space: nowrap;">
	<thead>
		<tr>
			<th>Id</th>
			<th width="35%">Nome</th>
			<th width="10%">Telefone</th>
			<th width="10%">Celular</th>
			<th>Estado</th>
			<th width="25%">Cidade</th>
			<th>Email</th>
			<th width="5%">Situação</th>
			<th>Opções</th>

		</tr>
	</thead>
	<tbody class="list">
		<?php if ($clientes) : ?>
			<?php foreach ($clientes as $cliente) : ?>
				<tr>
					<td><?php echo $cliente['id']; ?></td>
					<td><?php echo $cliente['nome']; ?></td>
					<td><div class="fone"><?php echo $cliente['telefone']; ?></div></td>
					<td><?php echo $cliente['celular']; ?></td>
					<td><?php echo $cliente['uf']; ?></td>		
					<td><?php echo $cliente['cidade']; ?></td>

					<td><div class="mail"><?php echo $cliente['email']; ?></div></td>
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
									<?php
									if ($_SESSION['UsuarioNivel'] > 1){  
										?>	
										<li>
											<a href="edit.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-warning"> <b>Editar </b></a>
										</li>								
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
		<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td colspan="6">Nenhum registro encontrado.</td>
		</tr>
	<?php endif; ?>
</tbody>
</table>


<div id="output1"></div>
<div id="output2"></div>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
