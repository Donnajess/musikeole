<?php
if (isset($_SESSION['idAutorisation']) && $_SESSION['idAutorisation'] > 2) {
	include("includes/header.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Administration</h1>
			</div>
		</div>
	</div>
<?php
	include("includes/footer.php");
}else{
	header('Location: ../index.php');
	exit();
}
?>
