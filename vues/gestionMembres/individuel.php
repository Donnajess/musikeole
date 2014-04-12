<?php
	include('includes/recupererDonnees.php');
	include('includes/contenuAccueil.php');
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">

		<title>Musik'Eole</title>

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/js/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
		<script type="text/javascript" src="assets/js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div id="wrap">

			<div class="container">

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<img <?php echo 'src="data/images/bannieres/accueil.jpg"'; ?> class="img-responsive">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
									<li><a href="cPresentation.php"><span class="glyphicon glyphicon-music"></span>Présentation</a></li>
									<li><a href="cAgenda.php"><span class="glyphicon glyphicon-calendar"></span>Agenda</a></li>
									<li><a href="cAlbums.php"><span class="glyphicon glyphicon-picture"></span>Galerie Photos</a></li>
									<li><a href="#"><span class="glyphicon glyphicon-comment"></span>Exprimez vous !</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="toor/index.php"><span class="glyphicon glyphicon-cog"></span>Administration</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php include('includes/formulaireConnexion.php'); ?>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php include('includes/afficherSondage.php'); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-6 col-sm-6">
						<h1>Formulaires d'adhésion individuel</h1>
						<br>
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
						<div class="col-lg-6 col-md-6 col-sm-6">
							<form action="cInscription.php?action=validerIndividuel" method="POST">
								<input type="hidden" name="nbPersonnes" id="nbPersonnes" value="'.$nbPersonnes.'" />
										<div class="form-group">
											<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required/>
										</div>
										<div class="form-group">
											<input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required/>
										</div>
										<div class="form-group">
											<input type="text" name="dateNaissance" id="dateNaissance" class="form-control" placeholder="Date de naissance" required/>
										</div>
										<div class="form-group">
											<input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone" required/>
										</div>
										<div class="form-group">
											<input type="email" name="mail" id="mail" class="form-control" placeholder="E-Mail" required/>
										</div>
										<div class="form-group">
											<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required/>
										</div>
								<button type="submit" class="btn btn-primary">Soumettre le formulaire</button>
							</form>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-3">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Newsletter</h3>
									</div>
									<div class="panel-body">
										<form action="index.php" method="POST" role="form">
											<div class="form-group">
												<label for="mail">Adresse mail</label>
												<input type="email" name="mail" id="mail" class="form-control" placeholder="Adresse mail" required>
											</div>
											<button class="btn btn-primary pull-right">S'inscrire</button>
										</form>
									</div>
								</div>
							</div>
							<?php
								foreach ($listePubs as $pub) {
									echo '<div class="col-lg-12 col-md-12 col-sm-12 pub">';
										echo '<a href="'.$pub->getLien().'" target="_blank"><img src="data/images/promotions/'.$pub->getImage().'" alt="'.$pub->getNom().'" class="img-responsive img-thumbnail" ></a>';
									echo '</div>';
								}
							?>
						</div>
					</div>
				</div>

			</div>

			<div id="push"></div>

		</div>

		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td><strong>Partenaires</strong></td>
									<td>
										<?php
											foreach ($listeLogos as $logo) {
												echo '';
													echo '<a href="'.$logo->getLien().'" target="_blank" ><img src="'.$logo->getLogo().'" class="img-responsive img-thumbnail"></a>';
												echo '';
											}
										?>
									</td>
								</tr>
								<tr>
									<td><strong>Association Musik'Eole</strong></td>
									<td><?php echo $coordonnees->getRue().', '.$coordonnees->getCodePostal(); ?></td>
									<td><span class="glyphicon glyphicon-earphone"></span><?php echo $coordonnees->getTelephone(); ?></td>
									<td><span class="glyphicon glyphicon-envelope"></span><?php echo '<a href="mailto:'.$coordonnees->getMail().'">'.$coordonnees->getMail().'</a>'; ?></td>
								</tr>
								<tr>
									<td><strong>Liens : </strong></td>
									<td><a href="data/contenu/legal/charteSite.pdf" target="_blank">Charte du site</a> - <a href="data/contenu/legal/reglementInterieur.pdf" target="_blank">Règlement intérieur</a></td>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
<!--
	