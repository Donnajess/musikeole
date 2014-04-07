<?php include("includes/header.php"); ?>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Partenaires</h1>
			<hr>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#partenaires" data-toggle="tab">Partenaires</a></li>
				<li><a href="#publicites" data-toggle="tab">Publicités</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="partenaires">
					<p>
						La partie "partenaires" concerne les logos qui vont apparaître dans le bas de chaque page du site. On peut en ajouter ou en supprimer. Il sont composé du nom du partenaire, ainsi que de son logo.
					</p>
				</div>
				<div class="tab-pane" id="publicites">
					<p>
						Les publicités, au nombre de 3 maximum, ont des encarts réservés sur chaque page du site. On peut ajouter, supprimer et modifier ces publicités.
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

	<div class="row">
		<div class="col-md-12">
			<h2>Partenaires</h2>
			<hr>
			<form action="cGestionPartenaires.php?action=ajouterPartenaire" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group">
					<label for="nomPartenaire" class="control-label col-sm-2">Nouveau partenaire</label>
					<div class="col-sm-4">
						<input type="text" name="nomPartenaire" id="nomPartenaire" class="form-control" placeholder="Nom du partenaire" required>
					</div>
					<div class="col-sm-4">
						<input type="file" name="logoPartenaire" id="logoPartenaire" class="form-control" required>
						<p class="help-block">Les logos doivent être au format .jpg</p>
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-primary">Valider</button>
					</div>
				</div>
			</form>
			<hr>
		</div>
	</div>

	<div class="row">
		<?php
			foreach ($partenaires as $partenaire) {
				echo '<div class="col-md-2 col-sm-3">';
					echo '<div class="panel panel-default">';
						echo '<div class="panel-body panel-partenaire">';
						echo '<div class="imgPartenaire">';
							echo '<img src="'.$partenaire->getLogo().'" alt="'.$partenaire->getNom().'" class="img-responsive img-thumbnail imgLogoPartenaire" >';
							echo '</div>';
							echo '<h4>'.$partenaire->getNom().'</h4>';
							echo '<button class="btn btn-danger btn-partenaire"><a href="cGestionPartenaires.php?action=supprimerPartenaire&id='.$partenaire->getId().'">Supprimer</a></button>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		?>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Publicités</h2>
			<hr>
			<form action="cGestionPartenaires.php?action=modifierPublicite" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group">
					<label for="nomPartenaire" class="control-label col-md-3">Sélectionnez une publicité</label>
					<div class="col-md-4">
						<select class="form-control" name="idPublicite" id="idPublicite">
							<?php
								foreach ($publicites as $pub) {
									echo '<option value="'.$pub->getId().'">'.$pub->getNom().'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-success">Modifier</button>
						<button type="submit" formaction="cGestionPartenaires.php?action=nouvellePublicite" class="btn btn-primary">Remplacer</button>
					</div>
				</div>
			</form>
			<hr>
		</div>
	</div>

	<div class="row">
		<?php
			foreach ($publicites as $pub) {
				$stylePanel = ($pub->getActive()) ? 'panel-info' : 'panel-danger' ;
				echo '<div class="col-md-4">';
					echo '<div class="panel '.$stylePanel.'">';
						echo '<div class="panel-heading">';
							echo '<h3 class="panel-title">'.$pub->getNom().'</h3>';
						echo '</div>';
						echo '<div class="panel-body">';
							echo '<a href="'.$pub->getLien().'" target="_blank"><img src="../data/images/promotions/'.$pub->getImage().'?v='.filemtime('../data/images/promotions/'.$pub->getImage()).'" alt="'.$pub->getNom().'" class="img-responsive img-thumbnail" ></a>';
						echo '</div>';
						echo '<div class="panel-footer">';
							echo '<button class="btn btn-primary"><a href="mailto:'.$pub->getMail().'">Contacter l\'annonceur</a></button>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		?>
	</div>
			
</div>

<?php include("includes/footer.php"); ?>