<?php include('includes/header.php'); ?>

<h1>Équipe pédagogique</h1>

<?php $membre = $membres[0]; ?>
<div class="row">
	<div class="col-md-12">
		<h2><?php echo $membre->getNom().' '.$membre->getPrenom(); ?> <small><?php echo $membre->getRole(); ?></small></h2>
	</div>
	<div class="col-md-8">
		<?php echo $membre->getActivite(); ?>
		<p><strong>Membre de l'équipe depuis le :</strong> <?php echo $membre->getDateEntreeSlash(); ?></p>
	</div>
	<div class="col-md-4">
		<img <?php echo 'src="data/images/equipePedagogique/'.$membre->getPhoto().'"'; ?> class="img-responsive">
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<?php
		if (count($membres) > 1) {
			$i = 1;
			while (isset($membres[$i])) {
				$membre = $membres[$i];
				echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="row">';
							echo '<div class="col-md-12">';
								echo '<h2>'.$membre->getNom().' '.$membre->getPrenom().' <small>'.$membre->getRole().'</small></h2>';
							echo '</div>';
							echo '<div class="col-md-4">';
								echo '<img src="data/images/equipePedagogique/'.$membre->getPhoto().'" >';
							echo '</div>';
							echo '<div class="col-md-8">';
								echo $membre->getActivite();
								echo '<p><strong>Membre de l\'équipe depuis le :</strong>'.$membre->getDateEntreeSlash().'</p>';
							echo '</div>';
						echo '</div>';
						echo '<hr>';
					echo '</div>';
					$i++;
					if (isset($membres[$i])) {
						$membre = $membres[$i];
						echo '<div class="col-md-12">';
							echo '<div class="row">';
								echo '<div class="col-md-12">';
									echo '<h2>'.$membre->getNom().' '.$membre->getPrenom().' <small>'.$membre->getRole().'</small></h2>';
								echo '</div>';
								echo '<div class="col-md-8">';
									echo $membre->getActivite();
									echo '<p><strong>Membre de l\'equipe depuis le :</strong>'.$membre->getDateEntreeSlash().'</p>';
								echo '</div>';
								echo '<div class="col-md-4">';
									echo '<img src="data/images/equipePedagogique/'.$membre->getPhoto().'" >';
								echo '</div>';
							echo '</div>';
							echo '<hr>';
						echo '</div>';
					}
				echo '</div>';
				$i++;
			}
		}
	?>
</div>

<?php include('includes/footer.php'); ?>