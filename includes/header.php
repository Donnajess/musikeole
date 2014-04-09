<?php
	include('includes/recupererDonnees.php');
	$menuCote = (isset($page)) ? 'includes/menus/'.$page.'.php' : '' ;
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
						<img <?php echo 'src="data/images/bannieres/'.$page.'.jpg"'; ?> class="img-responsive">
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
									<li><a href="index.php">Accueil</a></li>
									<li><a href="cPresentation.php">Présentation</a></li>
									<li><a href="cAgenda.php">Agenda</a></li>
									<li><a href="#">Galerie Photos</a></li>
									<li><a href="#">Exprimez vous !</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="toor/index.php">Administration</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3">
						<div class="row">
							<?php
								if (file_exists($menuCote)) {
									echo '<div class="col-lg-12 col-md-12 col-sm-12">';
										include($menuCote);
									echo '</div>';
								}
							?>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php include('includes/formulaireConnexion.php'); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-6 col-sm-6">