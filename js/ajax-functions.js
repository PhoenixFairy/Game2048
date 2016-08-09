var xqr = new XMLHttpRequest();
var dirct = ['initial', 'display'];
xqr.open("GET", "php/i_ajax.php?dirct=" + dirct[0], true);
var res;
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

function up(array) {
	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid=-2&array=" + JSON.stringify(res), true);
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

function down(arary) {
	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid=-1&array=" + JSON.stringify(res), true);
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

function left(array) {
	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid=2&array=" + JSON.stringify(res), true);
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

function right(array) {
	xqr.open("GET", "php/i_ajax.php?dirct=move&moveid=1&array=" + JSON.stringify(res), true);
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