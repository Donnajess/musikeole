<?php
	if ($action == 'album') {
?>
<div class="list-group">
	<a <?php echo 'href="cAgenda.php?action=detailManifestation&id='.$album->getManifestation()->getId().'"'; ?> class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $album->getManifestation()->getNom(); ?></h4>
		<p class="list-group-item-text">Manifestation</p>
	</a>
	<a <?php echo 'href="cPresentation.php?action=association&id='.$album->getManifestation()->getAssociation()->getId().'"'; ?> class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $album->getManifestation()->getAssociation()->getNom(); ?></h4>
		<p class="list-group-item-text">Association</p>
	</a>
</div>
<?php
}
?>