<?php
class Json_user extends Json {

	public function crearUser(User $user) {
	    $user = [
	        "id"    =>  $this->generarID("user"),
	        "user"  =>  $user->getUser(),
	        "mail"  =>  $user->getMail(),
	        "pass"  =>  password_hash($user->getPass(), PASSWORD_DEFAULT),
			"puntos"	=>	0
	    ];

	    file_put_contents($this->getArchivo(), json_encode($user) . PHP_EOL, FILE_APPEND);
	}

	public function buscarUser($campo, $valor) {
	    $archivo = fopen($this->getArchivo(), "r");

	    if ($archivo) {
	        while (($linea = fgets($archivo)) !== FALSE) {
	            $user = json_decode($linea, TRUE);

	            if ($user[$campo] == $valor) {
	                fclose($archivo);
	                return $user;
	            }
	        }
	        fclose($archivo);
	        return 0;
	    }
	}
}


 ?>
