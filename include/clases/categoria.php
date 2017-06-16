<?php

class Categoria {
	private $id;
	private $nombre;
	private $preguntas;

	public function __construct(int $id, string $nombre, array $preguntas) {
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setPreguntas($preguntas);
	}

	public function getId() {
	      return $this->id;
	}

	public function setId($id) {
	    $this->id = $id;

	    return $this;
	}

	public function getNombre() {
	      return $this->nombre;
	}

	public function setNombre($nombre) {
	    $this->nombre = $nombre;

	    return $this;
	}

	public function getPreguntas() {
	      return $this->preguntas;
	}

	public function setPreguntas($preguntas) {
	    $this->preguntas = $preguntas;

	    return $this;
	}
}


 ?>
