<?php


?>





<body>

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
				//echo "total:".$result;
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
		//print_r("<br>Captel(".$link.")");


		foreach ($lines as $line => $linha) {
		//$linha = htmlspecialchars($linha);
			if($line > 300 and $line < 1300){
				if(preg_match('/item-title/', $linha)){

					$result = strip_tags($linha);
					if(preg_match('/Estabelecimento/', $result)){
						break;
					}
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

	$link = $_POST['link'];

	$qnde = pegaTotal($link);

	
	//echo "<br>Total de páginas encontradas: $qnde";




	



	for($x=1;$x<=$qnde;$x++){


		if($x==1){			
			capTel($link);
		}else{
			if($x>10){
				$y="-2";
				}else{
					$y="-1";
				}
			$link = substr($link, 0, $y);
			$link = $link.$x;
			capTel($link);
		}





	}





	?>




</body>	







<?php







