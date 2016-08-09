function keyDown(e) {　　　　
	var keycode = e.which;　　　　
	// 37 = <<
	// 38 = ^
	// 39 = >>
	if(keycode === 37){
		left(res);
	} else if(keycode === 38){
		up(res);
	} else if(keycode === 39){
		right(res);
	} else if(keycode === 40){
		down(res);
	}
}　　
