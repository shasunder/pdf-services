function CompDate(adate,bdate,msg)
{	a = adate.split('/');	
	b = bdate.split('/');	
	var sDate = new Date(a[2],a[0]-1,a[1]);
	var eDate = new Date(b[2],b[0]-1,b[1]);	
	if (sDate <= eDate )	
	{		return true; 	
	}	
	else	
	{	    alert(msg);		
	return false;	
	}
	}
