<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {

require_once 'include/clases/categoria.php';

$repoCategoria = new Json_categoria(realpath(__DIR__ . "/categorias.json"));
// $repoCategoria->crearCategoria(new categoria(1, "jorge", ["montoto", "jorge"]));

// var_dump($repoCategoria->getCategorias());

$repoCategoria->agregarPregunta(1);

}
 require_once('footer.php'); ?>
