function pchange(obj, myevent){

	if ( myevent == 1 ) {
		obj.style.background = '#CCFF00';
	}
	if ( myevent == 0 ) {
		obj.style.background = '#FFFFFF';
		prevVal = obj.value;
	}
	
}