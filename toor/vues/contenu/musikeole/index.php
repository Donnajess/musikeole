<?php include("includes/header.php"); ?>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	selector: "textarea#formPresentation",
	language : 'fr_FR',
});
tinymce.init({
	selector: "textarea#formAccueil",
	language : 'fr_FR',
});
tinymce.init({
	selector: "textarea#formAssociation",
	language : 'fr_FR',
});
</script>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Contenus de Musik'Eole</h1>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#presentation" data-toggle="tab">Présentation</a></li>
				<li><a href="#accueil" data-toggle="tab">Message d'accueil</a></li>
				<li><a href="#association" data-toggle="tab">Association</a></li>
				<li><a href="#coordonnees" data-toggle="tab">Coordonnées</a></li>
				<li><a href="#bureau" data-toggle="tab">Membres du bureau</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="presentation">
					<p>
						La présentation est un texte personnalisable qui s'affiche en premier dans la page d'accueil. C'est une présentation succinte de l'association, du site, ou encore un message de bienvenue.
					</p>
				</div>
				<div class="tab-pane" id="accueil">
					<p>
						Le message d'accueil s'affiche sous la présentation sur la page d'accueil du site. Il peut contenir des informations sur les évènements à venir, la vie de l'association, ou encore un nouveau produit dans la boutique, ...
					</p>	
				</div>
				<div class="tab-pane" id="association">
					<p>
						Le texte contenu dans l'association sera affiché dans la présentation de l'association. C'est là qu'il faut mettre les informations de l'association, son historique, ses actions, sa philosophie, ...
					</p>
				</div>
				<div class="tab-pane" id="coordonnees">
					<p>
						Les coordonnées de l'association (adresse, numéro de téléphone, mail, ...) s'afficheront en bas de la page de présentation, ainsi qu'au bas de chaque page du site internet.
					</p>
				</div>
				<div class="tab-pane" id="bureau">
					<p>
						Cette section sert à gérer les membres du bureau : en ajouter, les modifier ou encore les supprimer. Elle présente les membres sous forme de liste, afin de les administrer plus simplement.
						<br>
						Les membres du bureau seront affichés dans une page qui leur est dédiée dans le sous-menu de la page présentation.
					</p>
				</div>
			</div>
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
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapsePresentation" data-parent="#accordion" data-toggle="collapse">Présentation</a></h4>
					</div>
					<div id="collapsePresentation" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionContenuMusikEole.php?action=presentation" method="POST" role="form">
								<textarea class="form-control" name="formPresentation" id="formPresentation" rows="10"></textarea>
								<button type="submit" class="btn btn-primary btn-lg">Valider</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseAccueil" data-parent="#accordion" data-toggle="collapse">Message d'accueil</a></h4>
					</div>
					<div id="collapseAccueil" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionContenuMusikEole.php?action=accueil" method="POST" role="form">
								<textarea class="form-control" name="formAccueil" id="formAccueil" rows="10"></textarea>
								<button type="submit" class="btn btn-primary btn-lg">Valider</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseAssociation" data-parent="#accordion" data-toggle="collapse">Association</a></h4>
					</div>
					<div id="collapseAssociation" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionContenuMusikEole.php?action=association" method="POST" role="form">
								<textarea class="form-control" name="formAssociation" id="formAssociation" rows="10"></textarea>
								<button type="submit" class="btn btn-primary btn-lg">Valider</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseCoordonnees" data-parent="#accordion" data-toggle="collapse">Coordonnées</a></h4>
					</div>
					<div id="collapseCoordonnees" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionContenuMusikEole.php?action=coordonnees" method="POST" role="form">
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse" required>
									</div>									
								</div>
								<div class="row">
									<div class="col-md-3">
										<input type="text" name="codePostal" id="codePostal" class="form-control" placeholder="Code postal" required>
									</div>
									<div class="col-md-9">
										<input type="text" name="ville" id="ville" class="form-control" placeholder="Ville" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Téléphone" required>
									</div>
									<div class="col-md-6">
										<input type="email" name="mail" id="mail" class="form-control" placeholder="Adresse mail" required>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-lg">Valider</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<h2>Membres du bureau <button class="btn btn-primary pull-right">Ajouter un membre</button></h2>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Nom</th>
						<th>Rôle</th>
						<th>Supprimer</th>
					</tr>
					<tr>
						<td>Lorem ipsum.</td>
						<td>Lorem ipsum.</td>
						<td><button class="btn btn-danger">Supprimer</button></td>
					</tr>
					<tr>
						<td>Ipsam, nostrum.</td>
						<td>A, eius.</td>
						<td><button class="btn btn-danger">Supprimer</button></td>
					</tr>
					<tr>
						<td>Fugit, veritatis?</td>
						<td>Ea, omnis.</td>
						<td><button class="btn btn-danger">Supprimer</button></td>
					</tr>
					<tr>
						<td>Tempore, cum.</td>
						<td>Facilis, debitis!</td>
						<td><button class="btn btn-danger">Supprimer</button></td>
					</tr>
					<tr>
						<td>Doloribus, ducimus?</td>
						<td>Quidem, ut!</td>
						<td><button class="btn btn-danger">Supprimer</button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</div>
<?php include("includes/footer.php"); ?>