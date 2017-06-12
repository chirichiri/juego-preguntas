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
		global $repositorio;
	    $sesion = $repositorio->buscarUser("user", $_POST["user"]);
	    $time = time()+36000;

	    setcookie("user", $sesion["user"], $time);
	    setcookie("sesion",hash('sha256', $sesion["id"]), $time);
	    $_SESSION["id"] = $_COOKIE["PHPSESSID"];
	    $_SESSION["user"] = $sesion["user"];
	    $_SESSION["pass"] = $sesion["pass"];

	    return 1;
	}

	public static function mantenerLogin() {
		global $repositorio;
	    if (isset($_COOKIE) && !isset($_SESSION)) {
	        $sesion = $repositorio->buscarUser("user", $_COOKIE["user"]);
	        if ($_COOKIE["user"] == $sesion["user"] && $_COOKIE["sesion"] == hash('sha256', $sesion["id"])){
	            $_SESSION["id"] = $_COOKIE["PHPSESSID"];
	            $_SESSION["user"] = $sesion["user"];
	            $_SESSION["pass"] = $sesion["pass"];
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
	        if ($_SESSION["id"] != $_COOKIE["PHPSESSID"]) {
	            return 0;
	        }
	        if ($_SESSION["user"] == $_COOKIE["user"]) {
	            return 1;
	        }
	    }
	}

	public static function logueo($user, $pass) {
		global $repositorio;

	    $datos = $repositorio->buscarUser("user", $user);
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
