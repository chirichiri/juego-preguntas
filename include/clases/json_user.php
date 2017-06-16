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

	public function traerTop($cantidad) {
		$array = $this->todosDatos();

		usort($array, function($a, $b) {
			if ($a["puntos"] == $b["puntos"]) return 0;
			return ($a["puntos"] < $b["puntos"]) ? 1 : -1;
		});

		$array = array_slice($array, 0, $cantidad);

		return $array;
	}
}


 ?>
