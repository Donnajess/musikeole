<?php include('includes/header.php'); ?>

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
		</div>
	</div>
</div>

<?php include('includes/footer.php'); ?>