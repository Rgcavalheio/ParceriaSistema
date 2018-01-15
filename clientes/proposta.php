<?php 
require_once('functions.php'); 
 include(HEADER_TEMPLATE);

index();

view($_GET['id']);

$cliente_nome = mb_strtoupper($cliente['nome']);

$cliente_cidade = mb_strtoupper($cliente['cidade']);
$cliente_telefone = $cliente['telefone'];
$cliente_celular = $cliente['celular'];
$cliente_email = mb_strtoupper($cliente['email']);
$vendedor_id = mb_strtoupper($_SESSION['UsuarioID']);
$vendedor = mb_strtoupper($_SESSION['UsuarioNome']);





?>

<h2>Gerar Proposta</h2>
<br>

<form action="<?php echo BASEURL; ?>propostas/main.php" method="post">


	<input type="hidden" name="cliente_nome" value="<?php echo $cliente_nome ?>" >
	<input type="hidden" name="status" value="1" >
	<input type="hidden" name="cliente_id" value="<?php echo $cliente['id'] ?>" >

	<input type="hidden" name="cliente_cidade" value="<?php echo $cliente_cidade ?>">
	<input type="hidden" name="cliente_telefone" value="<?php echo $cliente_telefone ?>">
	<input type="hidden" name="cliente_celular" value="<?php echo $cliente_celular ?>">
	<input type="hidden" name="cliente_email" value="<?php echo $cliente_email ?>">
	<input type="hidden" name="vendedor" value="<?php echo $vendedor ?>">
	<input type="hidden" name="vendedor_id" value="<?php echo $vendedor_id ?>">


	<div class="row">
		<div class="form-group col-md-4">
			<label for="name">Escolha o modelo da proposta (Padrão):</label>

			<select class="form-control" name="proposta1" id="proposta">

				<option value="0"> Escolha um modelo</option>


				<?php foreach ($propostas1 as $proposta1) : ?>


					<option value="<?php echo $proposta1['id'] ?>">  <?php echo $proposta1['descricao']; ?> </option>

				<?php endforeach; ?>

			</select>

		</div>
	</div>	
	<div class="row">
		<div class="form-group col-md-4">
			<label for="name">Escolha o modelo da proposta (Simples):</label>

			<select class="form-control" name="proposta2" id="proposta">
				<option value="0"> Escolha um modelo</option>

				<?php foreach ($propostas2 as $proposta2) : ?>


					<option value="<?php echo $proposta2['id'] ?>">  <?php echo $proposta2['descricao']; ?> </option>

				<?php endforeach; ?>

			</select>

		</div>
			</div>	
			<div class="row">
		<div class="form-group col-md-4">
			<label for="name">Escolha o modelo de Financiamento:</label>

			<select class="form-control" name="proposta3" id="proposta">
				<option value="0"> Escolha um modelo</option>

				<?php foreach ($propostas3 as $proposta3) : ?>


					<option value="<?php echo $proposta3['id'] ?>">  <?php echo $proposta3['descricao']; ?> </option>

				<?php endforeach; ?>

			</select>

		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
			<label for="name">Escolha o modelo de Contemplada:</label>

			<select class="form-control" name="proposta4" id="proposta">
				<option value="0"> Escolha um modelo</option>

				<?php foreach ($propostas4 as $proposta4) : ?>


					<option value="<?php echo $proposta4['id'] ?>">  <?php echo $proposta4['descricao']; ?> </option>

				<?php endforeach; ?>

			</select>

		</div>
	</div>

	<div class="row">

		<div class="form-group col-md-5">
			<label for="name">Escolha a saida:</label><br>
			

			<label class="form-group">
				<input type="radio" value="Visualizar" name="saida" checked>Visualizar
			</label>
			<label class="form-group">
				<input type="radio" value="Imprimir" name="saida">Imprimir
			</label>
			<label class="form-group">
				<input type="radio" value="Email" name="saida">Enviar por E-mail
			</label>



		</div>




	</div>
	



	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Próximo</button>
			
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>
</form>

<?php include(FOOTER_TEMPLATE); ?>