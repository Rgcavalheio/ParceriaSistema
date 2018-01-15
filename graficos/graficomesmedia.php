<?php
require_once('functions.php');
global $vendedores;
$vendedores = find3();

#incluindo a classe. verifique se diretorio e versao sao iguais, altere se precisar

#Matriz utilizada para gerar os graficos


// $data = array(
// 	0 => array('Jan'),2 =>  array('Fev'),3 =>  array('Mar'),
// 	4 => array('Abr'),5 =>  array('Mai'),6 =>  array('Jun'),
// 	7 => array('Jul'),8 =>  array('Ago'),9 =>  array('Set'),
// 	10 => array('Out'),11 =>  array('Nov'),12 =>  array('Dez'),
// 	);


$data = array(
	1 => array('Janeiro'),
	2 => array('Fevereiro'),
	3 => array('Março'),
	4 => array('Abril'),
	5 => array('Maio'),
	6 => array('Junho'),
	7 => array('Julho'),
	8 => array('Agosto'),
	9 => array('Setembro'),
	10 => array('Outubro'),
	11 => array('Novembro'),
	12 => array('Dezembro'),
	);


$aux = getwhere('aux');
$aux = $aux[0];



$ini = $aux['data1'];

$end = $aux['data2'];






$mes_inicio = $ini;
$mes_fim = $end;
$meses = 11;
$nomes = array();
$debug =0;

foreach ($vendedores as $key => $vendedor) {
	array_push($nomes, $vendedor['nome']);
$total = 0;
	for ($x=$mes_inicio; $x <= $mes_fim; $x++) { 
		$z = $x;
		$historicos2 = find_graficos_valores($vendedor['id'],'0'.$z);
		

		
		if($historicos2 != null){
			$qnde = count($historicos2);
			foreach ($historicos2 as $key => $value) {
				$valor = $value['valor'];
				$valor = str_replace('.', '', $valor);
				$total = $total + $valor;


			}


		}
		
		// $total = number_format($total,2,'.',',');
		$total = floor($total/$qnde);
	array_push($data[$x], intval($total));
	//print_r("<Br>total=$total");

	}
	

	


}

$mes_inicio = $mes_inicio-1;
$mes_fim = $mes_fim;
$data2 = array();
foreach ($data as $key => $value) {
	if($key <= $mes_inicio or $key > $mes_fim){
		unset($data[$key]);
	}else{
		array_push($data2, $data[$key]);
	}
}





// $data = array(
// 	array('Jan', 20, 2, 4), array('Fev', 30, 3, 4), array('Mar', 20, 4, 14),
// 	array('Abr', 30, 5, 4), array('Mai', 13, 6, 4), array('Jun', 37, 7, 24),
// 	array('Jul', 10, 8, 4), array('Ago', 15, 9, 4), array('Set', 20, 5, 12),
// 	array('Out', 28, 4, 14), array('Nov', 16, 7, 14), array('Dez', 24, 3, 15),
// 	);

if($debug == 1){
 //print_r("<br> inicio = $ini , fim = $end <br><br>");
	



}else{
	include('phplot/phplot.php');

	$plot = new PHPlot(1110,500);
#Tipo de borda, consulte a documentacao
	$plot->SetImageBorderType('plain');
#Tipo de grafico, nesse caso barras, existem diversos(pizza…)
	$plot->SetPlotType('bars');
#Tipo de dados, nesse caso texto que esta no array
	$plot->SetDataType('text-data');
#Setando os valores com os dados do array
	$plot->SetDataValues($data2);
#Titulo do grafico

#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
	$plot->SetLegend($nomes);
#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
	$plot->SetXTickLabelPos('none');
	$plot->SetXTickPos('none');
#Gera o grafico na tela
	$plot->DrawGraph();
	
}
?>