window.onload = function() {
	var resp1 = document.querySelector("#resp1");
	var resp2 = document.querySelector("#resp2");
	var resp3 = document.querySelector("#resp3");
	var resp4 = document.querySelector("#resp4");

	var arrayResp = [resp1, resp2, resp3, resp4];

	arrayResp.forEach(function(elemento, key) {
		elemento.addEventListener("click", mandar);
	});

	function mandar() {
		console.log();
	}
}
