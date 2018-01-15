

<?php

function capTel($link){
	//echo "<br>".$link;

	$lines = file($link);
	foreach ($lines as $line => $linha) {
		if($line > 220){
			if(preg_match('/phone detail/', $linha)){
				$result = strip_tags($lines[$line+1]);
				echo $result;
				break;
			}
		}
	}



}


function capPag($link){


//print_r("<br> Cappag($link) <br>");


	$lines = file($link);


	$atual = 1;

	foreach ($lines as $line => $linha) {

		$linha = htmlspecialchars($linha);

//print_r("<br>Linhanum $line : $linha");
		if(preg_match('/aTitle/', $linha)){
			
			$tel = htmlspecialchars($lines[$line+1]);
			$result = strip_tags($lines[$line+2]);
			echo "<br> ".$result;	
			$str = "https://www.guiamais.com.br/";
			$pos = strpos($tel, 'onclick');
			$tel = substr($tel, 27, $pos-34);
			capTel($str.$tel);
			$atual++;
		}



		if($atual == 21){
			break;
		}




	}
}







$link = $_POST['link'];


while (1 < 2) {






	if($atual == 1){
		$lines = file($link);
		if(count($lines) > 1){
			capPag($link);
		}else{
			break;
		}

	}else{
		$new = $link."&page=".$atual;			
		$lines = file($new);
		if(count($lines) > 1){
			capPag($new);
		}else{
			break;
		}
	}


	$atual++;



}





































?>





