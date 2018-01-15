<?php require_once('functions.php'); add(); include(HEADER_TEMPLATE); ?>

<h2>Novo Cliente</h2>

<form id="form" name="form" action="add.php" method="post">
	<!-- area de campos do form -->
	<hr />
	<div class="row">
		<div class="form-group col-md-4">
			<label for="name">Nome</label>
			<input type="text" class="form-control" name="cliente['nome']" required>
			<input type="hidden" class="form-control" name="cliente['id_vendedor']" value="<?php echo $_SESSION['UsuarioID']; ?>">
		</div>

		<div class="form-group col-md-4">
			<label for="campo3">Email</label>
			<input type="text" id='email' class="form-control" style="text-transform: lowercase;" name="cliente['email']" required> 
		</div>
	<div class="form-group col-md-3">
	<br>
		<div style="color:red" id='resposta'></div>
		<p id="erro" class="hidden" style="color:red">Email-Inválido</p>
		</div>

	</div>


	<div class="row">
		<div class="form-group col-md-4">
			<label for="campo2">Telefone</label>
			<input onkeypress="mascara(this,telefone)" id="telefone" type="text" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}" maxlength="17" class="form-control" name="cliente['telefone']" required>
		</div>

		<div class="form-group col-md-4">
			<label for="campo3">Celular</label>
			<input onkeypress="mascara(this,celular)" id="celular" type="text" pattern="\([0-9]{2}\)[\s][9]{1}-[0-9]{4}-[0-9]{4}" maxlength="17" class="form-control" name="cliente['celular']">
		</div>
	</div>



	<div class="row">

		<div class="form-group col-md-3">
			<label for="campo2">Estado</label>


			<select id="estados" class="form-control" name="cliente['uf']" required>      
				<option value=""></option>
			</select>



		</div>

		<div class="form-group col-md-5">
			<label for="cod_cidades">Cidade</label>
			<select id="cidades" class="form-control" name="cliente['cidade']" required>

			</select>
		</div>


	</div>
	<div class="row">



		<div class="form-group col-md-3" hidden>
			<label for="campo3">Situação</label>
			<input type="text" class="form-control" name="cliente['situacao']" value="1">
		</div>
	</div>





	<div id="actions" class="row">
		<div class="col-md-12">
			<button id="submit" type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php" class="btn btn-default">Cancelar</a>
		</div>
	</div>
</form>





<?php include(FOOTER_TEMPLATE);



// VALIDADOR EMAIL EXISTENTE
// <script language="javascript">
//     var email = $("#email"); 
//         email.blur(function() { 
//             $.ajax({ 
//                 url: 'verificaEmail.php', 
//                 type: 'POST', 
//                 data:{"email" : email.val()}, 
//                 success: function(data) { 
//                 console.log(data); 
//                 data = $.parseJSON(data); 
//                 if(data.email == 'Ja existe um usuario cadastrado com este email'){
//                 	$("#resposta").text(data.email);
//                 	$("#submit").show().addClass("hidden");
//                 	$("#resposta").show().removeClass("hidden");
                	
//                 	}else{
//                 		$("#resposta").text(data.email);
//                 		$("#submit").show().removeClass("hidden");
//                 		$("#resposta").show().addClass("hidden");
//                 	}
                
                
//             } 
//         }); 
//     }); 
// </script>

 ?>



<script type="text/javascript"> 

	$(document).ready(function () {

		$("#telefone").mask("(00) 0000-0000");
		$("#celular").mask("(00) 0-0000-0000");

		$.getJSON('estados_cidades.json', function (data) {
			var items = [];
			var options = '<option value="">escolha um estado</option>';  
			$.each(data, function (key, val) {
				options += '<option value="' + val.nome + '">' + val.nome + '</option>';
			});         
			$("#estados").html(options);        

			$("#estados").change(function () {        

				var options_cidades = '';
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