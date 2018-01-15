<?php
require_once('functions.php');
include(HEADER_TEMPLATE);

check_acesso(1);
view($_SESSION['UsuarioID']);

?>

<header>

	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">
</header>



<h2>Perfil </h2>
<hr>


<div class="col-xs-12 ">
    <div class="col-xs-5" >
      <h3>Dados Pessoais:</h3>

<table class="table table-hover">
  <thead>
  <tr>
      <td>
        <label>Nome:</label>
        <?php echo $usuario['nome']; ?>
      </td>
    </tr>

    <tr>
      <td>
        <label>Usuário:</label>
        <?php echo $usuario['login']; ?>
      </td>
    </tr>

    <tr>
      <td>
        <label>Senha:</label>
        <?php echo $usuario['password']; ?>
      </td>
    </tr>

    <tr>
      <td>
        <label>Usuário do e-mail:</label>
        <?php echo $usuario['email']; ?>
      </td>
    </tr>

    <tr>
      <td>
        <label>Senha do e-mail:</label>
        <?php echo $usuario['senha']; ?>
      </td>
    </tr>

  </thead>
</table>




<div id="actions" class="row">
  <div class="col-md-12">
    <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-primary">Editar</a>

  </div>
</div>


    </div>
    <div class="col-xs-5 col-xs-offset-1" >
      
<h3>Lembretes:</h3>

<table class="table table-hover " style="white-space: nowrap;">
  <thead>
    <tr>
      <th width="10%">Data</th>
      <th width="20%">Descrição</th>
      <th width="10%">Opções</th>
      <th width="50%"></th>

    </tr>
  </thead>
  <tbody class="list">
    <?php if ($lembretes) : ?>
      <?php foreach ($lembretes as $lembrete) : 

      ?>
      <tr>
        <td><?php 
          $newDate = date("d-m-Y", strtotime($lembrete['data']));
          echo $newDate;
          ?></td>
          <td><?php  echo strtoupper($lembrete['texto']);  ?></td>  

          <td>
         
      <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $lembrete['id']; ?>">
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


    </div>

</div>


<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>


