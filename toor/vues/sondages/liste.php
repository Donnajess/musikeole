<?php include("includes/header.php"); ?>
<div class="container">
	<h1>Liste des sondages</h1>
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
							$actif = ($sondage->getActif()) ? '<button type="button" class="btn btn-primary">Actif</button>' : '<button type="button" class="btn btn-default">Activer</button>' ;
							echo '<tr>
								<td>'.$sondage.getTitre().'</td>
								<td>'.$sondage.getDate().'</td>
								<td>'.$sondage.getVotants().'</td>
								<td>'.$actif.'</td>
								<td><a href="cGestionsondages.php?action=supprimer&id='.$sondage->getId().'">Supprimer</a></td>
							</tr>';
						}
					?>
				</table>
			</div>
		</div>	
	</div>
</div>
<?php include("includes/footer.php"); ?>