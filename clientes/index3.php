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




<table id="cliente-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Telefone</th>
							<th>Cidade</th>
							<th>Email</th>
							<th>Situação</th>
							
						</tr>
					</thead>
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
				$('#cliente-grid').DataTable({
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
        },"processing": true,
					"serverSide": true,
					"ajax":{
						url :"clientes-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				});
			});
			</script>
