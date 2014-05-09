<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Liste des adhérents</h1>
			<p>Cette page vous liste les adhérents.</p>
			<hr>
					<p>
						Cliquez sur le bouton supprimer si vous désirez supprimer définitivement un adhérent.
					</p>
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
				if (isset($message_supp)) {
					echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>'.$message_supp.'</p>
					</div>';
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Date Naissance</th>
						<th>Telephone</th>
						<th>Mail</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($listeAdherents as $adherents) {
							echo '<tr>
								<td>'.$adherents->getNom().'</td>
								<td>'.$adherents->getPrenom().'</td>
								<td>'.$adherents->getDateNaissance().'</td>
								<td>'.$adherents->getTelephone().'</td>
								<td>'.$adherents->getMail().'</td>
								<td><button type="button" class="btn btn-danger"><a href="cGestionMembres.php?action=supprimerAdherent&id='.$adherents->getId().'">Supprimer</a></button></td>
							</tr>';
						}
					?>
				</table>
			</div>
		</div>	
	</div>
</div>
<?php include("includes/footer.php"); ?>