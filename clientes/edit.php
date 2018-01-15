<?php   require_once('functions.php');   edit(); include(HEADER_TEMPLATE);   check_acesso(1);
?>



<h2>Editar Cliente</h2>

<form action="edit.php?id=<?php echo $cliente['id']; ?>" method="post">
  <hr />

   <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="cliente['nome']" value="<?php echo $cliente['nome']; ?>">
    </div>
        <div class="form-group col-md-4">
      <label for="campo3">Email</label>
      <input type="text" class="form-control" id="email" name="cliente['email']" value="<?php echo $cliente['email']; ?>">
    </div>
    <div class="form-group col-md-3">
	<br>

		<p id="erro" class="hidden" style="color:red">Email-Inválido</p>
		</div>

       </div>
    
    <div class="row">
<div class="form-group col-md-4">
      <label for="campo2">Telefone</label>
      <input type="text" onkeypress="mascara(this,telefone)" id="telefone" type="text" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}" maxlength="17" class="form-control" name="cliente['telefone']" value="<?php echo $cliente['telefone']; ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">Celular</label>
      <input onkeypress="mascara(this,celular)" id="celular" type="text" pattern="\([0-9]{2}\)[\s][9]{1}-[0-9]{4}-[0-9]{4}" maxlength="17" class="form-control" name="cliente['celular']" value="<?php echo $cliente['celular']; ?>">
    </div>
  </div>
 

  
  <div class="row">
      <div class="form-group col-md-3">
			<label for="campo2">Estado</label>


			<select id="estados" class="form-control" name="cliente['uf']" required>      
				<option value=""></option>
			</select>
    </div>
    <div class="form-group col-md-4">
			<label for="cod_cidades">Cidade</label>
			<select id="cidades" class="form-control" name="cliente['cidade']"  required>
			<option value="<?php echo $cliente['cidade']; ?>"><?php echo $cliente['cidade']; ?></option>
			</select>
    </div>


  </div>
      <div class="row">
    

    
   
  

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
<script type="text/javascript"> 

	$(document).ready(function () {

		$("#telefone").mask("(00) 0000-0000");
		$("#celular").mask("(54) 0-0000-0000");

		$.getJSON('estados_cidades.json', function (data) {
			var items = [];
			var options = "<option value='<?php echo $cliente['uf']; ?>'><?php echo $cliente['uf']; ?></option>";  
			$.each(data, function (key, val) {
				options += '<option value="' + val.nome + '">' + val.nome + '</option>';
			});         
			$("#estados").html(options);        

			$("#estados").change(function () {        

				var options_cidades = "<option value='<?php echo $cliente['cidade']; ?>'><?php echo $cliente['cidade']; ?></option>";  
				var str = "";         

				$("#estados option:selected").each(function () {
					str += $(this).text();
				});

				$.each(data, function (key, val) {
					if(val.nome == str) {             
						$.each(val.cidades, function (key_city, val_city) {
							options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
						});             
					}
				});
				$("#cidades").html(options_cidades);

			}).change();    

		});

		$("form").submit(function () {
			
		//atribuindo o valor do campo
		var sEmail	= $("#email").val();
		// filtros
		var emailFilter=/^.+@.+\..{2,}$/;
		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
		// condição
		if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
			$("#erro").show().removeClass("hidden").addClass("erro")
			.text('Por favor, informe um email válido.');
			return false;
		}else{
			$("#erro").show().addClass("hidden")
			.text('Email informado está correto!');
			return true;
		}

	});
		




	});







</script> 