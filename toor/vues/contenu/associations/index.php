<?php include("includes/header.php"); ?>
<script type="text/javascript" src="../assets/js/tinymce/tinymce.min.js"></script>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Associations</h1>
			<p>Sur cette page, vous pouvez gérer les associations et le contenu de leur page dédiée. En tête de page se trouve aussi la présentation de l'école de musique.</p>
			<p>Attention toutefois, la suppression d'une association entraîne la suppression des évènements qu'elle organise dans la base de données.</p>
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
			<div class="panel-group" id="accordion1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseEcoleMusique" data-parent="#accordion1" data-toggle="collapse">Présentation de l'école de musique</a></h4>
					</div>
					<div id="collapseEcoleMusique" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionAssociations.php?action=modifierEcole" method="POST" role="form">
								<textarea name="presentationEcole" id="presentationEcole" cols="30" rows="10">
									<?php echo $presentationEcole; ?>
								</textarea>
								<button type="submit" class="btn btn-primary btn-lg">Valider</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>
				Associations
				<button type="button" class="btn btn-primary pull-right"><a href="cGestionAssociations.php?action=ajouterAssociation">Ajouter une association</a></button>
			</h2>
			<div class="panel-group" id="accordion2">
				<?php
					foreach ($associations as $association) {
						echo '<div class="panel panel-default">';
							echo '<div class="panel-heading">
								<h4 class="panel-title"><a href="#collapse-'.$association->alias().'" data-parent="#accordion2" data-toggle="collapse">'.$association->getNom().'</a></h4>
							</div>';
							echo '<div id="collapse-'.$association->alias().'" class="panel-collapse collapse">';
								echo '<div class="panel-body">';
									echo '<form action="cGestionAssociations.php?action=modifierAssociation" method="POST" class="form-horizontal" role="form">';
										echo '<input type="hidden" name="id" id="id" value="'.$association->getId().'" >';
										echo '<input type="hidden" name="association" id="association" value="'.$association->getNom().'" >';
										echo '<input type="hidden" name="fichier" id="fichier" value="'.$association->getFichier().'" >';
										echo '<div class="form-group">';
											echo '<label for="nom-'.$association->alias().'" class="col-md-1 control-label">Nom</label>';
											echo '<div class="col-md-8">';
												echo '<input type="text" class="form-control" name="nom" id="nom-'.$association->alias().'" value="'.$association->getNom().'" placeholder="Nom de l\'association" required>';
											echo '</div>';
											echo '<label for="indice-'.$association->alias().'" class="col-md-1 control-label">Indice</label>';
											echo '<div class="col-md-2">';
												echo '<input type="text" class="form-control" name="indice" id="indice-'.$association->alias().'" value="'.$association->getIndice().'" placeholder="Indice" required>';
											echo '</div>';
										echo '</div>';
										echo '<textarea name="texte" rows="10">'.$association->getContenu().'</textarea>';
										echo '<button type="submit" name="valider" class="btn btn-primary btn-lg btn-margin-top">Valider</button>';
										echo '<button type="button" name="supprimer" class="btn btn-danger btn-lg btn-margin-top pull-right"><a href="cGestionAssociations.php?action=supprimerAssociation&id='.$association->getId().'">Supprimer</a></button>';
									echo '</form>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>
		</div>
	</div>
			
</div>

<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		language : 'fr_FR',
	});
</script>
<?php include("includes/footer.php"); ?>