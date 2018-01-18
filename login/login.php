<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
  header("Location: index.php"); exit;
}


// Tenta se conectar ao servidor MySQL
$conn = mysqli_connect('mysql.parceriaafsistema.com.br', 'parceriaafsist', '3791645j') or trigger_error(mysqli_error());
// Tenta se conectar a um banco de dados MySQL
mysqli_select_db($conn,'parceriaafsist') or trigger_error(mysqli_error());
$usuario = mysqli_real_escape_string($conn,$_POST['usuario']);
$senha = mysqli_real_escape_string($conn,$_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT `id`, `nome`, `grupo` FROM `vendedores` WHERE (`login` = '". $usuario ."') AND (`password` = '". $senha ."') LIMIT 1";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  echo "Login inválido!"; exit;
} else {
  // Salva os dados encontados na variável $resultado
// Salva os dados encontados na variável $resultado
  $resultado = mysqli_fetch_assoc($query);
  // Se a sessão não existir, inicia uma
  if (!isset($_SESSION)) session_start();
  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioID'] = $resultado['id'];
  $_SESSION['UsuarioNome'] = $resultado['nome'];
  $_SESSION['UsuarioNivel'] = $resultado['grupo'];
  // Redireciona o visitante
  header("Location: restrito.php"); exit;
}