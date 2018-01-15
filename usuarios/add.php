<?php 
  require_once('functions.php'); 
  add();
 include(HEADER_TEMPLATE); ?>




<h2>Novo Usuário</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-5">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="vendedor['nome']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Grupo</label>
     
      <select class="form-control" name="vendedor['grupo']">
        <option value="1">Vendedor</option>
        <option value="2">Administrador</option>
      </select>


    </div>


       </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário</label>
      <input type="text" class="form-control" name="vendedor['login']">
    </div>
    <div class="form-group col-md-4">
      <label for="campo2">Senha</label>
      <input type="text" class="form-control" name="vendedor['password']">
    </div>
       </div>

         <div class="row">
    <div class="form-group col-md-4">
      <label for="name">Usuário do E-MAIL</label>
      <input type="text" class="form-control" name="vendedor['email']">
    </div>
    <div class="form-group col-md-4">
      <label for="campo2">Senha do E-MAIL</label>
      <input type="text" class="form-control" name="vendedor['password']">
    </div>
       </div>


 
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>