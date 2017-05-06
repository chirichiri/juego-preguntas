<?php

session_start();

function avatar() {
    $existe = GLOB("user/" . $_SESSION["user"] . "/avatar.{jpg,png,gif,jgeg,svg,bmp}", GLOB_BRACE);
    if ($existe != NULL) {
        return $existe[0];
    } else {
        return "user/default/avatar.png";
    }
}

function cambiarAvatar($imagen) {
    if ($_FILES[$imagen]["error"] == UPLOAD_ERR_OK) {
        $actual = avatar();

        if ($actual != NULL) {
            unlink($actual);
        }

        $nombre = $_FILES[$imagen]["name"];
        $archivo = $_FILES[$imagen]["tmp_name"];

        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        if ($ext != "png" && $ext != "jpg") {
            return "Solo podés subir .png y .jpg";
        }
        else {

            $archivoFinal = dirname(__FILE__);
            $archivoFinal = $archivoFinal . "/user/" . $_SESSION["user"];

            if (!file_exists($archivoFinal)) {
                mkdir($archivoFinal, 0777, true);
            }

            $archivoFinal = $archivoFinal  . "/avatar." . $ext;

            move_uploaded_file($archivo, $archivoFinal);
        }
    }
}

function logout() {
    $time = time()-100000;
    setcookie("user", "", $time);
    setcookie("sesion", "", $time);
    setcookie("PHPSESSID", "", $time);
    session_destroy();
    unset($_SESSION);

    redirect("index.php");
}

function genSesion() {
    $sesion = buscarUser("user", $_POST["user"]);
    $time = time()+1000;

    setcookie("user", $sesion["user"], $time);
    setcookie("sesion",hash('sha256', $sesion["id"]), $time);
    $_SESSION["id"] = $_COOKIE["PHPSESSID"];
    $_SESSION["user"] = $sesion["user"];
    $_SESSION["pass"] = $sesion["pass"];
    return 1;
}

function mantenerLogin() {
    if (isset($_COOKIE) && !isset($_SESSION)) {
        $sesion = buscarUser("user", $_COOKIE["user"]);
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
        $sesion = buscarUser("user", $_COOKIE["user"]);
        if ($_SESSION["id"] != $_COOKIE["PHPSESSID"]) {
            return 0;
        }
        if ($_SESSION["user"] == $sesion["user"] && $_SESSION["pass"] == $sesion["pass"]) {
            return 1;
        }
    }
}

function logueo($user, $pass) {
    $datos = buscarUser("user", $user);
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

function generarID() {
    $id = count(todosUser());
    if ($id != 0) {
        return $id+1;
    } else {
        return 1;
    }
}
function crearUser() {
    $user = [
        "id"    =>  generarID(),
        "user"  =>  $_POST["user"],
        "mail"  =>  $_POST["mail"],
        "pass"  =>  password_hash($_POST["pass"], PASSWORD_DEFAULT)
    ];

    file_put_contents("usuarios.json", json_encode($user) . PHP_EOL, FILE_APPEND);
}

function todosUser() {
    $array = explode(PHP_EOL, file_get_contents("usuarios.json"));

    foreach ($array as $key => $value) {
        $arrayTerminado[] = json_decode($value, true);
    }

    array_pop($arrayTerminado);
    return $arrayTerminado;
}

function buscarUser($campo, $valor) {
    $archivo = fopen("usuarios.json", "r");

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

function redirect($url, $permanent = false) {       /* SOLO PONGAN LA URL CUANDO LO LLAMEN, EJ: redirect("index.php"); */
    header("Location:" .$url, true, $permanent? 301 : 302);
    exit;
}

function debug() {
    if (isset($_SESSION["id"])) {
        echo "Sesión: ";
        var_dump($_SESSION);
        echo "<br>";
    }

    if (isset($_COOKIE["user"])) {
        echo "Cookie: ";
        var_dump($_COOKIE);
    }

}
?>
