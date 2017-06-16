<?php

require_once 'pregunta.php';

class Partida {
	private $id;
	private $idUser;
	private $pregunta;
	private $respCorrecta;
	private $respuesta1;
	private $respuesta2;
	private $respuesta3;
	private $respuesta4;
	private $elegido;

	public function __construct($cat = 0) {
		global $repoPregunta;
		global $repoPartida;

		if ($cat === 0) {
			$pregunta = $repoPregunta->buscarPregunta($cat);
		} else {
			$pregunta = $repoPregunta->buscarPregunta();
		}

		$this->setId($repoPartida->generarID());
		$this->setIdUser($_SESSION["id"]);
		$this->setPregunta($pregunta->getPregunta());
		$this->setRespCorrecta($pregunta->getRespuesta1());
		$this->setRespuesta1($pregunta->getRespuesta1());
		$this->setRespuesta2($pregunta->getRespuesta2());
		$this->setRespuesta3($pregunta->getRespuesta3());
		$this->setRespuesta4($pregunta->getRespuesta4());

		$_SESSION["partida"] = $this->getId();

		$this->mezclarRespuestas();

		return $this;
	}

	public function mezclarRespuestas() {

		$resp[0] = $this->getRespuesta1();
		$resp[1] = $this->getRespuesta2();
		$resp[2] = $this->getRespuesta3();
		$resp[3] = $this->getRespuesta4();

		$keys = array_keys($resp);
		shuffle($keys);
		$random = array();
		$i = 0;

		foreach ($keys as $key) {
			$random[$i] = $resp[$key];
			$i++;
		}

		$this->setRespuesta1($random[0]);
		$this->setRespuesta2($random[1]);
		$this->setRespuesta3($random[2]);
		$this->setRespuesta4($random[3]);

		return $this;

	}

	public static function responder($respuesta) {
		global $repoUser;
		global $repoPartida;
		$correcto = 0;

		$partida = $repoPartida->buscarEspecifico("id", $_SESSION["partida"]);

		if ($respuesta === $partida["respCorrecta"]) {
			$correcto = 1;
		}

		$puntos = $repoUser->buscarEspecifico("id", $_SESSION["id"]);

		if ($correcto === 1) {
			$puntos = $puntos["puntos"] + 10;
		} elseif ($correcto !== 1) {
			$puntos = $puntos["puntos"] - 5;
			if ($puntos < 0) {
				$puntos = 0;
			}
		}
		$_SESSION["puntos"] = $puntos;
		$repoUser->modificarEspecifico($_SESSION["id"], "puntos", $puntos);
		$repoPartida->responderPartida($partida["id"], $respuesta);

		return $correcto;
	}

	public function getRespuestas() {
		$array = [
			$this->getRespuesta1(),
			$this->getRespuesta2(),
			$this->getRespuesta3(),
			$this->getRespuesta4(),
		];

		return $array;
	}


	public function getId() {
	      return $this->id;
	}

	public function setId($id) {
	    $this->id = $id;

	    return $this;
	}

	public function getIdUser() {
	      return $this->idUser;
	}

	public function setIdUser($idUser) {
	    $this->idUser = $idUser;

	    return $this;
	}

	public function getPregunta() {
	      return $this->pregunta;
	}

	public function setPregunta($pregunta) {
	    $this->pregunta = $pregunta;

	    return $this;
	}

	public function getRespCorrecta() {
	      return $this->respCorrecta;
	}

	public function setRespCorrecta($respCorrecta) {
	    $this->respCorrecta = $respCorrecta;

	    return $this;
	}

	public function getRespuesta1() {
	      return $this->respuesta1;
	}

	public function setRespuesta1($respuesta1) {
	    $this->respuesta1 = $respuesta1;

	    return $this;
	}

	public function getRespuesta2() {
	      return $this->respuesta2;
	}

	public function setRespuesta2($respuesta2) {
	    $this->respuesta2 = $respuesta2;

	    return $this;
	}

	public function getRespuesta3() {
	      return $this->respuesta3;
	}

	public function setRespuesta3($respuesta3) {
	    $this->respuesta3 = $respuesta3;

	    return $this;
	}

	public function getRespuesta4() {
	      return $this->respuesta4;
	}

	public function setRespuesta4($respuesta4) {
	    $this->respuesta4 = $respuesta4;

	    return $this;
	}


	public function getElegido() {
	      return $this->elegido;
	}

	public function setElegido($elegido) {
	    $this->elegido = $elegido;

	    return $this;
	}
}


 ?>
