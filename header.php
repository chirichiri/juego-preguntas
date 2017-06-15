<?php
require_once('functions.php');
// debug();

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
"test.php"	=>	"testeando cosas",
"leaderboard.php"	=>	"Tabla de posiciones"
];

if (isset($titulo[$actual])) {
	$titulo = $titulos[$actual];
} else {
	$titulo = "Título pendiente";
}

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
		<?php if ($logueado === 1) {
	        require_once('include/user.php');
	    } ?>
<section id="main">
