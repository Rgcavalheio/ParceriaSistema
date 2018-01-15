<?php
if (!isset($_SESSION)) session_start();
function check_acesso($grupo = null){
// Verifica se não há a variável da sessão que identifica o usuário
	if($grupo != null){
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $grupo)) {
  // Destrói a sessão por segurança
session_destroy();
  // Redireciona o visitante de volta pro login
 echo ("
<script>
window.location.href = \"../menu.php\";
</script>
");
 }
 


}



}
