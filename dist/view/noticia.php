<?php session_start(); ?>
<?php require_once 'header.html'; ?>
<?php require_once '../util/padronizacao.class.php'; ?>
<?php require_once '../modelo/postagem.class.php'; ?>
<!-- section inicia no header -->
<?php if (!isset($_SESSION['alterar']) && isset($_GET['id'])) {
		header('Location: ../controle/post.controle.php?op=5&id='.$_GET['id'].'&noticia');
	} else if (isset($_SESSION['alterar'])) {
		$noticia = unserialize($_SESSION['alterar']);
		unset($_SESSION['alterar']);
		
	} else {
		header('Location: noticias.php');
		} ?>

	<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<div class="noticia section-title">
					<h1  class="col-lg-8"><?=$noticia->titulo?><span class="pull-right"><small> <?=Padronizacao::dateFromDataBase($noticia->dataHora)?></small></span></h1>
				</div>
			</div>
			<backimg src="<?=$noticia->imgLink?>"/>

			<p class="col-xs-12 col-sm-9 col-md-8 col-lg-8"><?=$noticia->postagem?></p>

		</div>
	</div><!-- fecha .container -->
</section><!-- fecha section header -->

	<?php require_once 'footer.html'; ?>
