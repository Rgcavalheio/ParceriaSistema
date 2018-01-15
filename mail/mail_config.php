<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");












function enviar($tipo,$user,$pass,$mail_to,$cliente,$vendedor,$num,$id1,$id2,$id3){

	$host = 'smtp.kinghost.net';

	$copia_oculta = "";
	$port = 465;

	global $msg;

	$mail= new PHPMailer;
$mail->IsSMTP();        // Ativar SMTP
$mail->SMTPDebug  = 1;
     // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;     // Autenticação ativada
$mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
$mail->Host = $host; // SMTP utilizado
$mail->Port = $port; 
$mail->Username = $user;
$mail->Password = $pass;
$mail->CharSet = 'UTF-8';
$mail->SetFrom($user, $vendedor);
$mail->addAddress($mail_to,$cliente);

if($tipo==1){
	$mail->Subject=("Informativo Parceria Assessoria");
	$mail->AddAttachment('../imagens/Informativo.pdf');      // Adicionar um anexo
}elseif($tipo==2){
	$mail->Subject=("Simulação Parceria Assessoria");
	if($num == 1){	
			$mail->AddAttachment('../imagens/Informativo.pdf');  
		$mail->AddAttachment('../propostas_geradas/'.$id1.'.pdf'); 
		}else{
		$mail->AddAttachment('../propostas_geradas/'.$id1.'.pdf');
		$mail->AddAttachment('../propostas_geradas/'.$id2.'.pdf');
		}
	}elseif($tipo==3){
	$mail->Subject=("Simulação Parceria Assessoria");		
		$mail->AddAttachment('../imagens/Informativo.pdf'); 
		$mail->AddAttachment('../propostas_geradas/'.$id3.'.pdf'); 		
		
	}



	//$mail->AddBCC($copia_oculta, $vendedor);

	$mail->msgHTML(" ");

	if ($mail->send()){
		$msg = 'Email Enviado!';
		return true;

	}else{
		$retorno = $mail->ErrorInfo;
		if(preg_match('/HELO/', $retorno)){
			$msg = "Usuário ou senha do EMAIL incorreta.";
		}else{
			$msg = $retorno;
		}

		return false; 
	}  

}
