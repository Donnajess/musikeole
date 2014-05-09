<?php include('includes/header.php'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Nouvel album</h4>
			</div>
			<div class="modal-body">
				<form action="cGestionAlbums.php?action=creerAlbum" method="POST" enctype="multipart/form-data" id="formAjoutAlbum" class="form-horizontal">
					<div class="form-group">
						<label for="nom" class="control-label col-sm-4">Nom de l'album</label>
						<div class="col-sm-8">
							<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de l'album" required>
						</div>
					</div>
					<div class="form-group">
						<label for="photos" class="control-label col-sm-4">Photos</label>
						<div class="col-sm-8">
							<input type="file" name="photos[]" id="photos[]" class="form-control" accept="image/*" multiple>
							<p class="help-block">Vous pouvez sélectionner plusieurs photos à la fois, seulement au format .jpg/.jpeg. OVH limite les upload à 14 fichiers maximum à la fois.</p>
						</div>
					</div>
					<div class="form-group">
						<label for="manifestation" class="control-label col-sm-4">Manifestation</label>
						<div class="col-sm-8">
							<select name="manifestation" id="manifestation" class="form-control">
								<option value="0" selected>Aucune manifestation</option>
								<?php
									foreach ($manifestations as $manif) {
										echo '<option value="'.$manif->getId().'">'.$manif->getNom().'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" form="formAjoutAlbum" class="btn btn-primary">Enregistrer l'album</button>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Albums photos</h1>
			<hr>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#liste" data-toggle="tab">Liste des albums</a></li>
				<li><a href="#ajout" data-toggle="tab">Ajouter un album</a></li>
				<li><a href="#modification" data-toggle="tab">Modifier un album</a></li>
				<li><a href="#supprimer" data-toggle="tab">Supprimer un album</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="liste">
					<p>
						Cette page vous présente la liste des albums photos contenus sur le site. Ils sont classés du plus récent au plus ancien.
					</p>
				</div>
				<div class="tab-pane" id="ajout">
					<p>
						Ajouter un album vous permet de créer un nouvel album photo (titre, photos, et la manifestation concernée si besoin est).
					</p>	
				</div>
				<div class="tab-pane" id="modification">
					<p>
						Vous pouvez modifier le titre des albums, ainsi que la manifestation à laquelle l'album est attaché. C'est dans cette page que vous pourrez aussi rajouter ou supprimer des photos de l'album.
					</p>
				</div>
				<div class="tab-pane" id="supprimer">
					<p>
						Cliquez sur le bouton supprimer (en rouge) pour supprimer définitivement un album. Toutes les photos qu'il contient seront aussi supprimées.
					</p>
				</div>
			</div>
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
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 ">
			<h2>Liste des albums <button class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal" >Ajouter un album</button></h2>
		</div>
	</div>
	<?php
		$nbAlbums = count($albums);
		for ($i=0; $i < $nbAlbums; $i++) { 
			$album = $albums[$i];
			$photos = $album->getPhotos();
			if (($i%4) == 0) {
				echo '<div class="row">';
			}
	?>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $album->getNom(); ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<img <?php echo 'src="../data/images/photos/miniatures/'.$photos[0]->getFichier().'"'; ?> class="img-responsive" >
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<img <?php echo 'src="../data/images/photos/miniatures/'.$photos[1]->getFichier().'"'; ?> class="img-responsive" >
						</div>
						<div class="col-md-4">
							<img <?php echo 'src="../data/images/photos/miniatures/'.$photos[2]->getFichier().'"'; ?> class="img-responsive" >
						</div>
						<div class="col-md-4">
							<img <?php echo 'src="../data/images/photos/miniatures/'.$photos[3]->getFichier().'"'; ?> class="img-responsive" >
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary" style="margin : auto; width : 100%;"><a <?php echo 'href="cGestionAlbums.php?action=detailAlbum&id='.$album->getId().'"'; ?> >Accéder à l'album</a></button>
				</div>
			</div>
		</div>
	<?php
			if (((($i + 1) % 4) == 0) || ($i == ($nbAlbums - 1))) {
				echo '</div>';
			}
		}
	?>
</div>

<?php include('includes/footer.php'); ?>