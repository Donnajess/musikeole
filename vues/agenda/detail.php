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
	</div>
	<div class="col-md-12">
		<hr>
		<h2>Album photo <button class="btn btn-primary pull-right"><a href="#">Voir toutes les photos</a></button></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<img src="data/images/photos/photo1.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo2.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo3.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo4.jpg" class="img-responsive">
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<img src="data/images/photos/photo5.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo6.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo7.jpg" class="img-responsive">
	</div>
	<div class="col-md-3">
		<img src="data/images/photos/photo8.jpg" class="img-responsive">
	</div>
</div>

<?php include('includes/footer.php'); ?>