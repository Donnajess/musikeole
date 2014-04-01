<?php include("includes/header.php"); ?>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Gestion des bannières</h1>
			<p>Chaque élément de menu possède une bannière (photo d'en-tête) individuelle. C'est ici que vous pouvez les changer. Si possible leur largeur doit être d'au moins 950 pixels, et ne pas être trop hautes.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/accueil.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Accueil</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="accueil">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/presentation.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Présentation</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="presentation">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/agenda.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Agenda</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="agenda">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/photos.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Photos</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="photos">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/exprimezVous.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Exprimez vous!</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="exprimezVous">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-8">
			<img src="../data/images/bannieres/boutique.jpg" alt="" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-4">
			<h2>Boutique</h2>
			<form action="cGestionBannieres.php?action=changerBanniere" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal">
				<input type="hidden" name="zone" id="zone" value="boutique">
				<div class="form-group">
					<label for="banniere" class="col-sm-2 control-label">Fichier</label>
					<div class="col-sm-10">
						<input type="file" name="banniere" id="banniere" class="form-control" required>
						<p class="help-block">Les images doivent être au format .jpg/.jpeg</p>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>

</div>

<?php include("includes/footer.php"); ?>