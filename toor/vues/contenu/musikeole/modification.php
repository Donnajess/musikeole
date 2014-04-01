<?php include("includes/header.php"); ?>
<script src="../assets/js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $membre->getNom().' '.$membre->getPrenom(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<form action="cGestionContenuMusikEole.php?action=validerModification" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="id" id="id" <?php echo 'value="'.$membre->getId().'"'; ?> >
				<div class="form-group">
					<label for="nom" class="col-md-2">Nom</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" <?php echo 'value="'.$membre->getNom().'"'; ?> required>
					</div>
					<label for="prenom" class="col-md-2">Prénom</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" <?php echo 'value="'.$membre->getPrenom().'"'; ?> required>
					</div>
				</div>
				<div class="form-group">
					<label for="role" class="col-md-2">Rôle</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="role" id="role" placeholder="Rôle" <?php echo 'value="'.$membre->getRole().'"'; ?> required>
					</div>
					<label for="dateEntree" class="col-md-2">Date d'entrée</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="dateEntree" id="dateEntree" data-date-format="dd-mm-yyyy" placeholder="Date" <?php echo 'value="'.$membre->getDateEntreeFr().'"'; ?> required>
					</div>
				</div>
				<div class="form-group">
					<label for="photo" class="col-md-2">Photo</label>
					<div class="col-md-4">
						<input type="file" class="form-control" name="photo" id="photo" >
						<p class="help-block">Extension .jpg, .jpeg uniquement.</p>
					</div>
					<label for="indice" class="col-md-2">Indice</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="indice" id="indice" placeholder="indice" <?php echo 'value="'.$membre->getIndice().'"'; ?> required>
						<p class="help-block">Ordre d'apparition du membre sur la page.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea class="form-control" rows="10" id="activite" name="activite"><p><?php echo $membre->getActivite(); ?> </p></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Valider</button>
			</form>
		</div>
		<div class="col-md-2">
			<hr>
			<img <?php echo 'src="../data/images/membresBureau/'.$membre->getPhoto().'"'; ?> class="img-responsive img-thumbnail">
			<p class="help-block">Photo actuelle.</p>
			<hr>
		</div>
	</div>

</div>
<script>
	$('#dateEntree').datepicker();
	tinymce.init({
		selector: "textarea#activite",
		language : 'fr_FR'
	});
</script>
<?php include("includes/footer.php"); ?>