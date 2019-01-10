<?php require_once 'header.php'; ?>
<?php require_once '../modelo/usuario.class.php'; ?>
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

				<?php if (isset($_SESSION['users'])) :
							if (empty(unserialize($_SESSION['users']))): unset($_SESSION['users']) ?>
								<div class="alert alert-warning">
									<h3 class="text-center">Nao ha noticias adicionadas</h3>
								</div>	
						<?php else :?>

						<form class="navbar-form navbar-left" action="../controle/login.controle.php?op=4" method="post">
						  <div class="form-group">
						    <input type="text" name="pesquisa" class="form-control" placeholder="Search">
						  </div>
						  <button type="submit" class="btn btn-default">Pesquisar</button>
						</form>

						<table class="table col-lg-5">
							<thead>
								<tr>
									<th>Username</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
						<?php $users = unserialize($_SESSION['users']);
						unset($_SESSION['users']);
						foreach ($users as $u): ?>
							<tr>
								<td><?=$u->login?></td>
								<td><a href="../controle/login.controle.php?op=3&id=<?=$u->idUsuario?>"><img class="responsive-img" src="img/delete.png"></a><a href="../controle/login.controle.php?op=5&id=<?=$u->idUsuario?>"><img class="responsive-img" src="img/modify.png"></a></td>
							</tr>
				<?php endforeach; ?>
							</tbody>
						</table>
			<?php endif; ?>
		<?php else :
			header('Location: ../controle/login.controle.php?op=2');
		endif; ?>
				
		</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>

