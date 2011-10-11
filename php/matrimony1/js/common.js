// AJAX FUNCTIONS


function getXmlHttpObject()
{
	var oXmlHttp;

	try
	{
		oXmlHttp = new XMLHttpRequest();
	}
	catch (e)
	{
		try
		{
			oXmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			oXmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

	return oXmlHttp;
}



function sendRequestAndGetResponse(sUrl, oElement, sMsg, sErrMsg, sMethod, sParams)
{
	var oXmlHttp = getXmlHttpObject();

	if(typeof(oXmlHttp) == "object")
	{
		oXmlHttp.onreadystatechange = function()
		{
			if(oXmlHttp.readyState == 4)
			{
				if(oXmlHttp.status == 200)
				{
					//prompt("", oXmlHttp.responseText);
					oElement.innerHTML = oXmlHttp.responseText;
				}
				else
				{
					oElement.innerHTML = sErrMsg;
				}

			}
			else
			{
				oElement.innerHTML = sMsg;
			}

		}

		if(sMethod == "POST")
		{
			oXmlHttp.open("POST", sUrl, true);
			oXmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			oXmlHttp.setRequestHeader("Content-length", sParams.length);
			oXmlHttp.setRequestHeader("Connection", "close");
			oXmlHttp.send(sParams);
		}
		else
		{
			oXmlHttp.open("GET", sUrl, true);
			oXmlHttp.send(null);
		}

	} // EO if(oXmlHttp != null)
	else
	{
		oElement.innerHTML = sErrMsg;
	}

} // EO sendRequestAndGetResponse()

function sendRequestAndGetResponse2(sUrl)
{
	var oXmlHttp = getXmlHttpObject();

	if(typeof(oXmlHttp) == "object")
	{
		oXmlHttp.onreadystatechange = function()
		{
			if(oXmlHttp.readyState == 4)
			{
				if(oXmlHttp.status == 200)
				{
					//prompt("", oXmlHttp.responseText);
					document.getElementById('statesspan2').innerHTML = oXmlHttp.responseText;
					//oElement.innerHTML = oXmlHttp.responseText;
				}
				else
				{
					//oElement.innerHTML = sErrMsg;
				}

			}
			else
			{
				//oElement.innerHTML = sMsg;
			}

		}

		
			oXmlHttp.open("GET", sUrl, true);
			oXmlHttp.send(null);

	} // EO if(oXmlHttp != null)
	else
	{
		//oElement.innerHTML = sErrMsg;
	}

} // EO sendRequestAndGetResponse()



