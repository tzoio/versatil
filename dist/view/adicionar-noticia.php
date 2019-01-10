<?php require_once 'header.php'; ?>
<?php ControleLogin::verificarAcesso() ?>
<!-- section inicia no header -->
<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<div class="section-title">
					<h1>Adicionar notícia</h1>
				</div>
			  <form class="col-md-7 col-lg-8" action="../controle/post.controle.php?op=1" method="post">
		          <div class="form-group hidden">
		            <label>Imagem de fundo</label>
		            <input id="imgLink" class="form-control" type="text" name="imgLink">
		          </div>
		          <div class="form-group">
		            <label>Título</label>
		            <input class="form-control" type="text" name="titulo" value="">
		          </div>
		          <div class="form-group">
		            <label>Notícia</label>
		            <textarea id="noticiaSize" class="form-control" name="noticia"></textarea>
		          </div>
		          <input class="btn btn-primary col-xs-8 col-sm-6 col-md-3 col-lg-3" type="submit" value="Enviar">
			</form>
		</div>
	</div>
</div>
</section>
<?php require_once 'footer.php'; ?>
