
// To trim the string in JS..
// create the prototype on the String object
String.prototype.trim = function()
{
// skip leading and trailing whitespace
// and return everything in between
var x=this;
x=x.replace(/^\s*(.*)/, "$1");
x=x.replace(/(.*?)\s*$/, "$1");
return x;
}

/**
 * function added to focus selected value in field 
*/
function focus_field(field_name)
{
	if(document.getElementById(field_name).disabled != true)
	{
		document.getElementById(field_name).focus();
	}
}

