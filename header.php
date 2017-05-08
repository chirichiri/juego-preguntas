<?php
require_once('functions.php');
//debug();

$actual = basename($_SERVER['PHP_SELF']);


if ($_POST && isset($_POST["login"])) {
    if (logueo($_POST["user"], $_POST["pass"]) == 1) {
        genSesion();
        redirect($actual);
    }
} elseif ($_POST && isset($_POST["register"])) {
    crearUser();
    redirect("index.php");
} elseif ($_POST && isset($_POST["logout"])) {
    logout();
} elseif ($_POST && isset($_POST["avatar"])) {
    if (($avatar = cambiarAvatar("imagen")) !== 0) {
        echo $avatar;
    }
} elseif ($_POST && isset($_POST["cargarPregunta"])) {
    cargarPregunta();
}


$titulos = [
"index.php" =>  "A jugar con jugo",
"profile.php"   =>  "Perfil",
"avatar.php"    =>  "Modificar Avatar",
"jugar.php" =>  "Preguntando con jugo",
"cargarpregunta.php"    =>  "Cargar pregunta nueva",
"user.php"  =>  "No deberías estar acá"
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
