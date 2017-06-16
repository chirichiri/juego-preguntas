<?php
require_once 'json.php';

class Json_pregunta extends Json {

	public function cargarPregunta(Pregunta $pregunta) {
		global $repoCategoria;
	    $preguntaFinal = [
	        "id"    =>  $this->generarID(),
	        "preg"  =>  $pregunta->getPregunta(),
	        "resp1" =>  $pregunta->getRespuesta1(),
	        "resp2" =>  $pregunta->getRespuesta2(),
	        "resp3" =>  $pregunta->getRespuesta3(),
	        "resp4" =>  $pregunta->getRespuesta4()
	    ];

		$repoCategoria->agregarPregunta($pregunta->getCategoria(), $preguntaFinal["id"]);

	    file_put_contents($this->getArchivo(), json_encode($preguntaFinal) . PHP_EOL, FILE_APPEND);
	}

	public function buscarPregunta($cat = 0) {
	    $archivo = fopen($this->getArchivo(), "r");
		if ($cat !== 0) {
			$rand = rand($cat[0], $cat[count($cat)-1]);
		} else {
			$rand = rand(1, $this->contarPreguntas());
		}

	    if ($archivo) {
	        while (($linea = fgets($archivo)) !== FALSE) {
	            $pregunta = json_decode($linea, TRUE);

	            if ($pregunta["id"] == $rand) {
	                fclose($archivo);
	                return new Pregunta($pregunta);
	            }
	        }
	    }
	}

	public function contarPreguntas() {
	    $max = 0;
	    $archivo = fopen($this->getArchivo(), "r");

	    if ($archivo) {
	        while (($linea = fgets($archivo)) !== FALSE) {
	            $max++;
	        }
	        return $max;
	    }
	}
}


 ?>
