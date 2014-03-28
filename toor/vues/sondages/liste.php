<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="dol-md-12">
			<h1>Liste des sondages</h1>
			<p>Explications à venir</h1>
			<?php
				if (isset($message)) {
					echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						'.$message.'
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
								<td>'.$sondage->getTitre().'</td>
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