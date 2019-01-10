<?php require_once 'header.php'; ?>
<?php ControleLogin::verificarAcesso() ?>
<!-- section inicia no header -->
	<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<?php if(isset($_SESSION['msg'])): ?>

					<div class="alert alert-info">
						<p><?=$_SESSION['msg'] ?></p>
					</div>

				<?php unset($_SESSION['msg']); endif; ?>
				
				<div class="section-title">
					<h1>Cadastrar usuário</h1>
				</div>
			  <form class="col-md-7 col-lg-8" action="../controle/login.controle.php?op=1" method="post">
		          <div class="form-group">
		            <label>Usuário</label>
		            <input class="form-control" type="text" name="user">
		          </div>
		          <div class="form-group">
		            <label>Senha</label>
		            <input class="form-control" type="password" name="password">
		          </div>
		          <input class="btn btn-primary col-xs-8 col-sm-6 col-md-3 col-lg-3" type="submit" value="Cadastrar">
			</form>
		</div>
	</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>
