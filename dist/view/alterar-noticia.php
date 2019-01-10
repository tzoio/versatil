<?php require_once 'header.php'; ?>
<?php require_once '../modelo/postagem.class.php'; ?>
<?php ControleLogin::verificarAcesso() ?>
<!-- section inicia no header -->
<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<div class="section-title">
					<h1>Alterar notícia</h1>
				</div>
				<?php if ($_SESSION['alterar']) {
					$noticia = unserialize($_SESSION['alterar']);
					unset($_SESSION['alterar']);
				} ?>
			  <form class="col-md-7 col-lg-8" action="../controle/post.controle.php?op=6&id=<?=$noticia->idPostagem?>" method="post">
		          <div class="form-group">
		            <label>Título</label>
		            <input class="form-control" type="text" name="titulo" value="<?=$noticia->titulo?>">
		          </div>
		          <div class="form-group">
		            <label>Notícia</label>
		            <textarea id="noticiaSize" class="form-control" name="noticia"><?=$noticia->postagem?></textarea>
		          </div>
		          <input class="btn btn-primary col-xs-8 col-sm-6 col-md-3 col-lg-3" type="submit" value="Alterar">
			</form>
		</div>
	</div>
</div>
</section>
<?php require_once 'footer.php'; ?>
