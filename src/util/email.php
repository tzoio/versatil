<?php
	session_start();
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$mail_sender = "jhoel.galeano@wemakesi.com";

	$body = "Nome: {$nome}\n
		Endereco: {$endereco}\n
		Telefone: {$telefone}\n
		Email: {$email}\n
		Mensagem: {$mensagem}";



	$subject = "Contato feito atraves do site";

	$to = "rafael.estrela@wemakesi.com,galeanojhoel@gmail.com";

	$headers ="From: ".$mail_sender."\n"
	."Return-Path: ".$mail_sender."\n"
	."Reply-To: ".$mail_sender."\n";


	$sending = mail($to,$subject,$body,$headers,"-r".$mail_sender);

	if ($sending) {
		$_SESSION['msg'] = "Email enviado com sucesso!";
		header('Location: ../view/contato.php');
	} else {
		echo 'Email nao enviado';
	}


