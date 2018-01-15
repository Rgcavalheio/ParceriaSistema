<?php 
ob_start(); 
  require_once('functions.php'); 
  view($_GET['id']);
?>
<?php include(HEADER_TEMPLATE); 
check_acesso(2);
?>

<h2>Visualizar Proposta </h2>
<hr>


<dl class="dl-horizontal">
  <dt>Código:</dt>
  <dd><?php echo $proposta['id']; ?></dd>

  <dt>Descrição:</dt>
  <dd><?php echo $proposta['descricao']; ?></dd>

  <dt>Sequencia:</dt>
  <dd><?php echo $proposta['sequencia']; ?></dd>

    <dt>Administradora:</dt>
  <dd><?php echo $proposta['administradora']; ?></dd>
</dl>

<dl class="dl-horizontal">
  <dt>Titulo:</dt>
  <dd><?php echo $proposta['titulo']; ?></dd>


  <dt>Valor:</dt>
  <dd><?php echo ' R$ '.$proposta['valor']; ?></dd>

  <dt>Linha1:</dt>
  <dd><?php echo $proposta['linha1']; ?></dd>

  <dt>Linha2:</dt>
  <dd><?php echo $proposta['linha2']; ?></dd>

  <dt>Linha3:</dt>
  <dd><?php echo $proposta['linha3']; ?></dd>

  <dt>Linha4:</dt>
  <dd><?php echo $proposta['linha4']; ?></dd>

  <dt>Linha5:</dt>
  <dd><?php echo $proposta['linha5']; ?></dd>

  <dt>Linha6:</dt>
  <dd><?php echo $proposta['linha6']; ?></dd>

    <dt>Linha7:</dt>
  <dd><?php echo $proposta['linha7']; ?></dd>




  </dl>


<div id="actions" class="row">
  <div class="col-md-12">
    <a href="edit.php?id=<?php echo $proposta['id']; ?>" class="btn btn-primary">Editar</a>
    <a href="index.php" class="btn btn-default">Voltar</a>
  </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>