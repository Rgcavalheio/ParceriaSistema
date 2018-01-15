<?php  ob_start();   require_once('functions.php');   index(); include(HEADER_TEMPLATE); check_acesso(2);
 ?>






	<div class="row">
		<div class="col-sm-6">
			<h2>Propostas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Proposta</a>	 	 
	    

	    </div>
	</div>









<hr>
<div id="alert"></div>
<table class="table table-hover">
<thead>
	<tr>
		<th>Sequencia</th>
		<th>Descrição</th>

		<th>Administradora</th>
		<th>Tipo</th>
		<th width="25%" >Operações</th>

	</tr>
</thead>
<tbody>
<?php if ($propostas) : ?>
<?php foreach ($propostas as $proposta) : 



?>
	<tr>
		<td><?php echo $proposta['sequencia']; ?></td>
		<td><?php echo $proposta['descricao']; ?></td>
		<td><?php echo $proposta['administradora']; ?></td>	
		<td><?php 
		if($proposta['tipo']==1){
			echo 'Padrão';
		}elseif($proposta['tipo']==2){
			echo 'Simples';
		}elseif($proposta['tipo']==3){
			echo 'Financiamento';
		}
		elseif($proposta['tipo']==4){
			echo 'Contemplada';
		}

		 


		?></td>		
		<td class="actions text-right">
		<a href="view.php?id=<?php echo $proposta['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $proposta['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $proposta['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
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



<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
