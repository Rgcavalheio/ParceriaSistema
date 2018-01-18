<?php


?>
<body>

	<?php


	function pegaTotal($link){
		$lines = file($link);

		$check = 0;


		foreach ($lines as $line => $linha) {


			if(preg_match('/INSERIRE/', $linha) and $check == 0){

				$check = 1;
				$find = strip_tags($lines[$line+4]);
				$find = strstr($find, ' ', true);
				return $find;



			}
		}

	}

	function capTel($link){

		$lines = file($link);


		//print_r("<br>Starting ".$link);


		foreach ($lines as $line => $linha) {
			

			if(preg_match('/ragsoc24/', $linha) or preg_match('/ragsoc17/', $linha)){


				$find = htmlspecialchars($linha);
				$find = substr($find, 73);
				$find = substr($find, 0, strlen($find) - 12);
				print_r("<br>".$find);

				$fone = $lines[$line+7];
				$fone = substr($fone, 42);
				$fone = substr($fone, 0, strlen($fone) - 4);
				print_r(" - ".$fone);





			}





		}

	}





	$link = $_POST['link'];

	//print_r($link."<br>");


	$total = pegaTotal($link);

	$paginas = ceil($total/24);

	//print_r($paginas);


	for ($x=1; $x <= $paginas; $x++) { 

		if($x == 1){

			capTel($link);

		}else{


			$new = $link."-".$x;
			$new = str_replace('ni/', '', $new);

			capTel($new);


		}



		
	}






















