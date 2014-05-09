<?php
	if ($action == 'album') {
		if ($album->getManifestation() == null) {
			$lien = 'href="cPresentation.php"';
		}else{
			$lien = 'href="cPresentation.php?action=association&id='.$album->getManifestation()->getAssociation()->getId().'"';
?>
<div class="list-group">
	<a <?php echo 'href="cAgenda.php?action=detailManifestation&id='.$album->getManifestation()->getId().'"'; ?> class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $album->getManifestation()->getNom(); ?></h4>
		<p class="list-group-item-text">Manifestation</p>
	</a>
	<a <?php echo $lien; ?> class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $album->getManifestation()->getAssociation()->getNom(); ?></h4>
		<p class="list-group-item-text">Association</p>
	</a>
</div>
<?php
		}
	}
?>