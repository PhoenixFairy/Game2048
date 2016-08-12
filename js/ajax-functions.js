function processDirct(){
	xqr.send();
	xqr.onreadystatechange = function() {
		if(xqr.readyState === 4) {
			if(xqr.status === 200) {
				document.getElementById("loader").hidden = true;
				res = eval('(' + xqr.responseText + ')');
				for(var i = 0; i < 4; i++) {
					for(var j = 0; j < 4; j++) {
						document.getElementById(i + ',' + j).innerHTML = res[i][j];
					}
				}

			} else {
				confirm("Failed to send get request to server.");
			}
		} else {
			document.getElementById("loader").hidden = false;
		}
	}
}
function move(array,moveid) {
	// move this array
	// give a ajax request to server
	// --------------------------------
	//            Move id 
	// --------------------------------
	// Up -2 | Down -1 | Left 2 | Right 1
	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid="+moveid+"&array=" + JSON.stringify(res), true);
	processDirct();
}