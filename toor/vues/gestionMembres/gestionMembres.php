<!doctype html>
<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">

		<title>Administration - Musik'Eole</title>

		<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../assets/css/style.css">
		<link rel="stylesheet" href="../../../assets/js/datepicker/css/datepicker.css">
		<script type="text/javascript" src="../../../assets/js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../../assets/js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container">
	<div class="row">
		<div class="dol-md-12">
			<h1>Liste des membres</h1>
			<p>Cette page est la page principale d'administration des membres. Plusieurs actions sont disponibles :</p>

			<ul class="nav nav-tabs">
				<li class="active"><a href="#gererMembres" data-toggle="tab">Gérer les membres</a></li>
				<li><a href="#mailCollectif" data-toggle="tab">Envoyer un mail collectif</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="gererMembres">
					<p>
						Ici sera listés tous les membres étant inscrits sur le site. Il sera possible de supprimer un membre, ou de le contacter.
					</p>
					<table class="table table-striped">
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Détails</th>
							<th>Contacter</th>
							<th>Supprimer</th>
						</tr>
						<tr>
							<td>Nom</td>
							<td>Prénom</td>
							<td><button type="submit" class="btn btn-info">Détails</button></td>
							<td><button type="submit" class="btn btn-success">Contacter</button></td>
							<td><button type="submit" class="btn btn-danger">Supprimer</button></td>	
						</tr>

					</table>
				</div>
				<div class="tab-pane" id="mailCollectif">
					<p>
						Cet onglet vous permet d'envoyer un mail à tous les membres de l'association qui sont inscrits sur le site.
					</p>	
					<form role="form" action="" method="POST">
						<div class="form-group">
					    	<input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du message">
						</div>
						<div class="form-group">
					    	<textarea class="form-control" rows="12" placeholder="Votre message" id="message"></textarea>
						</div>
						<div class="form-group">
					    	<label for="fichier">Ajouter un fichier</label>
					    	<input type="file" id="fichier" name="fichier">
						</div>
						<div class="checkbox">
						    <label>
						    	<input type="checkbox" name="checkbox"> Confirmer l'envoi
						    </label>
						</div>
						<button type="submit" class="btn btn-default">Envoyer</button>
					</form>	
				</div>
			</div>
		</div>
	</div>

</body>
</html>