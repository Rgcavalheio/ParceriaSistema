<?php
    require_once('functions.php');   
    index();
 include(HEADER_TEMPLATE); ?>

<header>




	<div class="row">
		<div class="col-sm-6">
			<h2>Usuários</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>	 	 
	    

	    </div>
	</div>
</header>








<hr>
<div id="alert"></div>
<table class="table table-hover">
<thead>
	<tr>
		<th>Nome</th>		
		<th>Email</th>
		<th>Grupo</th>
		<th width="15%" >Operações</th>

	</tr>
</thead>
<tbody>
<?php if ($vendedores) : ?>
<?php foreach ($vendedores as $vendedor) : ?>
	<tr>
		<td><?php echo $vendedor['nome']; ?></td>
		
		<td><?php echo $vendedor['email']; ?></td>
		<td><?php 
		if($vendedor['grupo'] ==2 ){
		echo 'Administrador'; 
		}else{
		echo 'Vendedor';
		}		

		?></td>		
		<td class="actions text-right">

			<a href="edit.php?id=<?php echo $vendedor['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $vendedor['id']; ?>">
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
