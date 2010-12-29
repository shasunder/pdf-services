	
	var visibilitySpeed='fast';
	
	function toggleVisibility(element, speed){
		$(element).is(":visible") ? $(element).hide(speed) : $(element).show(speed);
	}
	
	function hideShowIndex(elements, index){
		for(var i=0;i< elements.length;i++){
			var element= $(elements[i] + index);
			$(element).is(":visible") ? $(element).hide(visibilitySpeed) : $(element).show(visibilitySpeed);
		}
	}
	
	function hideShow(elements){
		for(var i=0;i< elements.length;i++){
			var element= $(elements[i]);
			$(element).is(":visible") ? $(element).hide(visibilitySpeed) : $(element).show(visibilitySpeed);
		}
	}
	
	function show(elements, display){
		for(var i=0;i< elements.length;i++){
			var element= $(elements[i]);
			display ? $(element).show(visibilitySpeed) : $(element).hide(visibilitySpeed);
		}
	}