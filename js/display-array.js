function display(array){
	for(var i=0;i<4;i++){
		for(var j=0;j<4;j++){
			document.getElementById(i+','+j).innerHTML = array[i][j];
		}
	}
}
