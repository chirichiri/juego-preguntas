<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {
    require_once ('include/user.php');
    $respuestas = $partida->getRespuestas();
    $id = 1; ?>

    <div id="preg" class="square flex-row-center">
        <p><?=$partida->getPregunta();?></p>
    </div>

    <?php
	foreach ($respuestas as $key => $value){
        if ($key !== "preg" && $key !== "id") {?>
        <div id="resp<?=$id?>"  class="square flex-row-center">
            <a href="jugar.php?preg=<?=$respuestas["id"]?>&resp=<?=$id?>"><?=$respuestas[$key]?></a>
        </div>

<?php $id++;
		}
	}
}
 require_once('footer.php'); ?>
