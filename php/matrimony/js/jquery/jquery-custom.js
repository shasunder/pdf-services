/* accepts array of ids*/
function hideAndShow(elements){
	for(var i=0;i<elements.length;i++){
		var element = "#" + elements[i]; 
		$(element).is(":visible") ? $(element).hide('fast'): $(element).show('fast');
	}
}