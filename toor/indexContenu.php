<?php
// if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {
	include("includes/header.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Gestion de contenu</h1>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#musikeole" data-toggle="tab">Musik'Eole</a></li>
					<li><a href="#pedagogique" data-toggle="tab">Équipe pédagogique</a></li>
					<li><a href="#associations" data-toggle="tab">Associations</a></li>
					<li><a href="#bannieres" data-toggle="tab">Bannières</a></li>
					<li><a href="#reglements" data-toggle="tab">Règlements</a></li>
					<li><a href="#partenaires" data-toggle="tab">Partenaires</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="musikeole">
						<p>
							Dans cette section, vous pouvez gérer la présentation de l'association Musik'Eole, ses coordonées, ainsi que les membres du bureau.
						</p>
					</div>
					<div class="tab-pane" id="pedagogique">
						<p>
							Dans cette section, vous pouvez gérer les présentations de chaque association satellite (Création, suppression, modification) ainsi que la présentation de l'école de musique.
						</p>
					</div>
					<div class="tab-pane" id="associations">
						<p>
							Dans cette section, vous pouvez gérer les présentations de chaque association satellite (Création, suppression, modification) ainsi que la présentation de l'école de musique.
						</p>
					</div>
					<div class="tab-pane" id="bannieres">
						<p>
							Dans cette section, vous choisissez les bannières à afficher pour chaque catégorie de pages du site.
						</p>
					</div>
					<div class="tab-pane" id="reglements">
						<p>
							Dans cette section, vous pouvez mettre en ligne le règlement intérieur et la charte d'utilisation du site, au format .pdf.
						</p>
					</div>
					<div class="tab-pane" id="partenaires">
						<p>
							Dans cette section, vous pouvez gérer les adresses utiles, les publicités, ainsi que les logos des partenaires.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionContenuMusikEole.php?action=index">
							<span class="glyphicon glyphicon-home"></span>
							<h3>Musik'Eole</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionEquipePedagogique.php">
							<span class="glyphicon glyphicon-music"></span>
							<h3>Équipe pédagogique</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionAssociations.php">
							<span class="glyphicon glyphicon-list"></span>
							<h3>Associations</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionBannieres.php?action=index">
							<span class="glyphicon glyphicon-picture"></span>
							<h3>Bannières</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionReglements.php">
							<span class="glyphicon glyphicon-file"></span>
							<h3>Règlements</h3>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="cGestionPartenaires.php">
							<span class="glyphicon glyphicon-comment"></span>
							<h3>Partenaires</h3>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include("includes/footer.php");
// }else{
// 	header('Location: ../index.php');
// 	exit();
// }
?>