function keyDown(e) {　　　　
	var keycode = e.which;　　　　
	// 37 = <<
	// 38 = ^
	// 39 = >>
	if(keycode === 37){
		move(res,2);
	} else if(keycode === 38){
		move(res,-2);
	} else if(keycode === 39){
		move(res,1);
	} else if(keycode === 40){
		move(res,-1);
	}
}　　

document.onkeydown = keyDown;