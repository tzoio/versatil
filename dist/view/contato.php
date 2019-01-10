<?php require_once 'header.html'; ?>
<?php session_start(); ?>
<!-- section inicia no header -->
<div class="container">
		<div class="col-sm-12 col-md-11 col-lg-11 content">
			<div class="row default">
				<div class="section-title">
					<h1>Contato</h1>
				</div>
				<?php if(isset($_SESSION['msg'])): ?>

					<div class="alert alert-info col-sm-7 col-md-7 col-lg-8">
						<p><?=$_SESSION['msg'] ?></p>
					</div>

				<?php unset($_SESSION['msg']); endif; ?>
			  <form class="col-md-7 col-lg-8" action="../util/email.php" method="post">
          <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" value="">
          </div>
          <div class="form-group">
            <label>Endereco</label>
            <input class="form-control" type="text" name="endereco" value="">
          </div>
          <div class="form-group">
            <label>Telefone</label>
            <input class="form-control" type="text" name="telefone" value="">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="">
          </div>
          <div class="form-group">
            <label>Mensagem</label>
            <textarea class="form-control" name="mensagem"></textarea>
          </div>
          <button class="btn btn-primary col-xs-8 col-sm-6 col-md-3 col-lg-3" type="submit">Enviar</button>
			  </form>
				<div class="contato col-sm-12 col-md-3 col-lg-3">
					<ul>
						<li>51 <b>3477.5077</b></li>
						<li><b>contato@aversatil.com.br</b></li>
						<li>Formulário para orçamento<br><a href="#" class="btn btn-default col-xs-7 col-sm-6 col-md-4 col-lg-4">Baixar</a></li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="sub-title center-block">
					<h2>Local</h2>
				</div>
				<div class="iframe col-xs-12 col-md-12 col-lg-11">

					<iframe class="clearfix" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.140578073341!2d-51.176671485554365!3d-29.94663188191798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951970812b924289%3A0xd012c2d07153495d!2sRua+Ven%C3%A2ncio+Aires%2C+1733+-+Niter%C3%B3i%2C+Canoas+-+RS!5e0!3m2!1spt-BR!2sbr!4v1482336139343"
					></iframe>
				</div>
			</div>
		</div>
		</div><!-- fecha .container -->
	</section><!-- fecha section header -->

	<?php require_once 'footer.html'; ?>
