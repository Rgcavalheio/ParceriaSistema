<?php 
  require_once('functions.php'); 
  edit();
 include(HEADER_TEMPLATE); ?>

<h2>Editar Perfil</h2>

<form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post">
  <hr />

   <div class="row">
    <div class="form-group col-md-5">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $usuario['nome']; ?>">
    </div>

       </div>

   <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário</label>
      <input type="text" class="form-control" name="usuario['login']" value="<?php echo $usuario['login']; ?>">
    </div>
    
<div class="form-group col-md-4">
      <label for="campo2">Senha</label>
      <input type="text" class="form-control" name="usuario['password']" value="<?php echo $usuario['password']; ?>">
    </div>


  </div>

    <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário do E-MAIL</label>
      <input type="text" class="form-control" name="usuario['email']" value="<?php echo $usuario['email']; ?>">
    </div>
    
<div class="form-group col-md-4">
      <label for="campo2">Senha do E-MAIL</label>
      <input type="text" class="form-control" name="usuario['senha']" value="<?php echo $usuario['senha']; ?>">
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