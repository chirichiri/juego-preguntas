<?php

require_once 'header.php';
$usuarios = $repoUser->traerTop(5);

?>

<div class="lb profile square flex-row-center">
	<h1 class="flex-row-center">
		<div class="lb-user-tit">Usuario</div>
		<div class="lb-puntos-tit">Puntaje</div>
	</h1>
	<ul>
		<?php
		foreach ($usuarios as $key => $value) {
			echo '<li class="flex-row-center">
					<div class="lb-user">'. $usuarios[$key]["user"] . '</div>
					<div class="lb-puntos">' . $usuarios[$key]["puntos"] . "</div>
				</li>";
		} ?>
	</ul>
	<a href="index.php">Volver</a>
</div>

<?php require_once 'footer.php'; ?>
