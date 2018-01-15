<?php require_once('functions.php'); include(HEADER_TEMPLATE);
if(isset($_SESSION['UsuarioID'])){
 echo ("
<script>
window.location.href = \"../index.php\";
</script>
");
}


 ?>







<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<br><br><br><br><br><br><br>




<div class="container">
<form class="form-horizontal" action="login.php" method="post">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Bem Vindo.</h4>
            <input type="text" id="txUsuario" name="usuario" class="form-control input-sm chat-input" placeholder="Usuário" />
            </br>
            <input type="password" id="txSenha" name="senha" class="form-control input-sm chat-input" placeholder="Senha" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
             
                <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-sign-in"></i>Acessar</button>
            </span>
            </div>
            </div>
        
        </div>
    </div>
    </form>
</div>







<?php include(FOOTER_TEMPLATE); ?>