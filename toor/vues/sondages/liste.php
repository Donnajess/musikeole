<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="dol-md-12">
			<h1>Liste des sondages</h1>
			<p>Cette page est la page principale d'administration des sondages. Plusieurs actions sont disponibles :</p>

			<ul class="nav nav-tabs">
				<li class="active"><a href="#ajouter" data-toggle="tab">Ajouter un sondage</a></li>
				<li><a href="#details" data-toggle="tab">Détails d'un sondage</a></li>
				<li><a href="#activer" data-toggle="tab">Activer un sondage</a></li>
				<li><a href="#supprimer" data-toggle="tab">Supprimer un sondage</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="ajouter">
					<p>
						Entrez d'abord le nom du sondage (Les visiteurs ne voient pas le nom du sondage, il sert de nom pour gérer le sondage dans l'administration), ainsi que le nombre 
						de questions voulues. Sur la page suivante, renseignez les questions, le type de la question (Case à cocher ou liste déroulante), et entrez jusqu'à 5 réponses par question, 
						puis validez.
					</p>
				</div>
				<div class="tab-pane" id="details">
					<p>
						Cliquez sur le nom du sondage pour arriver sur une page de résultats détaillés. Vous y verrez le nombre de votants, ainsi que le pourcentage de votes à chaque question. Des 
						nouvelles fonctionnalités seront peut être implémentées s'il reste du temps, comme le téléchargement des résultats au format .csv ou l'affichage des résultats selon une réponse précise.
					</p>	
				</div>
				<div class="tab-pane" id="activer">
					<p>
						Cliquez sur le bouton activer du sondage désiré. Un sondage activé apparaît au public, et les votes sont ouverts pour ce sondage. Il ne peut y avoir qu'un seul sondage 
						actif à la fois, et un nouveau sondage est automatiquement considéré comme actif.
					</p>
				</div>
				<div class="tab-pane" id="supprimer">
					<p>
						Cliquez sur le bouton supprimer (en rouge) pour supprimer définitivement un sondage du site. Ses résultats ne seront plus accessibles, et il sera impossible de le 
						récupérer. C'est donc une option à déconseiller (sauf s'il y a une erreur dans le sondage).
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
			<form action="cGestionSondages.php?action=formulaire" method="POST" class="form-inline">
				<div class="form-group"><input type="text" name="titre" id="titre" class="form-control" placeholder="Titre du sondage"></div>
				<div class="form-group"><input type="text" name="nbQuestions" id="nbQuestions" class="form-control" placeholder="Nombre de questions"></div>
				<button class="btn btn-primary">Nouveau sondage</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Nom</th>
						<th>Date</th>
						<th>Nombre de votants</th>
						<th>Actif</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($listeSondages as $sondage) {
							$actif = ($sondage->getActif()) ? '<button type="button" class="btn btn-primary disabled">Actif</button>' : '<button type="button" class="btn btn-default"><a href="cGestionSondages.php?action=activer&id='.$sondage->getId().'">Activer</a></button>' ;
							echo '<tr>
								<td><a href="cGestionSondages.php?action=detail&id='.$sondage->getId().'">'.$sondage->getTitre().'</a></td>
								<td>'.$sondage->getDate().'</td>
								<td>'.$sondage->getVotants().'</td>
								<td>'.$actif.'</td>
								<td><button type="button" class="btn btn-danger"><a href="cGestionSondages.php?action=supprimer&id='.$sondage->getId().'">Supprimer</a></button></td>
							</tr>';
						}
					?>
				</table>
			</div>
		</div>	
	</div>
</div>
<?php include("includes/footer.php"); ?>