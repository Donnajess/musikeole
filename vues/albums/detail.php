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
	</div>
</div>

<?php
	$photos = $album->getPhotos();
	$nbPhotos = count($photos);
	for ($i=0; $i < $nbPhotos; $i++) { 
		$photo = $photos[$i];
		if (($i%6) == 0) {
			echo '<div class="row">';
		}
		echo '<div class="col-md-2">';
			echo '<a href="" data-toggle="modal" data-target="#modal'.$photo->getId().'"><img src="data/images/photos/miniatures/'.$photo->getFichier().'" class="img-responsive" ></a>';
		echo '</div>';
		echo '<div class="modal fade" id="modal'.$photo->getId().'" tabindex="-1" role="dialog" aria-labelledby="'.$album->getId().'" aria-hidden="true">';
			echo '<div class="modal-dialog modal-lg">';
				echo '<div class="modal-content">';
					echo '<div class="modal-header">';
						echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
					echo '</div>';
					echo '<div class="modal-body">';
						echo '<img src="data/images/photos/'.$photo->getFichier().'" class="img-responsive" >';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		if (((($i + 1) % 6) == 0) || ($i == ($nbPhotos - 1))) {
			echo '</div>';
		}
	}
?>

<?php include('includes/footer.php'); ?>