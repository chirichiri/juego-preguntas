<?php
require_once('functions.php');
// debug();

$actual = basename($_SERVER['PHP_SELF']);

if ($actual === "test.php" || $actual === "jugar.php") {
	$repoPartida = new Json_partida(realpath(__DIR__ . "/partidas.json"));
	$partida = new Partida();
	$repoPartida->crearPartida($partida);
	echo '<script type="text/javascript" src="js/partida.js"></script>';
}

if ($_POST && isset($_POST["login"])) {
    if (Sesion::logueo($_POST["user"], $_POST["pass"]) == 1) {
        Sesion::genSesion();
        redirect("index.php");
    }
} elseif ($_POST && isset($_POST["register"])) {
    $repoUser->crearUser(new User($_POST["user"], $_POST["mail"], $_POST["pass"]));
    redirect("index.php");
} elseif ($_POST && isset($_POST["logout"])) {
    Sesion::logout();
} elseif ($_POST && isset($_POST["avatar"])) {
    if (($avatar = $repoUser->cambiarAvatar("imagen")) !== 0) {
        echo $avatar;
    }
} elseif ($_POST && isset($_POST["cargarPregunta"])) {
	$pregunta = new Pregunta($_POST);
    $repoPregunta->cargarPregunta($pregunta);
}


$titulos = [
"index.php" =>  "A jugar con jugo",
"profile.php"   =>  "Perfil",
"avatar.php"    =>  "Modificar Avatar",
"jugar.php" =>  "Preguntando con jugo",
"cargarpregunta.php"    =>  "Cargar pregunta nueva",
"user.php"  =>  "No deberías estar acá",
"test.php"	=>	"testeando cosas"
];

$titulo = $titulos[$actual];

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$titulo?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div id="container">
        <header>
            <div id="logo">
                <a href="index.php"><p>LOGO</p></a>
            </div>
        </header>
<section id="main">
    <?php if ($logueado === 1) {
        require_once('include/user.php');
    } ?>
