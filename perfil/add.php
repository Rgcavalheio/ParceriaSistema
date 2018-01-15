<?php
require_once('functions.php');
include(HEADER_TEMPLATE);

$lem = array();


$lem['data']= convert_date($_POST['data'],'db');
$lem['texto'] = $_POST['texto'];
$lem['id_vendedor'] = $_SESSION['UsuarioID'];




$num  = strlen(ABSPATH);

$local = substr($_POST['local'], $num);
//$local = str_replace(ABSPATH, '', $local);
// echo $local;

  save('lembretes', $lem);
  $base = BASEURL;

   echo ("
<script>
window.location.href = \"../".$local."\";
</script>
");
  