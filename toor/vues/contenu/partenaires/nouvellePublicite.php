<?php include("includes/header.php"); ?>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Remplacer la publicité "<?php echo $publicite->getNom(); ?>"</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="cGestionPartenaires.php?action=validerRemplacement" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<?php echo '<input type="hidden" id="id" name="id" value="'.$publicite->getId().'" >'; ?>
				<?php echo '<input type="hidden" id="nomImage" name="nomImage" value="'.$publicite->getImage().'" >'; ?>
				<div class="form-group">
					<label for="nom" class="control-label col-sm-2">Nom de la publicité</label>
					<div class="col-sm-4">
						<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de la publicité" required>
					</div>
					<label for="image" class="control-label col-sm-2">Image</label>
					<div class="col-sm-4">
						<input type="file" name="image" id="image" class="form-control" required>
					</div>
				</div>
				<div class="form-group">
					<label for="mail" class="control-label col-sm-2">Mail de l'annonceur</label>
					<div class="col-sm-4">
						<input type="email" name="mail" id="mail" class="form-control" placeholder="Adresse mail" required>
					</div>
					<label for="lien" class="control-label col-sm-2">Lien</label>
					<div class="col-sm-4">
						<input type="text" name="lien" id="lien" class="form-control" placeholder="Lien de la publicité" required>
					</div>
				</div>
				<div class="form-group">
					<label for="indice" class="control-label col-sm-2">Indice</label>
					<div class="col-sm-4">
						<input type="text" name="indice" id="indice" class="form-control" placeholder="Indice" required>
					</div>
					<div class="checkbox col-sm-4 col-sm-offset-2">
						<label for="active" class="control-label">
							Publicité active
							<input type="checkbox" name="active" id="active" value="true" checked>
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
	</div>

</div>

<?php include("includes/footer.php"); ?>