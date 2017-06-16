<?php
require_once 'json_pregunta.php';
require_once 'json_user.php';
require_once 'json_partida.php';
require_once 'json_categoria.php';

abstract class Json extends Repositorio {

	private $archivo;

	public function __construct($archivo) {
		$this->setArchivo($archivo);
		return $this;
	}

	public function generarID() {
		$id = count($this->todosDatos());

		if ($id != 0) {
			return $id+1;
		} else {
			return 1;
		}
	}

	public function modificarEspecifico($id, $dato, $nuevoValor){
		$array = $this->todosDatos();                   /* CARGA TODOS LOS USUARIOS A UN ARRAY */
		unlink($this->getArchivo());                        /* BORRA EL ARCHIVO DE USUARIOS VIEJO */

		foreach ($array as $key => $value) {
			if ($array[$key]["id"] == $id) {
				if ($dato == "pass") {
					$array[$key][$dato] = password_hash($nuevoValor, PASSWORD_DEFAULT);
				}else {
					$array[$key][$dato] = $nuevoValor;     /* DETECTA Y CAMBIA EL CAMPO A MODIFICAR */

				}
			}
			file_put_contents($this->getArchivo(), json_encode($array[$key]) . PHP_EOL, FILE_APPEND);       /* GUARDA TODOS LOS USERS */
		}
	}

	public function todosDatos() {
		$array = explode(PHP_EOL, file_get_contents($this->getArchivo()));

		foreach ($array as $key => $value) {
			$arrayTerminado[] = json_decode($value, true);
		}

		array_pop($arrayTerminado);
		return $arrayTerminado;
	}

	public function buscarEspecifico($campo, $valor) {
	    $archivo = fopen($this->getArchivo(), "r");

	    if ($archivo) {
	        while (($linea = fgets($archivo)) !== FALSE) {
	            $final = json_decode($linea, TRUE);

	            if ($final[$campo] == $valor) {
	                fclose($archivo);
	                return $final;
	            }
	        }
	        fclose($archivo);
	        return 0;
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
