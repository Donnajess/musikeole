<?php include('includes/header.php'); ?>

<div class="row">
	<div class="col-md-12">
		<h1><?php echo $manif->getNom(); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?php echo $manif->getDescription(); ?>
	</div>
	<div class="col-md-6">
		<?php echo '<img src="data/images/manifestations/'.$manif->getImage().'" class="img-responsive" >'; ?>
	</div>
	<div class="col-md-6">
		<p><strong>Date : </strong> le <?php echo $manif->getDateSlash().' à '.$manif->getHeureH(); ?></p>
		<hr>
		<p><strong>Organisateur : </strong><?php echo $manif->getAssociation()->getNom(); ?></p>
		<hr>
		<?php
			if (!$manif->manifestationPassee()) {
		?>
			<div class="row">
				<?php
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
				?>
			</div>
			<hr>
			<p><strong>Places restantes : </strong><?php echo $manif->getPlaces(); ?> <button class="btn btn-primary pull-right"><a href="#">Réserver des places</a></button></p>
		<?php
			}
		?>
	</div>
</div>
<?php
	if ($manif->manifestationPassee()) {
		if ($manif->getAlbum()) {
?>
			<div class="row">
				<div class="col-md-12">
					<hr>
					<h2>Album photo <button class="btn btn-primary pull-right"><a <?php echo 'href="cAlbums.php?action=album&id='.$manif->getAlbum()->getId().'"'; ?> >Voir toutes les photos</a></button></h2>
				</div>
			</div>
			<?php
				$photos = $manif->getAlbum()->getPhotos();
				shuffle($photos);
				for ($i=0; $i < 8; $i++) { 
					$photo = $photos[$i];
					if (($i%4) == 0) {
						echo '<div class="row">';
					}
					echo '<div class="col-md-3">';
						echo '<img src="data/images/photos/miniatures/'.$photo->getFichier().'" class="img-responsive" >';
					echo '</div>';
					if (((($i + 1) % 4) == 0) || ($i == 7)) {
						echo '</div>';
					}
				}
			?>
<?php
		}else{
?>
			<div class="row">
				<div class="col-md-12">
					<hr>
					<h2>Album photo</h2>
					<p>Il n'y a pas d'albums photos pour cette manifestation.</p>
				</div>
			</div>
<?php
		}
	}
?>

<?php include('includes/footer.php'); ?>