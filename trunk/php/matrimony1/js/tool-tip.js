<!--
	function DivSetVisible(type,iframe, state)
	{
		var DivRef = document.getElementById(type);
		var IfrRef = document.getElementById(iframe);
		if(state)
		{
			DivRef.style.display = "block";
			IfrRef.style.width = DivRef.offsetWidth;
			IfrRef.style.height = DivRef.offsetHeight;
			IfrRef.style.top = DivRef.style.top;
			IfrRef.style.left = DivRef.style.left;
			IfrRef.style.zIndex = DivRef.style.zIndex - 1;
			IfrRef.style.display = "block";
		}
		else
		{
			DivRef.style.display = "none";
			IfrRef.style.display = "none";
		}
	}
//-->