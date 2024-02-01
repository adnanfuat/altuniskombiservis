function pchange(obj, myevent){

	if ( myevent == 1 ) {
		obj.style.background = '#FDF8BE';
	}
	if ( myevent == 0 ) {
		obj.style.background = '#FFFFFF';
		prevVal = obj.value;
	}
	
}