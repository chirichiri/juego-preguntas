<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {
    require_once ('include/user.php');
    $pregunta = $repoPreguntas->buscarPregunta()->mezclarRespuestas();
    $id = 1; ?>

    <div id="preg" class="square flex-row-center">
        <p><?=$pregunta["preg"]?></p>
    </div>

    <?php
	foreach ($pregunta as $key => $value){
        if ($key !== "preg" && $key !== "id") {?>
        <div id="resp<?=$id?>"  class="square flex-row-center">
            <a href="jugar.php?preg=<?=$pregunta["id"]?>&resp=<?=$id?>"><?=$pregunta[$key]?></a>
        </div>

<?php $id++;
		}
	}
}
 include_once('footer.php'); ?>
