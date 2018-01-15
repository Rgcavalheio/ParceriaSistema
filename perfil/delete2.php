<?php 
require_once('functions.php'); 
if (isset($_POST['data'])){
	$data = json_decode($_POST['data']);

	foreach ($data as $key => $value) {


		$lembrete = remove('lembretes', $value);
		$num  = strlen(ABSPATH);
		$local = substr($_POST['local'], $num);
//$local = str_replace(ABSPATH, '', $local);
// echo $local;
   echo ("
<script>
window.location.href = \"../".$local."\";
</script>
");
  

		
	}

} 

?>