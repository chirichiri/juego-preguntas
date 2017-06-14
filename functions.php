<?php
require_once 'include/clases/user.php';
require_once 'include/clases/repositorio.php';
require_once 'include/clases/sesion.php';
require_once 'include/clases/partida.php';

session_start();
// Sesion::logout();

$logueado = Sesion::mantenerLogin();

$repoUser = new Json_user(realpath(__DIR__ . "/usuarios.json"));

$repoPregunta = new Json_pregunta(realpath(__DIR__ . "/preguntas.json"));



function redirect($url, $permanent = false) {
    header("Location:" .$url, true, $permanent? 301 : 302);
    exit;
}

function debug() {
    if (isset($_SESSION["id"])) {
        echo "Sesión: ";
        var_dump($_SESSION);
        echo "<br>";
    }

    if (isset($_COOKIE["user"])) {
        echo "Cookie: ";
        var_dump($_COOKIE);
    }

}
?>
