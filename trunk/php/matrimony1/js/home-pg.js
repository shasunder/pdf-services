var content ;
var contentcontainer ;
var position = 1;
var rot_position = 1;
var rot_timer;
var maxY,wd, maxX, ready, slideDur=600, destX=0, destY=0, distY, distX, per, sliding, slideStart, aniTimer, startX, startY, xcoordinate, ycoordinate,url_path_rotation;

function load(cntId,rot_value,url_path)
{
	position = 0;
	url_path_rotation = url_path;
	if(!document.getElementById)
		return;

	content = document.getElementById("content"); 
	contentcontainer = document.getElementById("content-container"); 

	content.visibility="hidden";
	content.style.top=0;
	content.style.left=0;
	xcoordinate=0;
	ycoordinate=0;
	maxY=(content.offsetHeight-contentcontainer.offsetHeight>0)?content.offsetHeight-contentcontainer.offsetHeight:0;
	wd=cntId?document.getElementById(cntId).offsetWidth:content.offsetWidth;
	maxX=(wd-contentcontainer.offsetWidth>0)?wd-contentcontainer.offsetWidth:0;
	content.style.visibility="visible";
	ready=true;
	document.getElementById("slide-links").style.visibility="visible";
	rot_timer = setInterval("do_rotation()",rot_value);
 }

function glideTo(MstartX, MstartY)
{
	content = document.getElementById("content"); 
	contentcontainer = document.getElementById("content-container");
	startX = parseInt(content.style.left);
	if(startX == "")
	{
		startX = 0;
	}
	startY = parseInt(content.style.top);
	destX = -Math.max(Math.min(MstartX, maxX), 0);
	destY = -Math.max(Math.min(MstartY, maxY), 0);
	distY = destY - startY;
	distX =  destX - startX;
	per = Math.PI/(2 * slideDur);
	sliding = false;
	slideStart = (new Date()).getTime();
	aniTimer = setInterval("doSlide()",10);
	on_slide_start(startX, startY);
  }



function doSlide() 
{
	var elapsed = (new Date()).getTime() - slideStart;
	if (elapsed < slideDur) 
	{
		var x = startX + distX * Math.sin(per*elapsed);
		var y = startY + distY * Math.sin(per*elapsed);
		shiftTo(x, y);
		on_slide(x, y);
	} 
	else
	{	// if time's up
		clearInterval(aniTimer);
		sliding = false;
		shiftTo(destX, destY);
		//content = null;
		on_slide_end(destX, destY);
	}
}
function shiftTo(x,y)
{
	 if(typeof(x) == "number")
	 {
		content.style.left=x+"px";
		content.style.top=y+"px";
	 }
}

on_slide_start = function() {}
on_slide = function() {}
on_slide_end = function() {}


function slide(id,img_url)
{
	clearInterval(rot_timer);
	position = id;
	glideTo(eval(id-1) * 390,0);
	for(var z=1;z<=5;z++)
	{
		if(id == z)
		{
			document.getElementById("slide" + id).src = img_url + "slide-on.gif";
		}
		else
		{
			document.getElementById("slide" + z).src = img_url + "slide-off.gif";
		}
	}
	if(id == 5)
	{
		disableAnchor(document.getElementById("slidenext"),true);
		document.getElementById("image_next").src = url_path_rotation + "next-disable.gif";
		disableAnchor(document.getElementById("slideprevious"),false);
		document.getElementById("image_previous").src = url_path_rotation + "prev.gif";
	}
	if(id == 1)
	{
		disableAnchor(document.getElementById("slideprevious"),true);
		document.getElementById("image_previous").src = url_path_rotation + "prev-disable.gif";
		disableAnchor(document.getElementById("slidenext"),false);
		document.getElementById("image_next").src = url_path_rotation + "next.gif";
	}
	if(position > 1  && position < 5)
	{
		disableAnchor(document.getElementById("slidenext"),false);
		document.getElementById("image_next").src = url_path_rotation + "next.gif";
		disableAnchor(document.getElementById("slideprevious"),false);
		document.getElementById("image_previous").src = url_path_rotation + "prev.gif";
	}
}

function next_previous(str,img_url)
{
	clearInterval(rot_timer);
	if(str == "next")
	{
		if(document.getElementById("slideprevious").href == "")
		{
			if(position != 5)
			{
				disableAnchor(document.getElementById("slideprevious"),false);
				document.getElementById("image_previous").src = url_path_rotation + "prev.gif";
			}
		}
		if(position < 5)
		{
			position++;
			glideTo(eval(position-1) * 390,0);
			disableAnchor(document.getElementById("slidenext"),false);
			document.getElementById("image_next").src = url_path_rotation + "next.gif";
		}
		if(position == 5)
		{
			disableAnchor(document.getElementById("slidenext"),true);
			document.getElementById("image_next").src = url_path_rotation + "next-disable.gif";
		}
		
	}
	if(str == "previous")
	{
		if(document.getElementById("slidenext").href == "")
		{
			disableAnchor(document.getElementById("slidenext"),false);
			document.getElementById("image_next").src = url_path_rotation + "next.gif";
		}
		if(position > 1)
		{
			position--;
			glideTo(eval(position-1) * 390,0);
			disableAnchor(document.getElementById("slideprevious"),false);
			document.getElementById("image_previous").src = url_path_rotation + "prev.gif";
		}
		if(position == 1)
		{
			disableAnchor(document.getElementById("slideprevious"),true);
			document.getElementById("image_previous").src = url_path_rotation + "prev-disable.gif";
		}

	}
	for(var z=1;z<=5;z++)
	{
		if(position == z)
		{
			document.getElementById("slide" + position).src = img_url + "slide-on.gif";
		}
		else
		{
			document.getElementById("slide" + z).src = img_url + "slide-off.gif";
		}
	}

}

function do_rotation()
{
	if(position < 5)
	{
		position++;
		glideTo(eval(position-1) * 390,0);
	}
	else
	{
		position = 1;
		content.style.left="0px";
		content.style.top="0px";
	}
	for(var z=1;z<=5;z++)
	{
		if(position == z)
		{
			document.getElementById("slide" + position).src = url_path_rotation + "slide-on.gif";
		}
		else
		{
			document.getElementById("slide" + z).src = url_path_rotation + "slide-off.gif";
		}
	}
}

function disableAnchor(obj, disable)
{
	if(disable)
	{
		var href = obj.getAttribute("href");
		obj.removeAttribute('href');
	}
	else
	{
		if(obj.id == "slidenext")
		{
			obj.setAttribute('href',"Javascript:next_previous('next','" + url_path_rotation + "')");
		}
		if(obj.id == "slideprevious")
		{
			obj.setAttribute('href',"Javascript:next_previous('previous','" + url_path_rotation + "')");
		}
	}
}

//window.onLoad = function()
//{


//}