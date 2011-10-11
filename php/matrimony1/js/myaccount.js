	function popImg(iName) {
		var pURL=iName;
		pInfo='toolbar=0,';
		pInfo+='location=0,';
		pInfo+='directories=0,';	
		pInfo+='status=0,';
		pInfo+='menubar=0,';
		pInfo+='scrollbars=0,';
		pInfo+='resizable=0';
	window.open(pURL, 'Image', pInfo);
}
