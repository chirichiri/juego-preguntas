<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) { ?>
    <div class="profile square flex-row-center">
    <h1>Cargar Pregunta</h1>
    <form id="cambiarDatos" class="flex-row-center" action="<?=$actual?>" method="post" enctype="multipart/form-data">
        <div class="campo">
            <input type="text" name="preg" placeholder="Pregunta">
        </div>
        <div class="campo">
            <input type="text" name="resp1" placeholder="Respuesta Correcta">
        </div>
        <div class="campo">
            <input type="text" name="resp2" placeholder="Respuesta 2">
        </div>
        <div class="campo">
            <input type="text" name="resp3" placeholder="Respuesta 3">
        </div>
        <div class="campo">
            <input type="text" name="resp4" placeholder="Respuesta 4">
        </div>
        <div class="campo">
            <button type="submit" name="cargarPregunta">Cargar Pregunta</button>
        </div>
    </form>
    </div>

    <?php }
 include_once('footer.php'); ?>
