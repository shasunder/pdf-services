var image_name1_rollin = "one-on.gif";
var image_name2_rollin = "two-on.gif";
var image_name3_rollin = "three-on.gif";
var image_name1_rollout = "one-off.gif";
var image_name2_rollout = "two-off.gif";
var image_name3_rollout = "three-off.gif";

function change_image(id,event_name,img_url)
{
	var image_name;
	for(var i = 1;i<=3;i++)
	{
		if(event_name == "rollin")
		{
			image_name = document.getElementById('digit' + i).src;
			if(id == i)
			{
				if(image_name != img_url + eval("image_name" + i + "_rollin"))
				{
					document.getElementById('digit' + i).src= img_url + eval("image_name" + i + "_rollin"); 
				}
			}
			else
			{
				document.getElementById('digit' + i).src= img_url + eval("image_name" + i + "_rollout"); 
			}
		}
		else
		{
			image_name = document.getElementById('digit' + i).src;
			document.getElementById('digit' + i).src= img_url + eval("image_name" + i + "_rollout"); 
		}
	}
	return false;
}