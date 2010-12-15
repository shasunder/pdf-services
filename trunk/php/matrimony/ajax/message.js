function mainTab(mtabId,ltabId,itabId,active,normal){
	if(mtabId != ""){
		document.getElementById(mtabId).className=active;
	}if(ltabId != ""){
		document.getElementById(ltabId).className = normal;
	}if(itabId != ""){
		document.getElementById(itabId).className = normal;
	}
}

function compose(url,profile_id){	
	browser_support();
	var url=url;
	url=url+"?id="+profile_id+"&action=compose"+"&sid="+Math.random(9999);
	xmlHttp.onreadystatechange=msg;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function msg(){
	if (xmlHttp.readyState==4){
		idVal = document.getElementById('int_profile_id').value;
		document.getElementById("msg_content1").innerHTML = "";
		document.getElementById("msg_content1").innerHTML = xmlHttp.responseText;
		msg_messages('./ajax/message_class.php',idVal,'Received','N','','','','','','');
	}
}
function compose_interest(url,profile_id){	
	browser_support();
	var url=url;
	url=url+"?id="+profile_id+"&action=compose"+"&sid="+Math.random(9999);
	xmlHttp.onreadystatechange=inter;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function inter(){
	if (xmlHttp.readyState==4){
		idVal = document.getElementById('int_profile_id').value;
		document.getElementById("msg_content1").innerHTML = xmlHttp.responseText;
		msg_messages('./ajax/interest_class.php',idVal,'Received','N','','','','','','');
	}
}
function msg_messages(Url,profile_id,act,status,to_id,view,msgID,limit,page,preload){
	browser_support();
	var url=Url+"?pid="+profile_id;
	url=url+"&act="+act+"&status="+status+"&to_id="+to_id+"&view="+view+"&msgID="+msgID+"&limit="+limit+"&page="+page;
	url=url+"&sid="+Math.random(9999);
	xmlHttp.onreadystatechange=cont_messages;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function cont_messages(){
	if (xmlHttp.readyState==4){
		document.getElementById("content1").innerHTML = xmlHttp.responseText;		
	}
}
function upd_messages(Url,profile_id,act,status,to_id,subject,text,msgID){
	browser_support();
	var url=Url+"?pid="+profile_id;
	url=url+"&act="+act+"&msgStatus="+status+"&to_id="+to_id+"&subject="+subject+"&text="+text+"&msgID="+msgID;
	url=url+"&sid="+Math.random(9999);
	xmlHttp.onreadystatechange=upd_messages_return;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function upd_messages_return(){
	if (xmlHttp.readyState==4){
		var pid = xmlHttp.responseText;
		str = pid.split(':#:');
		if(str[2] == "inter"){
			mainTab('two','one','three','schmenu_active','schmenu');
			compose_interest(str[0],str[1]);
		} else {
			mainTab('one','two','three','schmenu_active','schmenu');
			compose(str[0],str[1]);
		}
	}
}
function validate_msg(){
	if(document.getElementById('txtSubject').value==""){
		alert("* Please Enter Subject");	
		document.getElementById('txtSubject').focus();
		return false;
	} if(document.getElementById('textAbout').value==""){
		alert("* please enter the Message");
		document.getElementById('textAbout').focus();
		return false;
	} return true;
}
/*..........for all light box common......*/
function msg_light(Url,profile_id,act,status,msg_id,view,page){
	browser_support(); 
	document.getElementById('fade').className='matri_overlayout';	
	var url=Url+"?pid="+profile_id;
	url=url+"&act="+act+"&status="+status+"&to_id="+msg_id+"&view="+view+"&page="+page;
	url=url+"&sid="+Math.random(9999);
	xmlHttp.onreadystatechange=cont200;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function cont200(){ 
	if (xmlHttp.readyState==4){
		document.getElementById("inner_msg").innerHTML=xmlHttp.responseText;
	}
	var objOverlay = document.getElementById('fade');
	var objLoadingImage = document.getElementById('over_divmsg');
	var arrayPageSize = getPageSize();
	var arrayPageScroll = getPageScroll();
	if (objLoadingImage){
		objLoadingImage.style.top = (arrayPageScroll[1] + ((arrayPageSize[3] - 115 - objLoadingImage.offsetHeight) / 2) + 'px');
	}
	objOverlay.style.height = (arrayPageSize[1] + 'px');		
	document.getElementById("inner_msg").style.display='';
}
/*..........for search result.........*/
function searchlimit(pageurl,limit,pages,srcname){	
	browser_support();
	url=url+"?limit="+limit+"&page="+pages+"&searchindex="+srcname;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=searchPage;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function searchPage(){
	if (xmlHttp.readyState==4){
		msg = xmlHttp.responseText;
		str = msg.split(':###:</div>');
		document.getElementById('wholedisplay').innerHTML = "";
		document.getElementById('wholedisplay').innerHTML = str[1];			
	}
}
/*..........for search result view similar..........*/
function similar_result(pageurl,srcname,type,gender,age,height,religion,caste,subcaste,star,raasi,city,state,country,eduquali,eduspl){
	browser_support();
	var url=pageurl+"?searchindex="+srcname+"&type="+type+"&gender="+gender+"&age="+age+"&height="+height+"&religion="+religion+"&caste="+caste+"&subcaste="+subcaste+"&star="+star+"&raasi="+raasi+"&city="+city+"&state="+state+"&country="+country+"&eduquali="+eduquali+"&eduspl="+eduspl;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=searchPagedis;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function searchPagedis(){
	if (xmlHttp.readyState==4){
		msg = xmlHttp.responseText;
		str = msg.split(':###:</div>');
		str2 = msg.split(':####:</div>');
		document.getElementById('wholedisplay').innerHTML = "";
		document.getElementById('wholedisplay').innerHTML = str[1];			
		document.getElementById('adddiv').innerHTML = str2[1];			
	}
}
/*..........photo display arrow pagination for all pages..........*/
function srcimgnext(imgname,rownum,totrw){
	if(rownum == 0){
	var i=document.editProfile.txtimgcnt_0.value;
	var j=parseInt(i);	
	document.editProfile.img_0.src="member_image/"+imgname;
	document.editProfile.lgt_img_0.src="member_image/"+imgname;
	document.editProfile.imglarr_0.src="images/l_arrow.jpg";		 
	document.editProfile.txtimgcnt_0.value=j+1;
	document.getElementById('sp_0').innerHTML=j+1;	
	if(document.editProfile.txtimgcnt_0.value==totrw){
	document.editProfile.imgrarr_0.src="images/r_arrow_url.gif";}
	}	
	if(rownum == 1){
	var i=document.editProfile.txtimgcnt_1.value;
	var j=parseInt(i);
	document.editProfile.img_1.src="member_image/"+imgname;
	document.editProfile.lgt_img_1.src="member_image/"+imgname;
	document.editProfile.imglarr_1.src="images/l_arrow.jpg";		 
	document.editProfile.txtimgcnt_1.value=j+1;
	document.getElementById('sp_1').innerHTML=j+1;	
	if(document.editProfile.txtimgcnt_1.value==totrw){
	document.editProfile.imgrarr_1.src="images/r_arrow_url.gif";}
	}
	if(rownum == 2){
	var i=document.editProfile.txtimgcnt_2.value;
	var j=parseInt(i);	
	document.editProfile.img_2.src="member_image/"+imgname;
	document.editProfile.lgt_img_2.src="member_image/"+imgname;
	document.editProfile.imglarr_2.src="images/l_arrow.jpg";		 
	document.editProfile.txtimgcnt_2.value=j+1;
	document.getElementById('sp_2').innerHTML=j+1;	
	if(document.editProfile.txtimgcnt_2.value==totrw){
	document.editProfile.imgrarr_2.src="images/r_arrow_url.gif";}
	}	
	if(rownum == 3){
	var i=document.editProfile.txtimgcnt_3.value;
	var j=parseInt(i);	
	document.editProfile.img_3.src="member_image/"+imgname;
	document.editProfile.lgt_img_3.src="member_image/"+imgname;
	document.editProfile.imglarr_3.src="images/l_arrow.jpg";		 
	document.editProfile.txtimgcnt_3.value=j+1;
	document.getElementById('sp_3').innerHTML=j+1;	
	if(document.editProfile.txtimgcnt_3.value==totrw){
	document.editProfile.imgrarr_3.src="images/r_arrow_url.gif";}
	}	
	if(rownum == 4){
	var i=document.editProfile.txtimgcnt_4.value;
	var j=parseInt(i);	
	document.editProfile.img_4.src="member_image/"+imgname;
	document.editProfile.lgt_img_4.src="member_image/"+imgname;
	document.editProfile.imglarr_4.src="images/l_arrow.jpg";		 
	document.editProfile.txtimgcnt_4.value=j+1;
	document.getElementById('sp_4').innerHTML=j+1;	
	if(document.editProfile.txtimgcnt_4.value==totrw){
	document.editProfile.imgrarr_4.src="images/r_arrow_url.gif";}
	}	
}
function srcimgprev(imgname,rownum){
	if(rownum == 0){
	var i=document.editProfile.txtimgcnt_0.value;
	var j=parseInt(i);	
	document.editProfile.img_0.src="member_image/"+imgname;
	document.editProfile.lgt_img_0.src="member_image/"+imgname;
	document.editProfile.imgrarr_0.src="images/r_arrow.jpg";	
	document.editProfile.txtimgcnt_0.value=j-1;
	document.getElementById('sp_0').innerHTML=j-1;	
	if(document.editProfile.txtimgcnt_0.value==1){
	document.editProfile.imglarr_0.src="images/l_arrow_url.gif";}
	}
	if(rownum == 1){
	var i=document.editProfile.txtimgcnt_1.value;
	var j=parseInt(i);	
	document.editProfile.img_1.src="member_image/"+imgname;
	document.editProfile.lgt_img_1.src="member_image/"+imgname;
	document.editProfile.imgrarr_1.src="images/r_arrow.jpg";	
	document.editProfile.txtimgcnt_1.value=j-1;
	document.getElementById('sp_1').innerHTML=j-1;	
	if(document.editProfile.txtimgcnt_1.value==1){
	document.editProfile.imglarr_1.src="images/l_arrow_url.gif";}
	}
	if(rownum == 2){
	var i=document.editProfile.txtimgcnt_2.value;
	var j=parseInt(i);	
	document.editProfile.img_2.src="member_image/"+imgname;
	document.editProfile.lgt_img_2.src="member_image/"+imgname;
	document.editProfile.imgrarr_2.src="images/r_arrow.jpg";	
	document.editProfile.txtimgcnt_2.value=j-1;
	document.getElementById('sp_2').innerHTML=j-1;	
	if(document.editProfile.txtimgcnt_2.value==1){
	document.editProfile.imglarr_2.src="images/l_arrow_url.gif";}
	}
	if(rownum == 3){
	var i=document.editProfile.txtimgcnt_3.value;
	var j=parseInt(i);	
	document.editProfile.img_3.src="member_image/"+imgname;
	document.editProfile.lgt_img_3.src="member_image/"+imgname;
	document.editProfile.imgrarr_3.src="images/r_arrow.jpg";	
	document.editProfile.txtimgcnt_3.value=j-1;
	document.getElementById('sp_3').innerHTML=j-1;	
	if(document.editProfile.txtimgcnt_3.value==1){
	document.editProfile.imglarr_3.src="images/l_arrow_url.gif";}
	}
	if(rownum == 4){
	var i=document.editProfile.txtimgcnt_4.value;
	var j=parseInt(i);	
	document.editProfile.img_4.src="member_image/"+imgname;
	document.editProfile.lgt_img_4.src="member_image/"+imgname;
	document.editProfile.imgrarr_4.src="images/r_arrow.jpg";	
	document.editProfile.txtimgcnt_4.value=j-1;
	document.getElementById('sp_4').innerHTML=j-1;	
	if(document.editProfile.txtimgcnt_4.value==1){
	document.editProfile.imglarr_4.src="images/l_arrow_url.gif";}
	}
}