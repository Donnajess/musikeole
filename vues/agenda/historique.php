<?php include('includes/header.php'); ?>

<h1>Historique</h1>

<?php
	if (count($manifestations) > 0) {
		$manif = $manifestations[0];
		echo '<div class="row">';
			echo '<div class="col-lg-12 col-md-12 col-sm-12">';
				echo '<h2>'.$manif->getNom().'</h2>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
					echo '</div>';
					echo '<div class="col-md-12">';
						echo '<div class="row">';
							echo '<div class="col-md-12">';
								echo '<h3>Album <button class="btn btn-primary pull-right"><a href="#">Voir les photo</a></button></h3>';
							echo '</div>';
							echo '<div class="col-md-4">';
								echo '<img src="data/images/photos/photo1.jpg" class="img-responsive">';
							echo '</div>';
							echo '<div class="col-md-4">';
								echo '<img src="data/images/photos/photo2.jpg" class="img-responsive">';
							echo '</div>';
							echo '<div class="col-md-4">';
								echo '<img src="data/images/photos/photo3.jpg" class="img-responsive">';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo $manif->getDescription();
			echo '</div>';
			echo '<div class="col-md-12">';
				echo '<hr>';
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<p>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</p>';
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
					echo '<p><strong>Prix enfant</strong> : '.$manif->getPrixEnfant().' Euros</p>';
				echo '</div>';
			}
			echo '<div class="col-md-12">';
				echo '<hr>';
			echo '</div>';
		echo '</div>';

		if (count($manifestations) > 1) {
			echo '<div class="row">';
				echo '<div class="col-md-12">';
					echo '<h2>Dernièrement</h2>';
					echo '<hr>';
				echo '</div>';
			$i = 1;
			while (isset($manifestations[$i])) {
				$manif = $manifestations[$i];
				echo '<div class="row">';
					echo '<div class="col-md-4">';
						echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
						echo '<h3>'.$manif->getNom().'</h3>';
						echo '<ul class="list-unstyled">';
							echo '<li>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</li>';
							echo '<li>Organisé par "'.$manif->getAssociation()->getNom().'"</li>';
						echo '</ul>';
						echo '<button class="btn btn-primary"><a href="cAgenda.php?action=detailManif&id='.$manif->getId().'">En savoir plus</a></button>';
						echo '<button class="btn btn-success pull-right"><a href="#">Album</a></button>';
					echo '</div>';
					$i++;
					if (isset($manifestations[$i])) {
						$manif = $manifestations[$i];
						echo '<div class="col-md-4">';
							echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
							echo '<h3>'.$manif->getNom().'</h3>';
							echo '<ul class="list-unstyled">';
								echo '<li>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</li>';
								echo '<li>Organisé par "'.$manif->getAssociation()->getNom().'"</li>';
							echo '</ul>';
							echo '<button class="btn btn-primary"><a href="cAgenda.php?action=detailManif&id='.$manif->getId().'">En savoir plus</a></button>';
							echo '<button class="btn btn-success pull-right"><a href="#">Album</a></button>';
						echo '</div>';
						$i++;
						if (isset($manifestations[$i])) {
							$manif = $manifestations[$i];
							echo '<div class="col-md-4">';
								echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
								echo '<h3>'.$manif->getNom().'</h3>';
								echo '<ul class="list-unstyled">';
									echo '<li>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</li>';
									echo '<li>Organisé par "'.$manif->getAssociation()->getNom().'"</li>';
								echo '</ul>';
								echo '<button class="btn btn-primary"><a href="cAgenda.php?action=detailManif&id='.$manif->getId().'">En savoir plus</a></button>';
								echo '<button class="btn btn-success pull-right"><a href="#">Album</a></button>';
							echo '</div>';	
						}
					}
				echo '</div>';
				$i++;
			}
			foreach ($manifestations as $num => $manif) {
				if ($num > 0) {

				}
			}
			echo '</div>';
		}
	} else {
		echo '<p>Il n\'y a aucune manifestation de prévue pour l\'instant.</p>';
	}
?>

<?php include('includes/footer.php'); ?>