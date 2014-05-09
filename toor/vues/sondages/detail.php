<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row"></div>
	<div class="row">
		<div class="col-md-6">
			<div class="jumbotron">
				<h1><?php echo $sondage->getTitre(); ?></h1>
			</div>
		</div>
		<div class="col-md-6">
			<div class="jumbotron">
				<h1><?php echo $sondage->getVotants(); ?> votants</h1>
				<p><?php echo $sondage->nombreQuestions(); ?> questions</p>
				<?php $actif = ($sondage->getActif()) ? 'sondage actif' : 'sondage inactif' ; ?>
				<p><?php echo $actif; ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<?php
			$listeQuestions = $sondage->getQuestions();
			foreach ($listeQuestions as $question) {
				echo '<div class="col-md-6">';
				echo '<div class="panel panel-primary">';
				echo '<div class="panel-heading"><h3 class="panel-title">'.$question->getValeur().' - '.$question->getType()->getNom().'</h3></div>';
				$reponses = $question->getPropositions();
				$typeBarre = array('', ' progress-bar-success', ' progress-bar-info', ' progress-bar-warning', ' progress-bar-danger');
				$i = 0;
				foreach ($reponses as $reponse) {
					echo '<div class="panel-body">';
					echo '<div class="col-md-3">'.$reponse->getValeur().'</div>';
					echo '<div class="col-md-9">
						<div class="progress">
							<div class="progress-bar'.$typeBarre[$i].'" role="progressbar" aria-valuenow="'.$reponse->pourcentageVotes($sondage->getVotants()).'" aria-valuemin="0"aria-valuemax="100" style="width: '.$reponse->pourcentageVotes($sondage->getVotants()).'%;">'.$reponse->getVotes().' votes</div>
						</div>
					</div>';
					echo '</div>';
					$i++;
				}
				echo '</div>';
				echo '</div>';
			}
		?>
	</div>
	<div class="row">
		<div class="col-md-12"><button class="btn btn-primary btn-lg"><a href="cGestionSondages.php?action=liste">Retour aux sondages</a></button></div>
	</div>
</div>
<?php include("includes/footer.php"); ?>