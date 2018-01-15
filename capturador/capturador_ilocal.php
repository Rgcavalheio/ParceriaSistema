	<?php




	function pegaTotal($link){
		//echo "Count Pages -> $link <br>";

		$lines = file($link);
		$atual = 1;
		$check = 0;


		foreach ($lines as $line => $linha) {

			if(preg_match('/tot/', $linha) and $check == 0){

				$check = 1;
				$result = strip_tags($linha);
				$result = str_replace(' resultados.','', $result);
				//echo $result;
				$result = ceil($result/15);
				//echo $result;
				$qnde = $result;
				return $qnde;
				break;	

			}

		}
	}

	function capTel($link){

		$lines = file($link);

		foreach ($lines as $line => $linha) {
		//$linha = htmlspecialchars($linha);
			if($line > 400 and $line < 1300){
				if(preg_match('/item-title/', $linha)){

					$result = strip_tags($linha);

					print_r("<br>$result  | ");
				}
				if(preg_match('/result-phone/', $linha)){
					$result = strip_tags($linha);
					$result = str_replace('... ver telefone', "", $result);
					print_r("$result");
				}
			}



		}
	}

	$status = $_POST['status'];



if($status == 1){

$link = $_POST['link'];
$qnde = pegaTotal($link);
$start = 1;	
$limit = $start+20;

for($x=$start;$x<$limit;$x++){


		if($x==1){			
			capTel($link);
		}else{
			// $new = substr($link, 0, -1);
			// $link = $new.$x;
			$pos = strpos($link, "letra")+5;
			$new2 = substr($link, 0, $pos);
			$link = $new2.'/'.$x;


			//echo "<br> $link";


			capTel($link);
		}

	

	}

echo '

<form action="capturador_ilocal.php" method="post">
	<div class="row">
		<div class="col-lg-6">		
			<input type="hidden" name="start" value="'.$limit.'">		
			<input type="hidden" name="link" value="'.$link.'">
			<input type="hidden" name="qnde" value="'.$qnde.'">
			 <input type="hidden" name="status" value="2">
			<button type="submit" class="btn btn-default">Próxima página</button>
		</div>
	</div>
</form>

	';


}elseif($status == 2){

$link = $_POST['link'];
$qnde = $_POST['qnde'];
$start = $_POST['start'];;	
$limit = $start+20;
//print_r("link:$link<br>qnde:$qnde<br>start:$start<br>limit:$limit");

if($limit > $qnde){
	$limit = $qnde;	
}

for($x=$start;$x<$limit;$x++){


		if($x==1){			
			capTel($link);
		}else{
			$pos = strpos($link, "letra")+5;
			$new2 = substr($link, 0, $pos);
			$link = $new2.'/'.$x;
			capTel($link);
		}

	

	}

echo '

<form action="capturador_ilocal.php" method="post">
	<div class="row">
		<div class="col-lg-6">		
			<input type="hidden" name="start" value="'.$limit.'">		
			<input type="hidden" name="link" value="'.$link.'">
			<input type="hidden" name="qnde" value="'.$qnde.'">
			 <input type="hidden" name="status" value="2">
			<button type="submit" class="btn btn-default">Próxima página</button>
		</div>
	</div>
</form>

	';







}


	

	

	
	





	?>










