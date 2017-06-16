<?php
class Json_categoria extends Json {
	public function crearCategoria(Categoria $categoria) {
		$categoriaArray = [
			"id"	=>	$this->generarID(),
			"nombre"	=>	$categoria->getNombre(),
			"preguntas"	=>	$categoria->getPreguntas()
		];

		file_put_contents($this->getArchivo(), json_encode($categoriaArray) . PHP_EOL, FILE_APPEND);
	}

	public function responderPartida($id, $respuesta) {
		$this->modificarEspecifico($id, "elegido", $respuesta);
	}

	public function getCategorias() {
		$array = $this->todosDatos();

		$categorias = [];

		foreach ($array as $key => $value) {
			$categorias[$array[$key]["id"]] = $array[$key]["nombre"];
		}

		return $categorias;
	}

	public function agregarPregunta($idCat, $idPreg) {
		$categoria = $this->buscarEspecifico("id", $idCat);
		array_push($categoria["preguntas"], $idPreg);
		$this->modificarEspecifico($idCat, "preguntas", $categoria["preguntas"]);
	}

	public function traerPreguntas($id) {
		$categoria = $this->buscarEspecifico("id", $idCat);
		$preguntas = $categoria["preguntas"];
		
		return $preguntas;
	}

}
 ?>
