<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {


	echo $partida->getPregunta();
	echo "<br>";
	echo $partida->getRespCorrecta();
	echo "<br>";
	echo $partida->getRespuesta1();
	echo "<br>";
	echo $partida->getRespuesta2();
	echo "<br>";
	echo $partida->getRespuesta3();
	echo "<br>";
	echo $partida->getRespuesta4();
	echo "<br>";
	echo $partida->getIdUser();
	$partida->responder(2);

}
 require_once('footer.php'); ?>
