<?php 


$modelo = '
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
			<TITLE></TITLE>


			<style type="text/css">
				.pt1{
					margin-left: 10px;
				}
				.pt2{
					margin-left: 20px;
					text-align: center;	
					letter-spacing:2px;
				}
				.pt3{
					text-align: center;	

				}
				.pt4{
					margin-left: 20px;
					line-height: 2;
				}
				.pt5{
					color:red;
					font-weight: bold;
					text-align: center;	

				}
				.pt6{
					font-weight:bold;
					margin-left: 10px;
					text-align: center;	
				}

				.lateral{
					position:absolute;
					top:525px;
					left:770px;
				}

			</style>

		</HEAD>
		<BODY>


			<strong><img src="../imagens/logo.jpg" alt="" width="200" height="87" /></strong><br>
			<br>

			<div class="pt1">
				<strong>Cliente : '. $cliente .' </strong><br>
				<strong>Data : '.$data.'</strong><br>
				<strong>Cidade : '.$cidade.' </strong><br>
				<strong>Fone : '.$telefone.'</strong><br>
				<strong>Celular : '.$celular.'</strong><br>
				<strong>E-mail : '.$email.'</strong><br>
				<strong>Consultor Financeiro : '.$vendedor.'</strong><br><br>
			</div>
			

			<div class="pt2">
				<h3> TENHA CERTEZA QUE NÓS POSSUÍMOS A MELHOR SOLUÇÃO DE CRÉDITO DO  MERCADO PARA LHE OFERECER! </h3>  

				<br>
				<h4> ABAIXO SIMULAÇÃO DE  CRÉDITO PARA ANÁLISE </h4>				
			</div>
			<div class="pt3">
				'.$titulo.'

			</div>
			<br>
			<br>
			<div class="pt4">

				<strong>
					CRÉDITO: R$'.$valor.'<br>
					'.$linha1.'<br>
					'.$linha2.'<br>
					'.$linha3.'<br>
					'.$linha4.'<br>
					'.$linha5.'<br>
					'.$linha6.'<br>
				</strong>

			</div>			
			<div class="pt2">
				<h3>NOSSOS DIFERENCIAIS NO RAMO DE  CONSÓRCIO QUE
					<br> SOMENTE NÓS POSSUIMOS, OS OUTROS CONSÓRCIOS NÃO TEM!</h3>
				</div>


				<div class="pt5">
					1. O ÚNICO CONSÓRCIO DO  BRASIL QUE TEM  PARCELAS FIXAS DO  COMEÇO ATÉ O FINAL DO  PLANO;
				</div>
				<div class="pt6">
					Exemplo: Um consórcio de 400 mil com parcelas fixas cliente pagará 484 mil ao total do plano<br>
					Um consórcio de 400 mil com reajuste de INCC anual cliente pagará 664 mil ao total do plano.
				</div>
				<br>
				<div class="pt5">
					2. O ÚNICO CONSÓRCIO QUE PODE DEIXAR O PRÓPRIO BEM COMO GARANTIA; 
				</div>
				<div class="pt6">
					Exemplo: Não  precisa simular compra e venda do bem.
				</div>
				<br>
				<div class="pt5">
					3. SOMOS O MAIOR ESCRITÓRIO DE  VENDAS DE  CONSÓRCIOS E FINANCIAMENTOS DO  RS.
				</div>
				<br>
				<div class="pt6">
					Estamos prontos para  atendê-lo, aguardamos a sua visita!
					<br>
					<br>

					Matriz:  Rua Coronel Chicuta 436 Sala 904 / PASSO FUNDO – RS / Fone: (54) 3317-1091
					E-mail: contato@parceriaconsorcio.com.br / Site: www.parceriaconsorcio.com.br
				</div>

			</div>

			<div class="lateral">
				<img src="../imagens/lateral.gif">
			</div>



		</BODY>
	</HTML>

	';


	?>