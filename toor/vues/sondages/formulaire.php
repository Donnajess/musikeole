<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $titre; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form action="cGestionSondages.php?action=valider" method="POST" class="form-horizontal">
				<?php
					for ($i=0; $i < $nbQuestions; $i++) {
						$num = $i + 1;
						echo '<fieldset><legend>Question '.$num.'</legend>';
						echo '<div class="form-group">
							<label for="question'.$num.'">Question</label>
							<div class="col-sm-6"><input type="text" name="question'.$num.'" id="question'.$num.'" class="form-control" /></div>
						</div>';
						echo '<div class="form-group">
							<label class="radio-inline"><input type="radio" id="type'.$num.'" value="1">Case à cocher</label>
							<label class="radio-inline"><input type="radio" id="type'.$num.'" value="2">Liste déroulante</label>
						</div>';
						echo '<div class="form-group">
							<label for="proposition1-'.$num.'">Réponse 1</label>
							<div class="col-sm-6"><input type="text" name="proposition1-'.$num.'" id="proposition1-'.$num.'" class="form-control" /></div>
						</div>';
						echo '<div class="form-group">
							<label for="proposition2-'.$num.'">Réponse 2</label>
							<div class="col-sm-6"><input type="text" name="proposition2-'.$num.'" id="proposition2-'.$num.'" class="form-control" /></div>
						</div>';
						echo '<div class="form-group">
							<label for="proposition3-'.$num.'">Réponse 3</label>
							<div class="col-sm-6"><input type="text" name="proposition3-'.$num.'" id="proposition3-'.$num.'" class="form-control" /></div>
						</div>';
						echo '<div class="form-group">
							<label for="proposition4-'.$num.'">Réponse 4</label>
							<div class="col-sm-6"><input type="text" name="proposition4-'.$num.'" id="proposition4-'.$num.'" class="form-control" /></div>
						</div>';
						echo '<div class="form-group">
							<label for="proposition5-'.$num.'">Réponse 5</label>
							<div class="col-sm-6"><input type="text" name="proposition5-'.$num.'" id="proposition5-'.$num.'" class="form-control" /></div>
						</div>';
						echo '</fieldset>';
					}
				?>
				<button type="submit" class="btn btn-primary">Créer le sondage</button>
			</form>
		</div>
	</div>
</div>
<?php include("includes/footer.php"); ?>