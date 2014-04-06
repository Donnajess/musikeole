<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Espace membre</h3>
	</div>
	<div class="panel-body">
		<form <?php echo 'action ="'.$_SERVER['REQUEST_URI'].'"'; ?> method="POST" role="form">
			<div class="form-group">
				<label for="pseudo" class="control-label">Identifiant</label>
				<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Identifiant" required>
			</div>
			<div class="form-group">
				<label for="mdp" class="control-label">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" class="form-control" placeholder="Mot de passe" required>
			</div>
			<button type="submit" class="btn btn-primary" name="connexion" id="validerSondage" value="validerSondage" >Valider</button>
		</form>
		<hr>
		<a href="vues/gestionMembres/inscriptionMembre.php">Devenir membre</a>
	</div>
</div>