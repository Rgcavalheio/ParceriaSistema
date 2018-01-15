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
			<h2>Gráficos</h2>
		</div>
		
	</div>
</header>



<?php
$m = date('m');
if(isset($_POST['ini'])){
	$data1 = $_POST['ini'];
	$d1 = substr($data1, 3,2);

	update('aux','1',array('data1' => $d1));
}else{
	$data1 = null;

	update('aux','1',array('data1' => $m));
}
if(isset($_POST['fim'])){
	$data2 = $_POST['fim'];
		$d2 = substr($data2, 3,2);

	update('aux','1',array('data2' => $d2));
}else{
	$data2 = null;
		update('aux','1',array('data2' => $m));
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
			<p>Data Inicial: <input name="ini" type="text" value="<?php if(isset($_POST['ini'])){echo $_POST['ini'];} ?>" id="datepicker1"></p>
		</div>
		<div class="form-group col-sm-3">
			<p>Data Final: <input  name="fim" type="text" value="<?php if(isset($_POST['fim'])){echo $_POST['fim'];} ?>"  id="datepicker2"></p>
		</div>
		<div class="form-group col-sm-3">
			<br>
			<button type="submit" class="btn btn-default">Pesquisar</button>
		</div>
	</div>


</form>
<h2>Total de propostas Enviadas</h2>
<img src="graficomespropostas.php"/>
		<a href="graficomespropostas.php">Versão para Impressão</a>

<h2>Soma de valores enviados</h2>
<img src="graficomesvalores.php"/>
		<a href="graficomesvalores.php">Versão para Impressão</a>


<h2>Média de valores enviados</h2>
<img src="graficomesmedia.php"/>
		<a href="graficomesmedia.php">Versão para Impressão</a>


		<?php








		include(FOOTER_TEMPLATE); ?>
	


		<script>
		

			$('#datepicker1').datepicker({
				format: 'dd/mm/yyyy'

			});
			$('#datepicker2').datepicker({
				format: 'dd/mm/yyyy'

			});


		</script>

