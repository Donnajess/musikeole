<?php include("includes/header.php"); ?>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Ajouter une association</h1>
			<p>L'indice est un nombre qui permet d'afficher les associations dans l'ordre que vous voulez dans les menus. Plus une association a un indice élevé, plus elle apparaîtra haute dans le menu. Il est conseillé d'espacer les indices afin d'avoir de la place si l'on veut positionner une association entre deux autres, sans devoir changer les indices de toutes les associations.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="cGestionAssociations.php?action=valider" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="nom" class="col-md-1 control-label">Nom</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de l'association" required>
					</div>
					<label for="indice" class="col-md-1 control-label">Indice</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="indice" id="indice" placeholder="Indice" required>
					</div>
				</div>
				<textarea name="texte" id="texte" rows="10">
					<h1>Nouvelle association</h1>
					<p>Contenu de la page</p>
				</textarea>
				<button type="submit" name="valider" class="btn btn-primary btn-lg btn-margin-top">Valider</button>
			</form>
		</div>
	</div>
			
</div>

<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		language : 'fr_FR',
	});
</script>
<?php include("includes/footer.php"); ?>