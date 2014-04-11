<?php include('includes/header.php'); ?>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
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
			echo '<a href="data/images/photos/'.$photo->getFichier().'" title="'.$album->getNom().'" ><img src="data/images/photos/miniatures/'.$photo->getFichier().'" class="img-responsive" ></a>';
		echo '</div>';
		if (((($i + 1) % 6) == 0) || ($i == ($nbPhotos - 1))) {
			echo '</div>';
		}
	}
?>
</div>
<script src="assets/js/blueimp-gallery.min.js"></script>
<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
<?php include('includes/footer.php'); ?>