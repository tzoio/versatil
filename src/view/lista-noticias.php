<?php require_once 'header.php'; ?>
<?php require_once '../modelo/postagem.class.php'; ?>
<?php require_once '../util/padronizacao.class.php'; ?>
<?php ControleLogin::verificarAcesso() ?>
<!-- section inicia no header -->
	<div class="container forPhp">
		<div class="col-sm-12 col-md-11 col-lg-11 content forPhp">
			<div class="row default forPhp">
				<?php if(isset($_SESSION['msg'])): ?>

					<div class="alert alert-info">
						<p><?=$_SESSION['msg'] ?></p>
					</div>

				<?php unset($_SESSION['msg']); endif; ?>

				<?php if (isset($_SESSION['postagem'])) :
							if (empty(unserialize($_SESSION['postagem']))): unset($_SESSION['postagem']) ?>
								<div class="alert alert-warning">
									<h3 class="text-center">Nao ha noticias adicionadas</h3>
								</div>	
						<?php else :?>

						<form class="navbar-form navbar-left" action="../controle/post.controle.php?op=4" method="post">
						  <div class="form-group">
						    <input type="text" name="pesquisa" class="form-control" placeholder="Search">
						  </div>
						  <button type="submit" class="btn btn-default">Pesquisar</button>
						</form>

						<?php $noticias = unserialize($_SESSION['postagem']);
						unset($_SESSION['postagem']);
						foreach ($noticias as $n): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="pull-right">
										<a href="../controle/post.controle.php?op=3&id=<?=$n->idPostagem?>"><img class="responsive-img" src="img/delete.png"></a>
										<a href="../controle/post.controle.php?op=5&id=<?=$n->idPostagem?>"><img class="responsive-img" src="img/modify.png"></a>
									</div>
									<h3 class="panel-title"><?=$n->titulo?></h3>
									<h4 class="small"><?=Padronizacao::dateFromDataBase($n->dataHora)?></h4>
								</div>
								<div class="panel-body">
									<p><?=$n->postagem?></p>
								</div>
							</div>
				<?php endforeach; ?>

			<?php endif; ?>
		<?php else :
			header('Location: ../controle/post.controle.php?op=2');
		endif; ?>
				
		</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>

