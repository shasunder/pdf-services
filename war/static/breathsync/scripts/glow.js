/////////////////////////////////////////////
// Library to glow element's background color.  
// Copyright F. Permadi
//
// See tutorial on
// http://www.permadi.com/tutorial/jsChangeElementBgColor\index2.html
/////////////////////////////////////////////
function getBgColor(element)
{
	if (element.currentStyle)
		return element.currentStyle.backgroundColor;
	if (window.getComputedStyle)
	{
		var elementStyle=window.getComputedStyle(element,"");
		if (elementStyle)
			return elementStyle.getPropertyValue("background-color");
	}
	return 0;
}

function convertColor(color)
{
	var rgbColors=new Object();
    if (color.substring(0,1)=="r")
	{
		color=color.substring(color.indexOf('(')+1, color.indexOf(')'));
		rgbColors=color.split(',', 3);
		rgbColors[0]=parseInt(rgbColors[0]);
		rgbColors[1]=parseInt(rgbColors[1]);
		rgbColors[2]=parseInt(rgbColors[2]);		
	}
	// IE returns the color in this  '#RRGGBB' format
	else if (color.substring(0,1)=="#")
	{
		rgbColors[0]=color.substring(1, 3);	
		rgbColors[1]=color.substring(3, 5);			
		rgbColors[2]=color.substring(5, 7);					
		rgbColors[0]=parseInt(rgbColors[0], 16);
		rgbColors[1]=parseInt(rgbColors[1], 16);
		rgbColors[2]=parseInt(rgbColors[2], 16);		
	}
	return rgbColors;
}

// Takes an element 
function ColorGlowEffect(element)
{
//alert("moi");
	element.objReference=this;
	var thisRef=this;
	this.elementRef=element;

	
	this.setTargetColor=function(targetRed, targetGreen, targetBlue)
	{
		this.elementRef.targetRed=targetRed;
		this.elementRef.targetGreen=targetGreen;
		this.elementRef.targetBlue=targetBlue;	 
	}
	
	this.doGlowUponTimeout=function()
	{
		//alert(this);
		glow();
		//setTimeout(doGlow, 20);			
	};
	

/*	function doGlow()
	{
		glow(thisRef);
	}*/

	function glow()
	{
//		element=caller.element;
		if (element && element.style==undefined)
			element.style={};
		
	//	alert(this);		
		//alert (	element.style["backgroundColor"]);
		var bgColor=getBgColor(element);
		if (bgColor==0)
			return;
		
		var colors=convertColor(bgColor);
		
		// Save the color into our object.
		if (element.srcRed==undefined)
			element.srcRed=parseInt(colors[0]);
		if (element.srcGreen==undefined)
			element.srcGreen=parseInt(colors[1]);
		if (element.srcBlue==undefined)
			element.srcBlue=parseInt(colors[2]);		
		
		//alert(element.srcRed+"#"+element.srcGreen+"#"+element.srcBlue);
		/*for (style in element.style)
		{
		alert(element.style[style].toString());
		}*/
		if (element.red==undefined)
			element.red=element.srcRed;
		if (element.green==undefined)
			element.green=element.srcGreen;
		if (element.blue==undefined)
			element.blue=element.srcBlue;
		
		// This block of code below increases or deacrease the color value
		//   so that the color merges with the target color. 
		var speed=3;
		if (element.targetRed<element.red)
		{
			element.red-=speed;
			// Prevent overshooting
			if (element.red<element.targetRed)
				element.red=element.targetRed;	
		}
		else
		{
			element.red+=speed;	
			// Prevent overshooting			
			if (element.red>element.targetRed)
				element.red=element.targetRed;	
		}
		
		if (element.targetGreen<element.green)
		{
			element.green-=speed;
			if (element.green<element.targetGreen)
				element.green=element.targetGreen;	
		}
		else
		{
			element.green+=speed;	
			if (element.green>element.targetGreen)
				element.green=element.targetGreen;	
		}	
		
		if (element.targetBlue<element.blue)
		{
			element.blue-=speed;
			if (element.blue<element.targetBlue)
				element.blue=element.targetBlue;	
		}
		else
		{
			element.blue+=speed;	
			if (element.blue>element.targetBlue)
				element.blue=element.targetBlue;	
		}			

		// Check thow close we're to the target color
		var delta=Math.abs(element.targetRed-element.red)+
			Math.abs(element.targetGreen-element.green)+
			Math.abs(element.targetBlue-element.blue);

		// If we're close enough to the target color,
		// then stop.  
		if (delta<speed*3)
		{
			element.red=element.targetRed;	
			element.green=element.targetGreen;	
			element.blue=element.targetBlue;
		}
		else
		{
	        setTimeout(glow, 20);			
			//caller.doGlowUponTimeout();
		}

		// Assign the background color as #rrggbb string.
		
		// First, convert the value to a hex number (base 16)
		var redString=element.red.toString(16);
		var greenString=element.green.toString(16);
		var blueString=element.blue.toString(16);
		
		// Then prepend "0" if there is only one digit.
		if (redString.length<2)
			redString="0"+redString;
		if (greenString.length<2)
			greenString="0"+greenString;		
		if (blueString.length<2)
			blueString="0"+blueString;				
		//	alert('#'+redString+greenString+blueString);
		
		// Now assign the color
		if (element.style && element.style["backgroundColor"])
  		  element.style["backgroundColor"]='#'+redString+greenString+blueString;
	};
}

