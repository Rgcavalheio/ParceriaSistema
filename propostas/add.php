<?php 
ob_start(); 
require_once('functions.php'); 
add();
include(HEADER_TEMPLATE); 

check_acesso(2);
?>
<style>
	.invisivel { display: none; }
	.visivel { visibility: visible; }
</style>




<h2>Nova Proposta</h2>

<form action="add.php" method="post">
	<!-- area de campos do form -->
	<hr />
	<div class="row">

		<div class="form-group col-md-6">
			<label for="campo2">Descrição</label>
			<input type="text" class="form-control" name="proposta['descricao']">
		</div>

		<div class="form-group col-md-1">
			<label for="campo3">Sequência</label>
			<input type="text" class="form-control" name="proposta['sequencia']">
		</div>

		<div class="form-group col-md-3">
			<label for="campo3">Administradora</label>
			<input type="text" class="form-control" name="proposta['administradora']">
		</div>

		<div class="form-group col-md-3">
			<label for="campo3">Tipo</label>
			<select class="form-control" name="proposta['tipo']" id="select" >
				<option value="0"> Escolha um modelo</option>
				<option value="1"> Padrão</option>
				<option value="2"> Simples</option>
				<option value="3"> Financiamento</option>
				<option value="4"> Contemplado</option>
			</select>
		</div>

	</div>
	<br>


	<div class="row">
		<div class="form-group col-md-8">
			<label for="campo3">Título</label>
			<input type="text" class="form-control" name="proposta['titulo']">
		</div>
	</div>


	<div class="row">


		<div class="form-group col-md-8">
			<label for="campo3">Valor</label>
			<input type="text" onkeypress="mascara(this,moeda)" class="form-control" name="proposta['valor']">
		</div>

		<div id="linha1" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 1</label>
			<input id="linha1txt" type="text" value="<?php echo 'Prazo de pagamento: '; ?>" class="form-control" name="proposta['linha1']">
		</div>
		<div id="linha2" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 2</label>
			<input id="linha2txt" type="text" value="<?php echo 'Valor da 1º parcela: R$ '; ?>" class="form-control" name="proposta['linha2']">
		</div>

		<div id="linha7" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 7</label>
			<input id="linha7txt" type="text" value="<?php echo ' '; ?>" class="form-control" name="proposta['linha7']">
		</div>

		<div id="linha3" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 3</label>
			<input id="linha3txt" type="text" value="<?php echo 'Valor das demais parcelas: R$ '; ?>" class="form-control" name="proposta['linha3']">
		</div>
		<div id="linha4" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 4</label>
			<input id="linha4txt" type="text" value="<?php echo 'Lance que vai ser descontado do crédito: R$ '; ?>" class="form-control" name="proposta['linha4']">
		</div>
		<div id="linha5" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 5</label>
			<input id="linha5txt" type="text" value="<?php echo 'Crédito que sobra descontado o lance: R$ '; ?>" class="form-control" name="proposta['linha5']">
		</div>
		<div id="linha6" class="form-group col-md-8 invisivel">
			<label for="campo3">Linha 6</label>
			<input id="linha6txt" type="text" value="<?php echo 'Saldo após contemplação por lance: R$ '; ?>" class="form-control" name="proposta['linha6']">
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
<script type="text/javascript">
	$(document).ready(function(){

		$('#select').on('change',function(){
			document.getElementById("linha1").className = "form-group col-md-8 invisivel";
			document.getElementById("linha2").className = "form-group col-md-8 invisivel";
			document.getElementById("linha3").className = "form-group col-md-8 invisivel";
			document.getElementById("linha4").className = "form-group col-md-8 invisivel";
			document.getElementById("linha5").className = "form-group col-md-8 invisivel";
			document.getElementById("linha6").className = "form-group col-md-8 invisivel";
			document.getElementById("linha7").className = "form-group col-md-8 invisivel";

			var selectValor = $(this).val();


			if (selectValor == 1){
				document.getElementById("linha1").className = "form-group col-md-8 visivel";
				document.getElementById("linha1txt").value = "Prazo de pagamento: ";
				document.getElementById("linha2").className = "form-group col-md-8 visivel";
				document.getElementById("linha2txt").value = "Valor da 1º parcela: R$ ";
				document.getElementById("linha3").className = "form-group col-md-8 visivel";
				document.getElementById("linha3txt").value = "Valor das demais parcelas: R$ ";
				document.getElementById("linha4").className = "form-group col-md-8 visivel";
				document.getElementById("linha4txt").value = "Lance que vai ser descontado do crédito: R$ ";
				document.getElementById("linha5").className = "form-group col-md-8 visivel";
				document.getElementById("linha5txt").value = "Crédito que sobra descontado o lance: R$ ";
				document.getElementById("linha6").className = "form-group col-md-8 visivel";
				document.getElementById("linha6txt").value = "Saldo após contemplação por lance: R$ ";
				

			}
			if (selectValor == 2){
				document.getElementById("linha1").className = "form-group col-md-8 visivel";
				document.getElementById("linha1txt").value = "Prazo de pagamento: ";
				document.getElementById("linha2").className = "form-group col-md-8 visivel";
				document.getElementById("linha2txt").value = "Valor da 1º parcela: R$ ";
				document.getElementById("linha3").className = "form-group col-md-8 visivel";
				document.getElementById("linha3txt").value = "Lance que vai ser descontado do crédito: R$ ";
				document.getElementById("linha4").className = "form-group col-md-8 visivel";
				document.getElementById("linha4txt").value = "Crédito que sobra descontado o lance: R$ ";
				document.getElementById("linha5").className = "form-group col-md-8 visivel";
				document.getElementById("linha5txt").value = "Saldo após contemplação por lance: R$ ";

			}
			if (selectValor == 3){
				document.getElementById("linha1").className = "form-group col-md-8 visivel";
				document.getElementById("linha1txt").value = "PRAZO DE PAGAMENTO: ";
				document.getElementById("linha2").className = "form-group col-md-8 visivel";
				document.getElementById("linha2txt").value = "VALOR DAS PARCELAS: R$ ";
				document.getElementById("linha3").className = "form-group col-md-8 visivel";
				document.getElementById("linha3txt").value = "SALDO DEVEDOR: R$ ";

			}
			if (selectValor == 4){
				document.getElementById("linha1").className = "form-group col-md-8 visivel";
				document.getElementById("linha1txt").value = "ENTRADA: R$";
				document.getElementById("linha2").className = "form-group col-md-8 visivel";
				document.getElementById("linha2txt").value = "VALOR DAS PARCELAS: R$ ";
				document.getElementById("linha3").className = "form-group col-md-8 visivel";
				document.getElementById("linha3txt").value = "SALDO DEVEDOR: R$ ";

			}


		});


	});

</script>