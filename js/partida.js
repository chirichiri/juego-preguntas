window.onload = function() {
	var preg = document.querySelector("#preg");
	var resp1 = document.querySelector("#resp1");
	var resp2 = document.querySelector("#resp2");
	var resp3 = document.querySelector("#resp3");
	var resp4 = document.querySelector("#resp4");
	var main = document.querySelector("#main");
	var categorias = document.querySelector("#categorias");

	var arrayResp = [resp1, resp2, resp3, resp4];


	if (categorias !== null) {
		var children = Array.from(categorias.children);

		children.forEach(function(elemento) {
			elemento.addEventListener("click", preguntas);
		});
	}



	if (arrayResp[0] !== null) {
		arrayResp.forEach(function(elemento) {
			elemento.addEventListener("click", mandar);
		});
	}


	function preguntas(evento) {

		var form = document.querySelector("form");
		var categoria = document.querySelector("input");

		categoria.value = this.name;

	}

	function mandar() {
		var respuesta = new XMLHttpRequest();
		var params = "respuesta=" + this.innerText;

		respuesta.onreadystatechange = function() {
		    if (respuesta.readyState == 4 && respuesta.status == 200) {
		        if (respuesta.responseText == 1) {
					gane();
				} else {
					perdi();
				}
		    }
		}

		respuesta.open("GET", "js/responder.php?" + params, true);
		respuesta.send();

		var puntos = new XMLHttpRequest();
		var params = "puntos";

		puntos.onreadystatechange = function() {
		    if (puntos.readyState == 4 && puntos.status == 200) {
				actualizarPuntos(puntos.responseText);
		    }
		}

		puntos.open("GET", "js/puntaje.php?puntos", true);
		puntos.send();

		function gane() {
			main.removeChild(preg);
			main.removeChild(resp1);
			main.removeChild(resp2);
			main.removeChild(resp3);
			main.removeChild(resp4);

			main.append(cartel("Correcto!!", "Vamos por otra!!"));
		}

		function perdi() {
			main.removeChild(preg);
			main.removeChild(resp1);
			main.removeChild(resp2);
			main.removeChild(resp3);
			main.removeChild(resp4);

			main.append(cartel("Casi pero no!!", "Vamos por otra!!"));
		}

		function cartel(varTexto, varBoton) {
			var div = document.createElement("div");
			var texto = document.createElement("p");
			var boton = document.createElement("button");
			var boton2 = document.createElement("button");

			div.append(texto);
			div.append(boton);
			div.append(boton2);
			div.setAttribute("class", "square flex-col-center end");


			texto.innerHTML	= varTexto;
			boton.innerHTML = varBoton;
			boton2.innerHTML = "Volver";

			boton.addEventListener("click", jugar);
			boton2.addEventListener("click", volver);

			return div;
		}

		function jugar() {
			location.href = "jugar.php";
		}

		function volver() {
			location.href = "index.php";
		}

		function actualizarPuntos(puntos) {
			var texto = document.querySelector(".user-actions-small-3 ul li");

			texto.innerHTML = "Puntos: " + puntos;
		}
	}
}
