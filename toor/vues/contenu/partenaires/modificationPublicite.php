<?php include("includes/header.php"); ?>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Modifier la publicité "<?php echo $publicite->getNom(); ?>"</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<form action="cGestionPartenaires.php?action=validerRemplacement" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<?php echo '<input type="hidden" id="id" name="id" value="'.$publicite->getId().'" >'; ?>
				<?php echo '<input type="hidden" id="nomImage" name="nomImage" value="'.$publicite->getImage().'" >'; ?>
				<div class="form-group">
					<label for="nom" class="control-label col-sm-2">Nom de la publicité</label>
					<div class="col-sm-4">
						<input type="text" name="nom" id="nom" class="form-control" <?php echo 'value="'.$publicite->getNom().'"'; ?> placeholder="Nom de la publicité" required>
					</div>
					<label for="image" class="control-label col-sm-2">Image</label>
					<div class="col-sm-4">
						<input type="file" name="image" id="image" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="mail" class="control-label col-sm-2">Mail de l'annonceur</label>
					<div class="col-sm-4">
						<input type="email" name="mail" id="mail" class="form-control" <?php echo 'value="'.$publicite->getMail().'"'; ?> placeholder="Adresse mail" required>
					</div>
					<label for="lien" class="control-label col-sm-2">Lien</label>
					<div class="col-sm-4">
						<input type="text" name="lien" id="lien" class="form-control" <?php echo 'value="'.$publicite->getLien().'"'; ?> placeholder="Lien de la publicité" required>
					</div>
				</div>
				<div class="form-group">
					<label for="indice" class="control-label col-sm-2">Indice</label>
					<div class="col-sm-4">
						<input type="text" name="indice" id="indice" class="form-control" <?php echo 'value="'.$publicite->getIndice().'"'; ?> placeholder="Indice" required>
					</div>
					<div class="checkbox col-sm-4 col-sm-offset-2">
						<?php
							$coche = ($publicite->getActive()) ? 'checked' : '' ;
						?>
						<label for="active" class="control-label">
							Publicité active
							<input type="checkbox" name="active" id="active" value="1" <?php echo $coche; ?> >
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2">
						<button type="submit" class="btn btn-primary btn-lg">Valider</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-2">
			<img <?php echo 'src="../data/images/promotions/'.$publicite->getImage().'"'; ?> class="img-responsive img-thumbnail">
			<p class="help-block">Image actuelle.</p>
			<hr>
		</div>
	</div>

</div>

<?php include("includes/footer.php"); ?>