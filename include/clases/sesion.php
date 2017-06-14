<?php
class Sesion {

	public static function logout() {
	    $time = time()-100000;
	    setcookie("user", "", $time);
	    setcookie("sesion", "", $time);
	    setcookie("PHPSESSID", "", $time);
	    session_destroy();
	    unset($_SESSION);

	    redirect("index.php");
	}

	public static function genSesion() {
		global $repoUser;
	    $sesion = $repoUser->buscarUser("user", $_POST["user"]);
	    $time = time()+36000;

	    setcookie("user", $sesion["user"], $time);
	    setcookie("sesion",hash('sha256', $sesion["id"]), $time);
	    $_SESSION["id"] = $sesion["id"];
	    $_SESSION["user"] = $sesion["user"];
	    $_SESSION["pass"] = $sesion["pass"];
		$_SESSION["puntos"] = $sesion["puntos"];
		$_SESSION["mail"] = $sesion["mail"];

	    return 1;
	}

	public static function mantenerLogin() {
		global $repoUser;
	    if (isset($_COOKIE) && !isset($_SESSION)) {
	        $sesion = $repoUser->buscarUser("user", $_COOKIE["user"]);
	        if ($_COOKIE["user"] == $sesion["user"] && $_COOKIE["sesion"] == hash('sha256', $sesion["id"])){
	            $_SESSION["id"] = $sesion["id"];
	            $_SESSION["user"] = $sesion["user"];
	            $_SESSION["pass"] = $sesion["pass"];
				$_SESSION["puntos"] = $sesion["puntos"];
				$_SESSION["mail"] = $sesion["mail"];
	            return 1;
	        } else {
	            $time = time()-100;
	            setcookie("user", $sesion["user"], $time);
	            setcookie("sesion",hash('sha256', $sesion["id"]), $time);
	            setcookie("PHPSESSID", "", $time);
	            return 0;
	        }
	    }
	    if (isset($_COOKIE["user"]) && isset($_SESSION["id"])) {
	        if ($_SESSION["user"] == $_COOKIE["user"]) {
	            return 1;
	        }
	    }
	}

	public static function logueo($user, $pass) {
		global $repoUser;

	    $datos = $repoUser->buscarUser("user", $user);
	    if ($datos !== 0) {
	        if (password_verify($pass, $datos["pass"]) == 1) {
	            return 1;
	        } else {
	            return "Contraseña Incorrecta";
	        }
	    } else {
	        return "Usuario Invalido";
	    }
	}


}


 ?>
