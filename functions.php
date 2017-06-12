<?php
include 'include/clases/user.php';
include 'include/clases/pregunta.php';
include 'include/clases/repositorio.php';
include 'include/clases/sesion.php';

session_start();
// Sesion::logout();

$logueado = Sesion::mantenerLogin();

$repositorio = new Json_user(realpath(__DIR__ . "/usuarios.json"));
$repoPreguntas = new Json_preguntas(realpath(__DIR__ . "/preguntas.json"));


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
