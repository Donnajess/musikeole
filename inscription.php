<?php
	include('modeles/ConnexionBDD.php');
	include('includes/recupererDonnees.php');
	include('includes/contenuAccueil.php');
	session_start();
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
						<div class="row">
							<div class="col-md-12">
								<?php
									if (isset($messageErreur)) {
										echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p>'.$messageErreur.'</p>
										</div>';
									}
								?>
							</div>
						</div>
						<h1>Vous souhaitez rejoindre l'association ?</h1>
						<div class="row introInscription">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="introInscription">Plusieurs options s'offrent à vous. Vous souhaitez nous rejoindre en famille ? Ou alors vous êtes seul ?</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h4>La cotisation :</h4>
								<ul><li>Individuelle : 2€<br></li>
								<li>Famille (3 personnes minimum) : 5€</li></ul>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p>Cette inscription se fait à l'aide d'un formulaire d'inscription. Dès que vous aurez soumis le formulaire, celui-ci sera étudié et validé par l'administrateur une fois que vous aurez réglé votre cotisation à l'association.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p>Veuillez sélectionner votre formulaire. Si vous souhaitez inscrire une famille, sélectionnez combien de membre souhaitez vous inscrire afin de générer autant de formulaire que de futur adhérents (3 minimum).</p><br> 
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
  									<form action="cInscription.php?action=individuel" style="margin-bottom:12px;" method="POST" class="form-inline">
										<button class="btn btn-primary btnFormSondage">Formulaire Individuel</button>
									</form>
								  	<form action="cInscription.php?action=famille" method="POST" class="form-inline">
										<div class="form-group"><input type="text" name="nbPersonnes" id="nbPersonnes" class="form-control" placeholder="Nombre de personnes" required></div>
										<button class="btn btn-primary btnFormSondage">Formulaire Famille</button>
									</form>
							</div>
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
	