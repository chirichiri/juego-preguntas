<?php
require_once 'json.php';


abstract class Repositorio {

public function cambiarAvatar($imagen) {
	    if ($_FILES[$imagen]["error"] == UPLOAD_ERR_OK) {
	        $actual = User::getAvatar();

	        if ($actual != NULL && $actual != "user/default/avatar.png") {
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
	    } else {
	        return "Error al subir avatar.";
	    }
	}

}


 ?>
