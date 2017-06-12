<?php
require_once 'json_preguntas.php';
require_once 'json_user.php';

class Json extends Repositorio {

	private $archivo;

	public function __construct($archivo) {
		$this->setArchivo($archivo);
		return $this;
	}

	public function generarID($tipo) {
		$archivo = $this->getArchivo();
	    if ($archivo == "user") {
	        $id = count($this->todosUser());
	    }elseif ($archivo == "preguntas") {
	        $id = count($this->todosPreguntas());
	    }

	    if ($id != 0) {
	        return $id+1;
	    } else {
	        return 1;
	    }
	}

	public function setArchivo($archivo) {
		$this->archivo = $archivo;
		return $this;
	}

	public function getArchivo() {
		return $this->archivo;
	}
}

 ?>
