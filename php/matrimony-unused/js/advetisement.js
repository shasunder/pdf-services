var c=1;
var t,k,n;
var j=1;
var v=0;

function timedCount()
{ /*alert("msg");*/
var av=c;
c=c+1;
var d=parseInt(5);
var i=c%d;
if(i==0)
{
j=j+1;

	if(j==4)
	{
	j=1;
	}
	for(k=1;k<=3;k++)
	{
		
		if(k==j)
		{
			document.getElementById('divv'+k).style.display='';
		}
		else
		{
			document.getElementById('divv'+k).style.display='none';
		}
	}
}
t=setTimeout("timedCount()",1000);
}
