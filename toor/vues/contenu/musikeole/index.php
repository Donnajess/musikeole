<?php include("includes/header.php"); ?>
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
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapsePresentation" data-parent="#accordion" data-toggle="collapse">Présentation</a></h4>
					</div>
					<div id="collapsePresentation" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sunt, nisi, enim, ipsum quas modi repellat autem nostrum asperiores molestias architecto laudantium recusandae consectetur at quia repudiandae fuga eum dolores.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseAccueil" data-parent="#accordion" data-toggle="collapse">Message d'accueil</a></h4>
					</div>
					<div id="collapseAccueil" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, enim, ea, facere quibusdam rerum alias dolores eos at voluptatibus officia itaque facilis voluptas assumenda minus accusantium quidem eaque magni autem!</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseAssociation" data-parent="#accordion" data-toggle="collapse">Association</a></h4>
					</div>
					<div id="collapseAssociation" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo reiciendis unde tenetur nihil provident. Hic, repudiandae, aspernatur, sequi beatae quam perferendis animi vero laudantium odit impedit a iste sapiente.</p>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseCoordonnees" data-parent="#accordion" data-toggle="collapse">Coordonnées</a></h4>
					</div>
					<div id="collapseCoordonnees" class="panel-collapse collapse">
						<div class="panel-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, sunt eligendi omnis natus excepturi cum ullam perferendis fuga. Neque error dolore repellat veniam temporibus fugit exercitationem nobis rem voluptatum laboriosam!</p>
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