<?php include("includes/header.php"); ?>
<script src="../assets/js/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Ajouter un membre du bureau</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="cGestionContenuMusikEole.php?action=valider" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<div class="form-group">
					<label for="nom" class="col-md-1 control-label">Nom</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>						
					</div>
					<label for="prenom" class="col-md-1 control-label">Prénom</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>						
					</div>
				</div>
				<div class="form-group">
					<label for="role" class="col-md-1 control-label">Rôle</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="role" id="role" placeholder="Rôle" required>						
					</div>
					<label for="dateEntree" class="col-md-1 control-label">Date d'entrée</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="dateEntree" id="dateEntree" data-date-format="dd-mm-yyyy" placeholder="Date" required>						
					</div>
				</div>
				<div class="form-group">
					<label for="photo" class="col-md-1 control-label">Photo</label>
					<div class="col-md-4">
						<input type="file" class="form-control" name="photo" id="photo" required>
						<p class="help-block">Extension .jpg, .jpeg uniquement.</p>						
					</div>
					<label for="indice" class="col-md-1 control-label">Indice</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="indice" id="indice" placeholder="indice" required>
						<p class="help-block">Ordre d'apparition du membre sur la page.</p>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<textarea class="form-control" rows="10" id="activite" name="activite"><p>Activité du membre à l'école de musique.</p></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Valider</button>
			</form>
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