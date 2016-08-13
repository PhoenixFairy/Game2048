function ready() {
	if(xqr.readyState === 4) {
		if(xqr.status === 200) {
			tmp = res;
			res = eval('(' + xqr.responseText + ')');
			if(JSON.stringify(tmp) === JSON.stringify(res)) {
				alert('Illagal dirct!');
			} else {
				addRandomNumber();
			}
			display(res);

		} else {
			confirm("Failed to send get request to server.");
		}
	}
}

function addRandomNumber() {
	xqr.open("GET", "php/i_ajax.php?dirct=addr&array=" + JSON.stringify(res), true);
	xqr.send();
	xqr.onreadystatechange = function() {
		if(xqr.readyState === 4) {
			if(xqr.status === 200) {
				res = eval('(' + xqr.responseText + ')');
				display(res);
				xqr.onreadystatechange = ready;
			} else {
				confirm("Failed to send get request to server.");
			}
		}
	}
}

function processDirct() {
	xqr.send();
	xqr.onreadystatechange = ready;
}

function move(array, moveid) {
	// move this array
	// give a ajax request to server
	// --------------------------------
	//            Move id 
	// --------------------------------
	// Up -2 | Down -1 | Left 2 | Right 1

	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid=" + moveid + "&array=" + JSON.stringify(res), true);
	processDirct();

}