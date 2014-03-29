<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $sondage->getTitre(); ?></h3>
	</div>
	<div class="panel-body">
		<form <?php echo 'action ="'.$_SERVER['REQUEST_URI'].'"'; ?> method="POST" role="form">
			<?php
				$questions = $sondage->getQuestions();
				foreach ($questions as $question) {
					echo '<fieldset><legend>'.$question->getValeur().'</legend>';
					echo $question->ouvrirTags();
					$nombrePropositions = $question->nombrePropositions();
					for ($i=0; $i < $nombrePropositions; $i++) { 
						echo $question->formaterReponse($i);
					}
					echo $question->fermerTags();
					echo '</fieldset>';
				}
			?>
			<button type="submit" class="btn btn-primary" name="validerSondage" id="validerSondage" >Valider</button>
		</form>
	</div>
</div>