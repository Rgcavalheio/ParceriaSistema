<?php 
ob_start(); 
require_once('functions.php'); 
edit();
?>
<?php include(HEADER_TEMPLATE);
check_acesso(2);
 ?>

<h2>Editar Proposta</h2>
<br>

<form action="edit.php?id=<?php echo $proposta['id']; ?>" method="post">


	<div class="row">
		<div class="form-group col-md-1">
			<label for="name">Código</label>
			<input type="text" class="form-control" name="proposta['id']" value="<?php echo $proposta['id']; ?>" disabled>
		</div>
	
		<div class="form-group col-md-2">
			<label for="campo2">Descrição</label>
			<input type="text" class="form-control" name="proposta['descricao']" value="<?php echo $proposta['descricao']; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Sequencia</label>
			<input type="text" class="form-control" name="proposta['sequencia']" value="<?php echo $proposta['sequencia']; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="campo3">Administradora</label>
			<input type="text" class="form-control" name="proposta['administradora']" value="<?php echo $proposta['administradora']; ?>">
		</div>

		 <div class="form-group col-md-3">
    <label for="campo3">Tipo</label>
    		<select class="form-control" name="proposta['tipo']" id="tipo">

				<option value="1" <?php if ($proposta['tipo'] == 1){echo 'selected';} ?> > Padrão</option>
				<option value="2" <?php if ($proposta['tipo'] == 2){echo 'selected';} ?> > Simples</option>
				<option value="3" <?php if ($proposta['tipo'] == 3){echo 'selected';} ?> > Financiamento</option>
				<option value="4" <?php if ($proposta['tipo'] == 4){echo 'selected';} ?> > Contemplado</option>
				</select>





 </div>

	</div>
		<div class="row">

		<div class="form-group col-md-8">
			<label for="campo3">Titulo</label>
			<input type="text" class="form-control" name="proposta['titulo']" value="<?php echo $proposta['titulo']; ?>">
		</div>
	</div>

	<div class="row">

	<div class="form-group col-md-8">
			<label for="campo3">Valor</label>
			<input type="text" class="form-control" onkeypress="mascara(this,moeda)" name="proposta['valor']" value="<?php echo $proposta['valor']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 1</label>
			<input type="text" class="form-control" name="proposta['linha1']" value="<?php echo $proposta['linha1']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 2</label>
			<input type="text" class="form-control" name="proposta['linha2']" value="<?php echo $proposta['linha2']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 3</label>
			<input type="text" class="form-control" name="proposta['linha3']" value="<?php echo $proposta['linha3']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 4</label>
			<input type="text" class="form-control" name="proposta['linha4']" value="<?php echo $proposta['linha4']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 5</label>
			<input type="text" class="form-control" name="proposta['linha5']" value="<?php echo $proposta['linha5']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 6</label>
			<input type="text" class="form-control" name="proposta['linha6']" value="<?php echo $proposta['linha6']; ?>">
		</div>

		<div class="form-group col-md-8">
			<label for="campo3">Linha 7</label>
			<input type="text" class="form-control" name="proposta['linha7']" value="<?php echo $proposta['linha7']; ?>">
		</div>

		
	</div>





	<div id="actions" class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>
</form>

<?php include(FOOTER_TEMPLATE); ?>