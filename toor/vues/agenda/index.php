<?php include("includes/header.php"); ?>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Agenda</h1>
			<hr>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#manifestations" data-toggle="tab">À venir</a></li>
				<li><a href="#inscriptions" data-toggle="tab">Inscriptions</a></li>
				<li><a href="#enAttente" data-toggle="tab">en Attente</a></li>
				<li><a href="#inscriptions" data-toggle="tab">Historique</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="manifestations">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, unde, pariatur, eos assumenda doloremque officia facere quas quos rerum aliquam veritatis debitis modi quisquam dolores excepturi perferendis voluptates ducimus error.
					</p>
				</div>
				<div class="tab-pane" id="inscriptions">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, beatae necessitatibus mollitia assumenda nulla maxime eveniet at eius veniam voluptate recusandae veritatis ut minima. Modi, facilis rerum a placeat ipsam.
					</p>	
				</div>
				<div class="tab-pane" id="enAttente">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, animi, iure iste ea nulla ducimus fuga ipsa placeat voluptate molestias rerum ut reprehenderit repellat veniam similique dolores et repudiandae sed!
					</p>
				</div>
				<div class="tab-pane" id="historique">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, dolorem dignissimos ab quod sit consectetur veniam dolor neque molestiae illo. Ipsa, iste laborum quidem necessitatibus quos minus totam recusandae dicta.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php
				if (isset($messageInscriptions)) {
					echo '<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>Il y a des inscriptions en attente pour les manifestations suivantes : $listeManifs</p>
					</div>';
				}
				if (isset($message)) {
					echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>'.$message.'</p>
					</div>';
				}
			?>
		</div>
	</div>

	<?php
		if (count($manifestationsEnAttente) > 0) {
			echo '<div class="row">';
				echo '<div class="col-md-12">';
					echo '<h2>Manifestations en attente</h2>';
					echo '<div class="panel-group" id="accordionAttente">';
						foreach ($manifestationsEnAttente as $manif) {
							echo '<div class="panel panel-default">';
								echo '<div class="panel-heading">';
									echo '<h4 class="panel-title"><a href="#collapse'.$manif->nomFormate().'" data-parent="#accordionEnAtttente" data-toggle="collapse">'.$manif->getNom().'</a></h4>';
								echo '</div>';
								echo '<div id="collapse'.$manif->nomFormate().'" class="panel-collapse collapse">';
									echo '<div class="panel-body">';
										echo '<div class="row">';
											echo '<div class="col-md-6">';
												echo $manif->getDescription();
												echo '<hr>';
												echo '<div class="row">';
													echo '<div class="col-md-6">';
														echo '<p>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</p>';
													echo '</div>';
													echo '<div class="col-md-6">';
														echo '<p>Organisée par "'.$manif->getMembre()->getNom().'"</p>';
													echo '</div>';
												echo '</div>';
												echo '<hr>';
												if ($manif->getGratuit()) {
													echo '<p>Manifestation gratuite</p>';
												}else{
													echo '<div class="row">';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix adhérent</strong> : '.$manif->getPrixAdherent().' Euros</p>';
														echo '</div>';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix extérieur</strong> : '.$manif->getPrixExterieur().' Euros</p>';
														echo '</div>';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix enfant</strong> : '.$manif->getEnfant().' Euros</p>';
														echo '</div>';
													echo '</div>';
												}
											echo '</div>';
											echo '<div class="col-md-6">';
												echo '<img src="../data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	?>

	<div class="row">
		<div class="col-md-12">
			<h2>Manifestations à venir <button class="btn btn-primary pull-right"><a href="cGestionAgenda.php?action=ajouterManifestation">Nouvelle manifestation</a></button></h2>
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Image</th>
						<th>Nom</th>
						<th>Date</th>
						<th>Organisateur</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($manifestationsAVenir as $manif) {
							echo '<tr>';
								echo '<td class="cellule-image"><a href="cGestionAgenda.php?action=modifierManifestation&id='.$manif->getId().'"><img src="../data/images/manifestations/miniatures/'.$manif->getImage().'?v='.filemtime('../data/images/manifestations/miniatures/'.$manif->getImage()).'" class="img-responsive img-thumbnail"></a></td>';
								echo '<td><a href="cGestionAgenda.php?action=modifierManifestation&id='.$manif->getId().'">'.$manif->getNom().'</a></td>';
								echo '<td>'.$manif->getDateSlash().' à '.$manif->getHeureH().'</td>';
								echo '<td>'.$manif->getAssociation()->getNom().'</td>';
								echo '<td><button class="btn btn-danger"><a href="cGestionAgenda.php?action=supprimerManifestation&id='.$manif->getId().'">Supprimer</a></button></td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Historique des manifestations</h2>
			<div class="panel-group" id="accordionHistorique">
				<?php
					if (count($manifestationsPassees) > 0) {
						foreach ($manifestationsPassees as $manif) {
							echo '<div class="panel panel-default">';
								echo '<div class="panel-heading">';
									echo '<h4 class="panel-title"><a href="#collapse'.$manif->nomFormate().'" data-parent="#accordionHistorique" data-toggle="collapse">'.$manif->getNom().'</a></h4>';
								echo '</div>';
								echo '<div id="collapse'.$manif->nomFormate().'" class="panel-collapse collapse">';
									echo '<div class="panel-body">';
										echo '<div class="row">';
											echo '<div class="col-md-6">';
												echo $manif->getDescription();
												echo '<hr>';
												echo '<div class="row">';
													echo '<div class="col-md-6">';
														echo '<p>Le '.$manif->getDateSlash().' à '.$manif->getHeureH().'</p>';
													echo '</div>';
													echo '<div class="col-md-6">';
														echo '<p>Organisée par "'.$manif->getAssociation()->getNom().'"</p>';
													echo '</div>';
												echo '</div>';
												echo '<hr>';
												if ($manif->getGratuit()) {
													echo '<p>Manifestation gratuite</p>';
												}else{
													echo '<div class="row">';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix adhérent</strong> : '.$manif->getPrixAdherent().' Euros</p>';
														echo '</div>';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix extérieur</strong> : '.$manif->getPrixExterieur().' Euros</p>';
														echo '</div>';
														echo '<div class="col-sm-4">';
															echo '<p><strong>Prix enfant</strong> : '.$manif->getPrixEnfant().' Euros</p>';
														echo '</div>';
													echo '</div>';
												}
												echo '<hr>';
											echo '</div>';
											echo '<div class="col-md-6">';
												echo '<img src="../data/images/manifestations/'.$manif->getImage().'" class="img-responsive">';
											echo '</div>';
										echo '</div>';
										echo '<div class="row">';
											echo '<div class="col-md-2">';
												echo '<p><strong>Album photo</strong></p>';
											echo '</div>';
											echo '<div class="col-md-2">';
												if ($manif->getAlbum()) {
													echo $manif->getAlbum()->getNom();
												} else {
													echo '<p>Aucun</p>';
												}
											echo '</div>';
											if ($manif->getAlbum()) {
												$photos = $manif->getAlbum()->getPhotos();
												shuffle($photos);
												for ($i=0; $i < 8; $i++) {
													if (isset($photos[$i])) {
														echo '<div class="col-md-1">';
															echo '<img src="../data/images/photos/miniatures/'.$photos[$i]->getFichier().'" class="img-responsive">';
														echo '</div>';
													}
												}
											}else{
												echo '<div class="col-md-9"></div>';
											}
										echo '</div>';
										echo '<div class="row">';
											echo '<div class="col-md-12">';
												echo '<hr>';
											echo '</div>';
											echo '<div class="col-md-8">';
												if ($manif->getAlbum()) {
													echo '<button type="button" class="btn btn-danger btn-agenda-supprimer"><a href="cGestionAgenda.php?action=detacherAlbum&id='.$manif->getId().'">Détacher l\'album photo de cette manifestation</a></button>';
												}else{
													echo '<form action="cGestionAgenda.php?action=ajouterAlbum" method="POST" class="form-horizontal">';
														echo '<input type="hidden" name="idManif" id="idManif" value="'.$manif->getId().'">';
														echo '<div class="form-group">';
															echo '<label for="album" class="control-label col-md-2">Album photo</label>';
															echo '<div class="col-md-6">';
																echo '<select class="form-control" id="album" name="album" required>';
																	foreach ($albumsNonAttribues as $album) {
																		echo '<option value="'.$album->getId().'">'.$album->getNom().'</option>';
																	}
																echo '</select>';
															echo '</div>';
															echo '<div class="col-md-3">';
																echo '<button type="submit" class="btn btn-primary btn-agenda">Ajouter l\'album photo</button>';
															echo '</div>';
														echo '</div>';
													echo '</form>';
												}
											echo '</div>';
											echo '<div class="col-md-3 col-md-offset-1">';
												echo '<button type="button" class="btn btn-danger btn-agenda-supprimer"><a href="cGestionAgenda.php?action=supprimerManifestation&id='.$manif->getId().'">Supprimer la manifestation</a></button>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}	
					}else{
						echo '<p>Aucune manifestation passée pour le moment.</p>';
					}
				?>
			</div>
		</div>
	</div>

</div>
<?php include("includes/footer.php"); ?>