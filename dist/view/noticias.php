<?php session_start(); ?>
<?php require_once 'header.html'; ?>
<?php require_once '../util/padronizacao.class.php'; ?>
<!-- section inicia no header -->
	<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<div class="section-title">
					<h1>Notícias</h1>
				</div>
			</div>

			<div class="news">
				<div class="row">
				<?php
				    require_once '../dao/postdao.class.php';

				    $postDao = new PostagemDao();
				    $dados = $postDao->lista();
					
				    foreach($dados as $v):
			    	?>  
					<div class="notice col-xs-11 col-sm-3 col-lg-3 col-md-4">
						<a href="noticia.php?id=<?=$v->idPostagem?>">
							<img class="background" src="<?=$v->imgLink?>" alt="" />

							<div class="title">
								<h3><?=$v->titulo?></h3>
								<div class="pull-right">
									<p class="pull-right"><?=Padronizacao::dateFromDataBase($v->dataHora)?></p>
								</div>
							</div>
							<div class="synthesis">
								<p><?=$v->postagem?></p>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div><!-- fecha .container -->
</section><!-- fecha section header -->

	<?php require_once 'footer.html'; ?>
