<!-- Modal de Delete-->
<div class="modal fade" id="lembrete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h3 >Criar Lembrete</h3>

      </div>

      <div class="modal-body">



        <form id="form" name="form" action="<?php echo BASEURL; ?>perfil/add.php" method="post">
          <!-- area de campos do form -->
          
          <div class="row">
            <div class="form-group col-md-1">
             <label>Data:
             <input name="data" type="text" value="
<?php
echo date('d/m/Y', strtotime("+1 day"));
?>" id="datepicker"></label>
           </div>

           </div>
            <div class="row">

           <div class="form-group col-md-4">

            <labe>Texto:</labe>
            <textarea name="texto"> </textarea>
          </div>
          <textarea class="hidden" name="local"><?php echo getcwd(); ?> </textarea>

        </div>






        <div id="actions" class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
          </div>
        </div>
      </form>







    </div>
  </div>
</div>
</div> <!-- /.modal -->