function handleMouseOver(myEvent, targetRed, targetGreen, targetBlue)
{
  if (!myEvent)
    myEvent=window.event;
  if (!myEvent)
	return;
  var firingElement=null;
  // Internet Explorer
  if (myEvent.srcElement)
  {
	 firingElement=myEvent.srcElement;  
  }
  // Netscape and Firefox
  else if (myEvent.target)
  {
	 firingElement=myEvent.target;    
  }
//  alert(firingElement.tagName);
  obj=null;
  if (firingElement.objReference)
	obj=firingElement.objReference;
  if (!obj)
	obj=new ColorGlowEffect(firingElement);
	
  obj.setTargetColor(targetRed, targetGreen, targetBlue);		
  obj.doGlowUponTimeout();	 	 	
}
function handleMouseOver(myEvent, targetRed, targetGreen, targetBlue)
{
  if (!myEvent)
    myEvent=window.event;
  if (!myEvent)
	return;
  var firingElement=null;
  // Internet Explorer
  if (myEvent.srcElement)
  {
	 firingElement=myEvent.srcElement;  
  }
  // Netscape and Firefox
  else if (myEvent.target)
  {
	 firingElement=myEvent.target;    
  }
//  alert(firingElement.tagName);
  obj=null;
  if (firingElement.objReference)
	obj=firingElement.objReference;
  if (!obj)
	obj=new ColorGlowEffect(firingElement);
	
  obj.setTargetColor(targetRed, targetGreen, targetBlue);		
  obj.doGlowUponTimeout();	 	 	
}

function handleGlow(firingElement)
{
  obj=null;
   if (firingElement.objReference)
 	obj=firingElement.objReference;
   if (!obj)
 	obj=new ColorGlowEffect(firingElement);
 	
   obj.setTargetColor(targetRed, targetGreen, targetBlue);		
  obj.doGlowUponTimeout();
}

function getBgColor(element)
{
	if (element && element.currentStyle)
		return element.currentStyle.backgroundColor;//.substring(1, 3)+""+element.srcGreen+""+element.srcBlue);
	if (window.getComputedStyle)
	{
		var elementStyle=window.getComputedStyle(element,"");
		if (elementStyle)
			return elementStyle.getPropertyValue("background-color");
	}
	return 0;
}

function changeBgColor(myEvent, newBgColor)
{
  if (!myEvent)
    myEvent=window.event;
  if (!myEvent)
	return;
  var firingElement=null;
  // Internet Explorer
  if (myEvent.srcElement)
  {
	 firingElement=myEvent.srcElement;  
  }
  // Netscape and Firefox
  else if (myEvent.target)
  {
	 firingElement=myEvent.target;    
  }
  if (firingElement)
  {
	 firingElement.originalBgStyle=firingElement.style["backgroundColor"];
	 firingElement.style["backgroundColor"]=newBgColor;
  }	 
}

function restoreBgColor(myEvent)
{
  if (!myEvent)
    myEvent=window.event;
  if (!myEvent)
	return;
  var firingElement=null;
  // Internet Explorer
  if (myEvent.srcElement)
  {
	 firingElement=myEvent.srcElement;  
  }
  // Netscape and Firefox
  else if (myEvent.target)
  {
	 firingElement=myEvent.target;    
  }
  if (firingElement)
  {
	 firingElement.style["backgroundColor"]=firingElement.originalBgStyle;
  }	 
}