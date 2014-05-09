<?php include('includes/header.php'); ?>

<div class="row">
	<div class="col-md-12">
		<h1><?php echo $album->getNom(); ?></h1>
		<?php
			if ($album->getManifestation()) {
				echo '<p>Album de la manifestation '.$album->getManifestation()->getNom().', organisée par l\'asociation '.$album->getManifestation()->getAssociation()->getNom().', le '.$album->getManifestation()->getDateSlash().' à '.$album->getManifestation()->getHeureH().'.</p>';
			}
		?>
		<hr>
		<h2>Erreur</h2>
		<p>Vous ne pouvez pas consulter d'albums sans adhérer à l'association. Veuillez vous connecter ou faire une demande d'adhésion.</p>
	</div>
</div>

<?php include('includes/footer.php'); ?>