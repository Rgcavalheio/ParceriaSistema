<?php 
  require_once('functions.php'); 
  edit();
 include(HEADER_TEMPLATE); ?>

<h2>Editar Vendedor</h2>

<form action="edit.php?id=<?php echo $vendedor['id']; ?>" method="post">
  <hr />

   <div class="row">
    <div class="form-group col-md-5">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="vendedor['nome']" value="<?php echo $vendedor['nome']; ?>">
    </div>

        <div class="form-group col-md-3">
      <label for="campo3">Grupo</label>

      <select class="form-control" name="vendedor['grupo']">
        <option value="1" <?php if($vendedor['grupo'] == 1){echo 'selected';} ?> >Vendedor</option>
        <option value="2" <?php if($vendedor['grupo'] == 2){echo 'selected';} ?> >Administrador</option>
      </select>
    </div>


       </div>

   <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário</label>
      <input type="text" class="form-control" name="vendedor['login']" value="<?php echo $vendedor['login']; ?>">
    </div>
    
<div class="form-group col-md-4">
      <label for="campo2">Senha</label>
      <input type="text" class="form-control" name="vendedor['password']" value="<?php echo $vendedor['password']; ?>">
    </div>


  </div>

    <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário do E-MAIL</label>
      <input type="text" class="form-control" name="vendedor['email']" value="<?php echo $vendedor['email']; ?>">
    </div>
    
<div class="form-group col-md-4">
      <label for="campo2">Senha do E-MAIL</label>
      <input type="text" class="form-control" name="vendedor['senha']" value="<?php echo $vendedor['senha']; ?>">
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