<?php include('includes/header.php'); ?>

<h1>Galerie photos</h1>

<?php $album = $albums[0]; $photos = $album->getPhotos(); shuffle($photos); ?>
<div class="row">
	<div class="col-md-12">
		<h2><?php echo $album->getNom(); ?> <button class="btn btn-primary pull-right"><a <?php echo 'href="cGestionAlbums.php?action=detailAlbum&id='.$album->getId().'"'; ?> >Accéder à l'album</a></button></h2>
		<?php
			if ($album->getManifestation()) {
				echo '<p>Album de la manifestation '.$album->getManifestation()->getNom().', organisée par l\'asociation '.$album->getManifestation()->getAssociation()->getNom().', le '.$album->getManifestation()->getDateSlash().' à '.$album->getManifestation()->getHeureH().'.</p>';
			}
		?>
	<hr>
	</div>
	<div class="col-md-6">
		<?php echo '<img src="data/images/photos/'.$photos[0]->getFichier().'" class="img-responsive">'; ?>
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[1]->getFichier().'" class="img-responsive">'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[2]->getFichier().'" class="img-responsive">'; ?>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[3]->getFichier().'" class="img-responsive">'; ?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[4]->getFichier().'" class="img-responsive">'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[5]->getFichier().'" class="img-responsive">'; ?>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo '<img src="data/images/photos/miniatures/'.$photos[6]->getFichier().'" class="img-responsive">'; ?>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>

<?php
	$nbAlbums = count($albums);
	for ($i = 1; $i < $nbAlbums; $i++) { 
		$album = $albums[$i];
		$photos = $album->getPhotos();
		shuffle($photos);
		if (((($i - 1) % 3)) == 0) {
			echo '<div class="row">';
		}
?>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $album->getNom(); ?></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<img <?php echo 'src="data/images/photos/miniatures/'.$photos[0]->getFichier().'"'; ?> class="img-responsive" >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<img <?php echo 'src="data/images/photos/miniatures/'.$photos[1]->getFichier().'"'; ?> class="img-responsive" >
					</div>
					<div class="col-md-4">
						<img <?php echo 'src="data/images/photos/miniatures/'.$photos[2]->getFichier().'"'; ?> class="img-responsive" >
					</div>
					<div class="col-md-4">
						<img <?php echo 'src="data/images/photos/miniatures/'.$photos[3]->getFichier().'"'; ?> class="img-responsive" >
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary" style="margin : auto; width : 100%;"><a <?php echo 'href="cGestionAlbums.php?action=detailAlbum&id='.$album->getId().'"'; ?> >Accéder à l'album</a></button>
			</div>
		</div>
	</div>
<?php
		if ((($i % 3) == 0) || ($i == ($nbAlbums - 1))) {
			echo '</div>';
		}
	}
?>


<?php include('includes/footer.php'); ?>