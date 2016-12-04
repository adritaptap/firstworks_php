var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function () {
	if (httpRequest.readyState === 4) {
		
		document.getElementById('result').innerHtml = httpRequest.responseText
	}
}


httpRequest.open('GET', '../test.php?city=annecy', true);
httpRequest.send();