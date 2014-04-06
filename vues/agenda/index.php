<?php include('includes/header.php'); ?>

<h1>Agenda</h1>

<?php
	if (count($manifestations) > 0) {
		$manif = $manifestations[0];
		echo '<div class="row">';
			echo '<div class="col-lg-12 col-md-12 col-sm-12">';
				echo '<h2>'.$manif->getNom().'</h2>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo $manif->getDescription();
			echo '</div>';
			echo '<div class="col-md-12">';
				echo '<hr>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<p>Le '.$manif->getDate().' à '.$manif->getHeure().'</p>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<p>Organisée par "'.$manif->getAssociation()->getNom().'"</p>';
			echo '</div>';
			echo '<hr>';
			if ($manif->getGratuit()) {
				echo '<div class="col-md-12">';
					echo '<p>Manifestation gratuite</p>';
				echo '</div>';
			}else{
				echo '<div class="col-sm-4">';
					echo '<p><strong>Prix adhérent</strong> : '.$manif->getPrixAdherent().' Euros</p>';
				echo '</div>';
				echo '<div class="col-sm-4">';
					echo '<p><strong>Prix extérieur</strong> : '.$manif->getPrixExterieur().' Euros</p>';
				echo '</div>';
				echo '<div class="col-sm-4">';
					echo '<p><strong>Prix enfant</strong> : '.$manif->getEnfant().' Euros</p>';
				echo '</div>';
			}
		echo '</div>';

		// Foreach pour les autres manifs
	} else {
		echo '<p>Il n\'y a aucune manifestation de prévue pour l\'instant.</p>';
	}
?>

<?php include('includes/footer.php'); ?>