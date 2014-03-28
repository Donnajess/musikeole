<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $titre; ?></h1>
			<p>Pour chaque question, renseignez la question et son type, puis remplissez jusqu'à 5 champs de réponses possibles.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form action="cGestionSondages.php?action=valider" method="POST" class="form-horizontal">
				<div class="row">
					<?php
						echo '<input type="hidden" name="titre" id="titre" value="'.$titre.'" />';
						echo '<input type="hidden" name="nbQuestions" id="nbQuestions" value="'.$nbQuestions.'" />';
						for ($i=0; $i < $nbQuestions; $i++) {
							$num = $i + 1;
							echo '<div class="col-sm-6">';
							echo '<fieldset><legend>Question '.$num.'</legend>';
							echo '<div class="form-group">
								<label for="question'.$num.'">Question</label>
								<div class="col-sm-6"><input type="text" name="question'.$num.'" id="question'.$num.'" class="form-control" /></div>
							</div>';
							echo '<div class="form-group">
								<label class="radio-inline"><input type="radio" id="type'.$num.'" value="1">Case à cocher</label>
								<label class="radio-inline"><input type="radio" id="type'.$num.'" value="2">Liste déroulante</label>
							</div>';
							for ($j=1; $j < 6; $j++) { 
								echo '<div class="form-group">
									<label for="proposition1-'.$num.'">Réponse '.$j.'</label>
									<div class="col-sm-6"><input type="text" name="proposition'.$j.'-'.$num.'" id="proposition1-'.$num.'" class="form-control" /></div>
								</div>';								
							}
							echo '</fieldset>';
							echo '</div>';
						}
					?>
				</div>
				<button type="submit" class="btn btn-primary">Créer le sondage</button>
			</form>
		</div>
	</div>
</div>
<?php include("includes/footer.php"); ?>