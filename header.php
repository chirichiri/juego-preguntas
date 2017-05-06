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
    cambiarAvatar("imagen");
}

$logueado = mantenerLogin();
$titulos = [
"index.php" =>  "A jugar con jugo",
"profile.php"   =>  "Perfil"
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
                <p>LOGO</p>
            </div>
        </header>
<section id="main">
