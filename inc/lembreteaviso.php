<!-- Modal de Delete-->
<div class="modal fade" id="lembreteaviso-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h3 >Lembretes</h3>

      </div>

      <div class="modal-body">

        <form id="form" name="form" action="<?php echo BASEURL; ?>perfil/delete2.php" method="post">



        
        <?php

        $data = json_decode($_SESSION['data']);


        ?>
    
<textarea name="data" class="hidden"> <?php echo $_SESSION['data']; ?></textarea>
<textarea class="hidden" name="local"><?php echo getcwd(); ?> </textarea>
          <ul class="list-group">
                      <?php foreach ($data as $key => $value) { 
                        $lembrete = getwhere('lembretes','id',$value);
                        
                        ?>
            <li class="list-group-item"><?php echo "Data: ".$lembrete[0]['data']." | Texto: ".$lembrete[0]['texto']; ?></li>
            <?php } ?>


          </ul>




          <div id="actions" class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Ok</button>

            </div>
          </div>
        </form>







      </div>
    </div>
  </div>
</div> <!-- /.modal -->

