<?php include("includes/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Liste des demandes d'adhésion</h1>
			<p>Cette page permet de gérer les demandes d'adhésion à l'assocation.</p>
			<hr>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#accepter" data-toggle="tab">Accepter</a></li>
				<li><a href="#supprimer" data-toggle="tab">Supprimer</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane" id="supprimer">
					<p>
						Cliquez sur le bouton supprimer pour supprimer définitivement une demande d'adhésion.
					</p>
				</div>
				<div class="tab-pane active" id="accepter">
					<p>
						Cliquez sur le bouton accepter afin d'offrir la possibilité à la personne de se connecter au site (Après avoir réglé la cotisation).
					</p>
				</div>
			</div>
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
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Date Naissance</th>
						<th>Telephone</th>
						<th>Mail</th>
						<th>Accepter</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($listeDemandes as $demandes) {
							echo '<tr>
								<td>'.$demandes->getNom().'</td>
								<td>'.$demandes->getPrenom().'</td>
								<td>'.$demandes->getDateNaissance().'</td>
								<td>'.$demandes->getTelephone().'</td>
								<td>'.$demandes->getMail().'</td>
								<td><button type="button" class="btn btn-success"><a href="cGestionMembres.php?action=accepter&id='.$demandes->getId().'">Accepter</a></button></td>
								<td><button type="button" class="btn btn-danger"><a href="cGestionMembres.php?action=supprimerDemande&id='.$demandes->getId().'">Rejeter</a></button></td>
							</tr>';
						}
					?>
				</table>
			</div>
		</div>	
	</div>
</div>
<?php include("includes/footer.php"); ?>