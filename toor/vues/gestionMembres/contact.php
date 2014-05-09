<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Contacter les adhérents</h1>
			<p>Cette page vous permet d'envoyer un message à tous les adhérents.</p>
			<hr>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
				if (isset($message)) {
					echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>'.$message.'</p>
					</div>';
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form role="form" action="cContact.php" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du message">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="12" placeholder="Votre message" id="message"></textarea>
				</div>
				<div class="checkbox">
					<label>
					<input type="checkbox" name="checkbox"> Confirmer l'envoi
					</label>
				</div>
					<button type="submit" class="btn btn-default">Envoyer</button>
			</form>	
		</div>
	</div>
	
</div>
<?php include("includes/footer.php"); ?>