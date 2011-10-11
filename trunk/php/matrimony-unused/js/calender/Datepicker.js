/*****************************************************************************
*  File: Datepicker.js                                                       *
*  Author: Victor Andales                                                    *
*  Copyright: Copyright 2005 Victor Andales, vandalesm@gmail.com			 *
*  Licence: Free for personal and commercial use as long as copyright notice *
*           remains in place. Distribution prohibited without the express    *
*           permission of the owner (vandalesm@gmail.com)			         *
******************************************************************************/

var GlobalDatePickerObject=null;

function Datepicker(name, date) 
{
	this.name=name;
	this.date=date;
	this.popup=new Popup(name+"_POPUP",0,0,0,0);
	this.calendar=new Calendar(name+"_CALENDAR",date.getMonth(),date.getFullYear());
	this.text_field=null;
//	setPopupTitle(this.popup,"Today is::&nbsp;"+this.calendar.month_names[date.getMonth()]+" "+date.getDate()+" "+date.getFullYear());
	this.show=showDatepicker;
}


function processCalendarData(data,name) 
{
	var obj=GlobalDatePickerObject;
	var month=new String(parseInt(obj.calendar.month)+1);
	var year=new String(obj.calendar.year);
	var date=new String(data);
	var m,d;
	if(obj.calendar.name==name) {
		if(month.length==1) {
			m="0"+month;
		}
		else {
			m=month;
		}
		if(date.length==1) {
			d="0"+date;
		}
		else {
			d=date;
		}
		//obj.text_field.value=m+"/"+d+"/"+year;
//		obj.text_field.value=d+"-"+m+"-"+year;
		//obj.text_field.value=year+"-"+m+"-"+d;
		obj.text_field.value=d+"-"+m+"-"+year;
		obj.popup.hide();
	}
}

function showDatepicker(obj, e, objField)
{
	if(objField) 
	{
		obj.text_field=objField;
	}
	var evt = (e) ? e : event;
	var coords = getPageEventCoords(evt);
	movePopup(obj.popup, coords.left, coords.top);
	obj.calendar.month=obj.date.getMonth();
	obj.calendar.year=obj.date.getFullYear();
	obj.popup.show();
	obj.calendar.div=document.getElementById(obj.popup.CONTENT_DIV_ID);
	obj.calendar.show();
	document.getElementById(obj.popup.IFRAME_ID).style.height=document.getElementById(obj.popup.DIV_ID).offsetHeight; 
	document.getElementById(obj.popup.IFRAME_ID).style.width=document.getElementById(obj.popup.DIV_ID).offsetWidth;
	GlobalDatePickerObject=obj;
}

/*function getPageEventCoords(evt) {
    var coords = {left:0, top:0};
    if (evt.pageX) {
        coords.left = evt.pageX;
        coords.top = evt.pageY;
    } else if (evt.clientX) {
        coords.left = 
            evt.clientX + document.body.scrollLeft - document.body.clientLeft;
        coords.top = 
            evt.clientY + document.body.scrollTop - document.body.clientTop;
        // include html element space, if applicable
        if (document.body.parentElement && document.body.parentElement.clientLeft) {
            var bodParent = document.body.parentElement;
            coords.left += bodParent.scrollLeft - bodParent.clientLeft;
            coords.top += bodParent.scrollTop - bodParent.clientTop;
        }
    }
    return coords;
}*/

function getPageEventCoords(evt) 
{
    var coords = {left:0, top:0};
    if (evt.pageX) 
	{
        coords.left = evt.pageX;
        coords.top = evt.pageY;
    } else if (evt.clientX) {
        //coords.left = evt.clientX + document.body.scrollLeft - document.body.clientLeft;		
        //coords.top = evt.clientY + document.body.scrollTop - document.body.clientTop;
		coords.left = 390;
 		coords.top = 170;
        // include html element space, if applicable
        if (document.body.parentElement && document.body.parentElement.clientLeft) {
            var bodParent = document.body.parentElement;
            coords.left += bodParent.scrollLeft - bodParent.clientLeft;
            //coords.top += bodParent.scrollTop - bodParent.clientTop;
			coords.top = evt.clientY - 230;
        }
    }
    return coords;
}
