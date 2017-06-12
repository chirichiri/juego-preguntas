<?php

class Pregunta {
	private $id;
	private $pregunta;
	private $respuesta_1;
	private $respuesta_2;
	private $respuesta_3;
	private $respuesta_4;

	public function __construct ($pregunta) {
		$this->setId($pregunta["id"]);
		$this->setPregunta($pregunta["preg"]);
		$this->setRespuesta1($pregunta["resp1"]);
		$this->setRespuesta2($pregunta["resp2"]);
		$this->setRespuesta3($pregunta["resp3"]);
		$this->setRespuesta4($pregunta["resp4"]);

		return $this;
	}

	public function mezclarRespuestas() {

		 $resp[0] = $this->getRespuesta1();
		 $resp[1] = $this->getRespuesta2();
		 $resp[2] = $this->getRespuesta3();
		 $resp[3] = $this->getRespuesta4();

		if (!is_array($resp)) return $resp;

		$keys = array_keys($resp);
		shuffle($keys);
		$random = array();
		foreach ($keys as $key) {
			$random[$key] = $resp[$key];
		}
		$random["id"] = $this->getId();
		$random["preg"] = $this->getPregunta();
		return $random;
	}

	/**
	* Get value of Pregunta
	* @return mixed
	*/
	public function getPregunta() {
		return $this->pregunta;
	}

	/**
	* Set value of Pregunta
	* @param mixed pregunta
	* @return self
	*/
	public function setPregunta($pregunta) {
		$this->pregunta = $pregunta;

		return $this;
	}

	/**
	* Get value of Respuesta 1
	* @return mixed
	*/
	public function getRespuesta1() {
		return $this->respuesta_1;
	}

	/**
	* Set value of Respuesta 1
	* @param mixed respuesta_1
	* @return self
	*/
	public function setRespuesta1($respuesta_1) {
		$this->respuesta_1 = $respuesta_1;

		return $this;
	}

	/**
	* Get value of Respuesta 2
	* @return mixed
	*/
	public function getRespuesta2() {
		return $this->respuesta_2;
	}

	/**
	* Set value of Respuesta 2
	* @param mixed respuesta_2
	* @return self
	*/
	public function setRespuesta2($respuesta_2) {
		$this->respuesta_2 = $respuesta_2;

		return $this;
	}

	/**
	* Get value of Respuesta 3
	* @return mixed
	*/
	public function getRespuesta3() {
		return $this->respuesta_3;
	}

	/**
	* Set value of Respuesta 3
	* @param mixed respuesta_3
	* @return self
	*/
	public function setRespuesta3($respuesta_3) {
		$this->respuesta_3 = $respuesta_3;

		return $this;
	}

	/**
	* Get value of Respuesta 4
	* @return mixed
	*/
	public function getRespuesta4() {
		return $this->respuesta_4;
	}

	/**
	* Set value of Respuesta 4
	* @param mixed respuesta_4
	* @return self
	*/
	public function setRespuesta4($respuesta_4) {
		$this->respuesta_4 = $respuesta_4;

		return $this;
	}


	/**
	* Get value of Id
	* @return mixed
	*/
	public function getId() {
	      return $this->id;
	}

	/**
	* Set value of Id
	* @param mixed id
	* @return self
	*/
	public function setId($id) {
	    $this->id = $id;

	    return $this;
	}
          }
//
// $preg = [
// 	"preg"	=>	"quien?",
// 	"resp1"	=>	"yo",
// 	"resp2"	=>	"el",
// 	"resp3"	=>	"nadie",
// 	"resp4"	=>	"ellos"
// ];
//
// $pregunta = new pregunta($preg);
// var_dump($pregunta->mezclarRespuestas());

?>
