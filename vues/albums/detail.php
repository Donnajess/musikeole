<?php include('includes/header.php'); ?>

<div id="blueimp-gallery" class="blueimp-gallery">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
	<div class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" aria-hidden="true">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body next"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left prev">
						<i class="glyphicon glyphicon-chevron-left"></i>
						Précédent
					</button>
					<button type="button" class="btn btn-primary next">
						Suivant
						<i class="glyphicon glyphicon-chevron-right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

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

<div id="links">
<?php
	$photos = $album->getPhotos();
	$nbPhotos = count($photos);
	for ($i=0; $i < $nbPhotos; $i++) { 
		$photo = $photos[$i];
		if (($i%6) == 0) {
			echo '<div class="row">';
		}
		echo '<div class="col-md-2">';
			echo '<a href="data/images/photos/'.$photo->getFichier().'" title="'.$album->getNom().'" data-gallery><img src="data/images/photos/miniatures/'.$photo->getFichier().'" class="img-responsive" ></a>';
		echo '</div>';
		if (((($i + 1) % 6) == 0) || ($i == ($nbPhotos - 1))) {
			echo '</div>';
		}
	}
?>
</div>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="assets/js/imagegallery/js/bootstrap-image-gallery.min.js"></script>
<?php include('includes/footer.php'); ?>