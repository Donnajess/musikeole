<?php include('includes/header.php'); ?>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $album->getNom(); ?></h1>
			<?php
				if ($album->getManifestation()) {
					echo '<p>Album de la manifestation '.$album->getManifestation()->getNom().', organisée par l\'asociation '.$album->getManifestation()->getAssociation()->getNom().', le '.$album->getManifestation()->getDateSlash().' à '.$album->getManifestation()->getHeureH().'.</p>';
				}
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php
				if (isset($message)) {
					echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>'.$message.'</p>
					</div>';
				}
			?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<form <?php echo 'action="'.$_SERVER['REQUEST_URI'].'"'; ?> method="POST" enctype="multipart/form-data" class="form-horizontal">
				<?php echo '<input type="hidden" name="id" id="id" value="'.$album->getId().'" >'; ?>
				<div class="form-group">
					<label for="photos" class="col-sm-2 col-sm-offset-1 control-label">Photos à ajouter</label>
					<div class="col-sm-6">
						<input type="file" name="photos[]" id="photos[]" class="form-control" multiple required>
						<p class="help-block">14 photos maximum par envoi, fichiers .jpg/.jpeg uniquement.</p>
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-primary">Valider</button>
					</div>
				</div>
			</form>
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
					echo '<a href="" data-toggle="modal" data-target="#modal'.$photo->getId().'"><img src="../data/images/photos/miniatures/'.$photo->getFichier().'" class="img-responsive" ></a>';
				echo '</div>';
				echo '<div class="modal fade" id="modal'.$photo->getId().'" tabindex="-1" role="dialog" aria-labelledby="'.$album->getId().'" aria-hidden="true">';
					echo '<div class="modal-dialog modal-lg">';
						echo '<div class="modal-content">';
							echo '<div class="modal-header">';
								echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
								echo '<h4 class="modal-title" id="'.$album->getId().'">'.$album->getNom().'</h4>';
							echo '</div>';
							echo '<div class="modal-body">';
								echo '<img src="../data/images/photos/'.$photo->getFichier().'" class="img-responsive" >';
							echo '</div>';
							echo '<div class="modal-footer">';
								echo '<button type="button" class="btn btn-default" data-dismiss="modal">Revenir à l\'album</button>';
								echo '<button type="button" class="btn btn-danger"><a href="cGestionAlbums.php?action=supprimerPhoto&id='.$photo->getId().'">Supprimer la photo</a></button>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				if (((($i + 1) % 6) == 0) || ($i == ($nbPhotos - 1))) {
					echo '</div>';
				}
			}
		?>
		
</div>

<?php include('includes/footer.php'); ?>