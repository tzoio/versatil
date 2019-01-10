<?php session_start(); ?>
<?php require_once '../util/controle-login.class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>A Versátil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="shortcut icon" type="img/png" href="img/logo-solo.png">
	<script src="js/bigJetPlane.min.js"></script>
</head>
<body>

	<header class="forPhp">
		<nav class="navbar navbar-default">
			<div class="container">
				<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collpase"><span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span></button>
				<div id="navbar-collpase" class="collapse navbar-collapse">
					<?php if (ControleLogin::verificarLogin()): ?>
						<ul class="nav navbar-nav navbar-left">
							<li class="dropdown">
								
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticia <span class="caret"></span></a>
						          <ul class="dropdown-menu">
									<li><a href="adicionar-noticia.php">Adicionar notícia</a></li>
									<li><a href="lista-noticias.php">Lista de notícias</a></li>

						          </ul>
							</li>
							<li class="dropdown">
								
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuário <span class="caret"></span></a>
					          	<ul class="dropdown-menu">
									<li><a href="cadastrar-usuario.php">Cadastrar usuário</a></li>
									<li><a href="lista-usuarios.php">Lista de usuário</a></li>
					          	</ul>
							</li>
							<li><a href="../controle/login.controle.php?op=8">Deslogar</a></li>
						</ul>	
					<?php endif; ?>
					<ul class="nav navbar-nav navbar-right">
						<li id="home-xs"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>