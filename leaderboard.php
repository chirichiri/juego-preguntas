<?php

require_once 'header.php';
$usuarios = $repoUser->traerTop(5);

?>

<div class="lb square flex-row-center">
	<ul>
		<li class="flex-row-center">
			<div class="lb-user">Usuario</div>
			<div class="lb-puntos">Puntaje</div>
		</li>
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
