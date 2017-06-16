<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {
    require_once ('include/user.php');

	if (isset($_POST["categoria"])) {
		$respuestas = $partida->getRespuestas();
	    $id = 1; ?>

	    <div id="preg" class="square flex-row-center">
	        <p><?=$partida->getPregunta();?></p>
	    </div>

	    <?php
		foreach ($respuestas as $key => $value){
	        if ($key !== "preg" && $key !== "id") {?>
	        <div id="resp<?=$id?>"  class="square flex-row-center">
	            <p><?=$respuestas[$key]?></p>
	        </div>

	<?php $id++;
			}
		}
	} else { ?>

		<div id="preg" class="square flex-row-center">
			<p>Elegí la categoría:</p>
		</div>
		<form method="POST" action="jugar.php" id="categorias">
		<input type="hidden" name="categoria" value="">
		<button class="categoria square flex-row-center" name="0">
			Cualquiera
		</button>
		<?php
		$cat = $repoCategoria->getCategorias();
		foreach ($cat as $key => $value) { ?>
			<button class="categoria square flex-row-center" name="<?=$key?>">
	            <?=$cat[$key]?>
	        </button>
			<?php
		}
		echo "</form>";
	}

}
 require_once('footer.php'); ?>
