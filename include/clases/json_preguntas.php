<?php
require_once 'json.php';

class Json_preguntas extends Json {

	public function cargarPregunta(Pregunta $pregunta) {
	    $preguntaFinal = [
	        "id"    =>  $this->generarID(),
	        "preg"  =>  $pregunta->pregunta,
	        "resp1" =>  $pregunta->respuesta_1,
	        "resp2" =>  $pregunta->respuesta_2,
	        "resp3" =>  $pregunta->respuesta_3,
	        "resp4" =>  $pregunta->respuesta_4
	    ];

	    file_put_contents("preguntas.json", json_encode($pregunta) . PHP_EOL, FILE_APPEND);
	}

	public function todosPreguntas() {
	    $array = explode(PHP_EOL, file_get_contents($this->getArchivo()));

	    foreach ($array as $key => $value) {
	        $arrayTerminado[] = json_decode($value, true);
	    }

	    array_pop($arrayTerminado);
	    return $arrayTerminado;
	}

	public function buscarPregunta() {
	    $archivo = fopen($this->getArchivo(), "r");
	    $rand = rand(1, $this->contarPreguntas());

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

	public function solucion() {

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
