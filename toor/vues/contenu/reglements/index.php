<?php include("includes/header.php"); ?>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Règlements</h1>
			<p>C'est sur cette page que vous pouvez modifier les règlements du site Musik'Eole. Ils sont au nombre de deux : le règlement intérieur et la charte du site internet. Ces documents sont à accepter par les membres lors de leur inscription sur le site, et seront visibles sur tout le site via un lien en bas de toutes les pages.</p>
			<p>Ces documents sont à télécharger au format .pdf.</p>
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
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseReglementInterieur" data-parent="#accordion" data-toggle="collapse">Règlement intérieur</a></h4>
					</div>
					<div id="collapseReglementInterieur" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionreglements.php?action=modifier" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
								<input type="hidden" name="pdf" id="pdf" value="reglementInterieur">
								<input type="hidden" name="nom" id="nom" value="Le règlement intérieur">
								<div class="form-group">
									<label class="col-sm-5 control-label" for="fichier">Nouveau règlement intérieur (Fichiers .pdf seulement)</label>
									<div class="col-sm-5">
										<input type="file" name="fichier" id="fichier" class="form-control">
									</div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-primary">Valider</button>
									</div>
								</div>
							</form>
							<hr>
							<iframe src="../data/contenu/legal/reglementInterieur.pdf" width="100%" height="500" align="middle"></iframe>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#collapseCharte" data-parent="#accordion" data-toggle="collapse">Charte du site internet</a></h4>
					</div>
					<div id="collapseCharte" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="cGestionreglements.php?action=modifier" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
								<input type="hidden" name="pdf" id="pdf" value="charteSite">
								<input type="hidden" name="nom" id="nom" value="La charte du site internet">
								<div class="form-group">
									<label class="col-sm-5 control-label" for="fichier">Nouvelle charte du site (Fichiers .pdf seulement)</label>
									<div class="col-sm-5">
										<input type="file" name="fichier" id="fichier" class="form-control">
									</div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-primary">Valider</button>
									</div>
								</div>
							</form>
							<hr>
							<iframe src="../data/contenu/legal/charteSite.pdf" width="100%" height="500" align="middle"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			
</div>

<?php include("includes/footer.php"); ?>