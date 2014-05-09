<?php include("includes/header.php"); ?>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1>Équipe pédagogique</h1>
			<p>Cette page gère le contenu de la page de gestion des membres de l'équipe pédagogique de l'école de musique.</p>
			<hr>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#ajout" data-toggle="tab">Ajout</a></li>
				<li><a href="#modification" data-toggle="tab">Modification</a></li>
				<li><a href="#suppression" data-toggle="tab">Suppression</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="ajout">
					<p>
						Vous pouvez ajouter des membres de l'équipe pédagogique via le bouton "Ajouter un membre"
					</p>
				</div>
				<div class="tab-pane" id="modification">
					<p>
						Vous pouez modifier un membre en cliquant sur son nom dans la liste.
					</p>	
				</div>
				<div class="tab-pane" id="suppression">
					<p>
						Vous pouvez supprimer un membre en cliquant sur le bouton supprimer. Attention, la suppression est définitive.
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
			<hr>
			<h2>Équipe pédagogique <button type="btn" class="btn btn-primary pull-right"><a href="cGestionEquipePedagogique.php?action=ajouterMembre">Ajouter un membre</a></button></h2>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Nom</th>
						<th>Rôle</th>
						<th>Indice</th>
						<th>Supprimer</th>
					</tr>
					<?php
						foreach ($membresEquipe as $membre) {
							echo '<tr>';
								echo '<td><a href="cGestionEquipePedagogique.php?action=modifier&id='.$membre->getId().'">'.$membre->getNom().' '.$membre->getPrenom().'</a></td>';
								echo '<td>'.$membre->getRole().'</td>';
								echo '<td>'.$membre->getIndice().'</td>';
								echo '<td><button type="button" class="btn btn-danger"><a href="cGestionEquipePedagogique.php?action=supprimer&id='.$membre->getId().'">Supprimer</a></button></td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>

</div>
<?php include("includes/footer.php"); ?>