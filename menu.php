<?php require_once 'config.php';  require_once DBAPI;  include(HEADER_TEMPLATE);





if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança

  // Redireciona o visitante de volta pro login
	echo ("
		<script>
		window.location.href = \"login/index.php\";
		</script>
		");
}



?>
<?php $db = open_database(); ?>

<style type="text/css">
	.min-height-200 { min-height: 150px; min-width: 150px; } 
</style>

<h1>Menu</h1>
<hr />

<?php 
$tela_mt_pequena = "col-xs-4";
$tela_pequena = "col-sm-2";
$tela_media = "col-md-2";
$outros = "min-height-200";
$config_grid = $tela_mt_pequena.' '.$tela_pequena.' '.$tela_media.' '.$outros;



if ($db) : 


?>

	<div class="row">


		<div class="<?php echo $config_grid; ?>">
			<a href="clientes/add.php" class="btn btn-primary">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-plus fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Novo Cliente</p>
					</div>
				</div>
			</a>
		</div>


		<div class="<?php echo $config_grid; ?>">
			<a href="clientes/index.php" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Clientes</p>
					</div>
				</div>
			</a>
		</div>
		<div class="<?php echo $config_grid; ?>">
			<a href="email" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Web-mail</p>
					</div>
				</div>
			</a>
		</div>
		<div class="<?php echo $config_grid; ?>">
				<a href="capturador" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Capturador</p>
						</div>
					</div>
				</a>
			</div>


		<?php 
		if ($_SESSION['UsuarioNivel'] > 1){    
			?>

			<div class="<?php echo $config_grid; ?>">
				<a href="propostas" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Propostas</p>
						</div>
					</div>
				</a>
			</div>


			<div class="<?php echo $config_grid; ?>">
				<a href="usuarios" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Usuários</p>
						</div>
					</div>
				</a>
			</div>

			<div class="<?php echo $config_grid; ?>">
				<a href="historico" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Histórico</p>
						</div>
					</div>
				</a>
			</div>
			<div class="<?php echo $config_grid; ?>">
				<a href="estatisticas" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Estatísticas</p>
						</div>
					</div>
				</a>
			</div>
			<div class="<?php echo $config_grid; ?>">
				<a href="graficos" class="btn btn-default">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Gráficos</p>
						</div>
					</div>
				</a>
			</div>
			

			<?php 
		}
		?>


	</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>



<?php include(FOOTER_TEMPLATE); ?>