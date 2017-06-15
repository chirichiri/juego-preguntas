<?php
require_once '../functions.php';

if (isset($_GET["puntos"])) {
	echo $_SESSION["puntos"];
} else {
	echo "what?";
}

 ?>
