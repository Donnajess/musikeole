<div class="list-group">
	<a href="cPresentation.php" class="list-group-item">Musik'Eole</a>
	<a href="cPresentation.php?action=membresBureau" class="list-group-item">Membres du bureau</a>
	<a href="cPresentation.php?action=ecoleDeMusique" class="list-group-item">École de musique</a>
	<a href="cPresentation.php?action=equipePedagogique" class="list-group-item">Équipe pédagogique & Cie</a>
	<?php
		foreach ($associations as $asso) {
			echo '<a href="cPresentation.php?action=association&id='.$asso->getId().'" class="list-group-item">'.$asso->getNom().'</a>';
		}
	?>
	<a href="cPresentation.php?action=reglements" class="list-group-item">Règlements</a>
</div>