<?php

class Json_partida extends Json {
	public function crearPartida(Partida $partida) {
		$partidaArray = [
			"id"	=>	$this->generarID(),
			"idUser"	=>	$partida->getIdUser(),
			"pregunta"	=>	$partida->getPregunta(),
			"respCorrecta"	=>	$partida->getRespCorrecta(),
			"respuesta1"	=>	$partida->getRespuesta1(),
			"respuesta2"	=>	$partida->getRespuesta2(),
			"respuesta3"	=>	$partida->getRespuesta3(),
			"respuesta4"	=>	$partida->getRespuesta4(),
			"elegido"	=>	$partida->getElegido()
		];

		file_put_contents($this->getArchivo(), json_encode($partidaArray) . PHP_EOL, FILE_APPEND);
	}

	public function responderPartida($id, $respuesta) {
		$this->modificarEspecifico($id, "elegido", $respuesta);
	}
}


 ?>
