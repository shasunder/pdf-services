/* accepts array of ids*/
function hideAndShow(elements){
	for(var i=0;i<elements.length;i++){
		var element = "#" + elements[i]; 
		$(element).is(":visible") ? $(element).hide(): $(element).show();
	}
}

function hide(elements){
	for(var i=0;i<elements.length;i++){
		var element = "#" + elements[i]; 
		 $(element).hide();
	}
}


/* Min/maximize panel. Follows convention - '[panelId]MinMax' as toggle button id */
function minMaxPanel(panelId){
	hideAndShow( [ panelId ]);
	var minMax = $("#" +panelId+"MinMax");
	$(minMax).attr('src')=='images/expanded.png' ? $(minMax).attr('src','images/collapsed.png') : $(minMax).attr('src','images/expanded.png');
}
