<?php
require_once '../functions.php';
$repoPartida = new Json_partida(realpath(__DIR__ . "/../partidas.json"));

$respuesta = $_GET["respuesta"];

echo Partida::responder($respuesta);

 ?>
