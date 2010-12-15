<?
$link="ManageUser.php";
	$action=$_REQUEST['action'];
	$crby= array("Self","Father","Mother","Friend","Siblings","Relation","Others");
	$pcat= array("Assamese","Bengali","Bodo","Dogri","Gujarati","Hindi","Kannada","Kashmiri","Konkani","Maithili","Malayali","Manipuri","Marathi","Marwari","Nepali","Oriya","Parsi","Punjabi","Sanskrit","Santhali","Sindhi","Tamil","Telugu","Urdu","Others");
	$cat= array("Any","UnMarried","Widow/Widower","Divorced","Separated");
	$month= array("01","02","03","04","05","06","07","08","09","10","11","12");
	$date= array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
	$reli= array("Buddhist","Baha'is","Chinese Folks","Christian","Confucianist","Ethnoreligionist","Hindu","Jain","Jewish","Muslim","Neoreligionist","Shintoist","Sikh","Spiritist","Taoist","Zorastrian","Atheist","No Religion","Inter-Religion","Others");
	$hight= array("4ft 5in 134cm","4ft  6in  137cm","4ft  7in  139cm","4ft  8in  142cm","4ft  9in  144cm","4ft  10in  147cm","4ft  11in  149cm","5ft  0in  152cm","5ft  1in  154cm","5ft  2in  157cm","5ft  3in  160cm","5ft  4in  162cm","5ft  5in  165cm","5ft  6in  167cm","5ft  7in  170cm","5ft  8in  172cm","5ft  9in  175cm","5ft  10in  177cm","5ft  11in  180cm","6ft  0in  182cm","6ft  1in  185cm","6ft  2in  187cm","6ft  3in  190cm","6ft  4in  193cm","6ft  5in  195cm","6ft  6in  198cm","6ft  7in  200cm","6ft  8in  203cm","6ft  9in  205cm","6ft  10in  208cm","6ft  11in  210cm","7ft  0in  213cm");
	$wight= array("41kg","42kg","43kg","44kg","45kg","46kg","47kg","48kg","49kg","50kg","51kg","52kg","53kg","54kg","55kg","56kg","57kg","58kg","59kg","60kg","61kg","62kg","63kg","64kg","65kg","66kg","67kg","68kg","69kg","70kg","71kg","72kg","73kg","74kg","75kg","76kg","77kg","78kg","79kg","80kg","81kg","82kg","83kg","84kg","85kg","86kg","87kg","88kg","89kg","90kg","91kg","92kg","93kg","94kg","95kg","96kg","97kg","98kg","99kg","100kg","101kg","102kg","103kg","104kg","105kg","106kg","107kg","108kg","109kg","110kg","111kg","112kg","113kg","114kg","115kg","116kg","117kg","118kg","119kg","120kg","121kg","122kg","123kg","124kg","125kg","126kg","127kg","128kg","129kg","130kg","131kg","132kg","135kg","136kg","137kg","138kg","139kg","140kg");	
	$laps= array("90 lbs","91 lbs","92 lbs","93 lbs","94 lbs","95 lbs","96 lbs","97 lbs","98 lbs","99 lbs","100 lbs","101 lbs","102 lbs","103 lbs","104 lbs","105 lbs","106 lbs","107 lbs","108 lbs","109 lbs","110 lbs","111 lbs","112 lbs","113 lbs","114 lbs","115 lbs","116 lbs","117 lbs","118 lbs","119 lbs","120 lbs","121 lbs","122 lbs","123 lbs","124 lbs","125 lbs","126 lbs","127 lbs","128 lbs","129 lbs","130 lbs","131 lbs","132 lbs","133 lbs","134 lbs","135 lbs","136 lbs","137 lbs","138 lbs","139 lbs","140 lbs","141 lbs","142 lbs","143 lbs","144 lbs","145 lbs","146 lbs","147 lbs","148 lbs","149 lbs","150 lbs","151 lbs","152 lbs","153 lbs","154 lbs","155 lbs","156 lbs","157 lbs","158 lbs","159 lbs","160 lbs","161 lbs","162 lbs","163 lbs","164 lbs","165 lbs","166 lbs","167 lbs","168 lbs","169 lbs","170 lbs","171 lbs","172 lbs","173 lbs","173 lbs","174 lbs","175 lbs","175 lbs","176 lbs","177 lbs","178 lbs","179 lbs","180 lbs","181 lbs","182 lbs","183 lbs","184 lbs","185 lbs","186 lbs","187 lbs","188 lbs","189 lbs","190 lbs","191 lbs","192 lbs","193 lbs","194 lbs","195 lbs","196 lbs","197 lbs","198 lbs","199 lbs","200 lbs","201 lbs","202 lbs","203 lbs","204 lbs","205 lbs","206 lbs","207 lbs","208 lbs","209 lbs","210 lbs","211 lbs","212 lbs","213 lbs","214 lbs","215 lbs","216 lbs","217 lbs","218 lbs","219 lbs","220 lbs","221 lbs","222 lbs","223 lbs","224 lbs","225 lbs","226 lbs","227 lbs","228 lbs","229 lbs","230 lbs","231 lbs","232 lbs","233 lbs","234 lbs","235 lbs","236 lbs","237 lbs","238 lbs","239 lbs","240 lbs","241 lbs","242 lbs","243 lbs","244 lbs","245 lbs","246 lbs","247 lbs","248 lbs","249 lbs","250 lbs","251 lbs","252 lbs","253 lbs","254 lbs","255 lbs","256 lbs","257 lbs","258 lbs","259 lbs","260 lbs","261 lbs","262 lbs","263 lbs","264 lbs","265 lbs","266 lbs","267 lbs","268 lbs2169 lbs2170 lbs2171 lbs","272 lbs","273 lbs","273 lbs","274 lbs","275 lbs","275 lbs","276 lbs","277 lbs","278 lbs","279 lbs","280 lbs","281 lbs","282 lbs","283 lbs","284 lbs","285 lbs","286 lbs","287 lbs","288 lbs","289 lbs","290 lbs","291 lbs","292 lbs","293 lbs","294 lbs","295 lbs","296 lbs","297 lbs","298 lbs","299 lbs","300 lbs");	
	$phy= array("Normal","Physically challenged ","Mentally challenged");	
	$blood= array("O +ve","O -ve","A +ve","A -ve","B +ve","B -ve","A1 +ve","A1 -ve","A2 +ve","A2 -ve","AB +ve","AB -ve","A1B +ve","A1B -ve","A2B +ve","A2B -ve");
	$educ= array("Bachelors - Engineering/ Computers","Masters - Engineering/ Computers","Bachelors - Arts/ Science/Commerce/ Others","Masters - Arts/ Science/ Commerce/ Others","Finanace & Accounts","Management - BBA/ MBA/ Others","Medicine - General/ Dental/ Surgeon/ Others","Legal - BL/ ML/ LLB/ LLM/ Others","Service - IAS/ IPS/ Others","PhD","Diploma","Higher Secondary/Secondary/Schooling","Uneducated");	
	$occ= array("Salaried","Labour","Unable to Work","Looking For Job","Not Working","Self-Employed","Others");
	$emp= array("Government","Private","Business","Defence","Self-Employment","Not working");	
	$icom= array("Afghanistan - AFA","Albania - ALL","Algeria - DZD","American Samoa - USD","Andorra - EUR","Anguilla - XCD","Antarctica - XCD","Antigua and Barbuda - XCD","Argentina - ARS","Armenia - AMD","Aruba - AWG","Australia - AUD","Austria - EUR","Azerbaijan - AZM","Bahamas - BSD","Bahrain - BHD","Bangladesh - BDT","Barbados - BBD","Belarus - BYB","Belgium - EUR","Belize - BZD","Benin - XOF","Bermuda - BMD","Bhutan - BTN","Bolivia - BOB","Bosnia and Herzegovina - BAM","Botswana - BWP","Bouvet Island - NOK","Brazil - BRL","British Indian Ocean Territory - USD","British Virgin Islands - USD","Brunei - BND","Bulgaria - BGL","Burkina Faso - XOF","Burundi - BI","Cambodia - KHR","Cameroon - XAF","Canada - CAD","Cape Verde - CVE","Cayman Islands - KYD","Central African Republic - XAF","Chad - XAF","Chile - CLP","China - CNY","Christmas Island - AUD","Cocos Islands - AUD","Colombia - COP","Comoros - KMF","Congo - XAF","Cook Islands - NZD","Costa Rica - CRC","Croatia - HRK","Cuba - CUP","Cyprus - CYP","Czech Republic - CZK","Denmark - DKK","Djibouti - DJF","Dominica - XCD","Dominican Republic - DOP","East Timor - TPE","Ecuador - ECS","Egypt - EGP","El Salvador - SVC","Equatorial Guinea - XAF","Eritrea - ERN","Estonia - EEK","Ethiopia - ETB","Falkland Islands - FKP","Faroe Islands - DKK","Fiji - FJD","Finland - EUR","France - EUR","French Guiana - EUR","French Polynesia - XPF","French Southern Territories - EUR","Gabon - XAF","Gambia - GMD","Georgia - GEL","Germany - EUR","Ghana - GHC","Gibraltar - GIP","Greece - EUR","Greenland - DKK","Grenada - XCD","Guadeloupe - EUR","Guam - USD","Guatemala - QTQ","Guinea - GNF","Guinea-Bissau - GWP","Guyana - GYD","Haiti - HTG","Heard and McDonald Islands - AUD","Honduras - HNL","Hong Kong - HKD","Hungary - HUF","Iceland - ISK","India - Rs","Indonesia - IDR","Iran - IRR","Iraq - IQD","Ireland - EUR","Israel - ILS","Italy - EUR","Ivory Coast - XOF","Jamaica - JMD","Japan - JPY","Jordan - JOD","Kazakhstan - KZT","Kenya - KES","Kiribati - AUD","Korea, North - KPW","Korea, South - KRW","Kuwait - KWD","Kyrgyzstan - KGS","Laos - LAK","Latvia - LVL","Lebanon - LBP","Lesotho - LSL","Liberia - LRD","Libya - LYD","Liechtenstein - CHF","Lithuania - LTL","Luxembourg - EUR","Macau - MOP","Macedonia, Former Yugoslav Republic of - MKD","Madagascar - MGF","Malawi - MWK","Malaysia - MYR","Maldives - MVR","Mali - XOF","Malta - MTL","Marshall Islands - USD","Martinique - EUR","Mauritania - MR","Mauritius - MUR","Mayotte - EUR","Mexico - MXN","Micronesia, Federated States of - USD","Moldova - MDL","","Monaco - EUR","Mongolia - MNT","Montserrat - XCD","Morocco - MAD","Mozambique - MZM","Myanmar - MMK","Namibia - NAD","Nauru - AUD","Nepal - NPR","Netherlands - EUR","Netherlands Antilles - ANG","New Caledonia - XPF","New Zealand - NZD","Nicaragua - NIC","Niger - XOF","Nigeria - NGN","Niue - NZD","Norfolk Island - AUD","Northern Mariana Islands - USD","Norway - NOK","Oman - OMR","Pakistan - PKR","Palau - USD","Panama - PAB","Papua New Guinea - PGK","Paraguay - PYG","Peru - PEN","Philippines - PHP","Pitcairn Island - NZD","Poland - PLZ","Portugal - EUR","Puerto Rico - USD","Qatar - QAR","Reunion - EUR","Romania - ROL","Russia - RUR","Rwanda - RWF","S. Georgia and S. Sandwich Isls. - GBP","Saint Kitts & Nevis - XCD","Saint Lucia - XCD","Saint Vincent and The Grenadines - XCD","Samoa - WST","San Marino - ITL","Sao Tome and Principe - STD","Saudi Arabia - SAR","Senegal - XOF","Seychelles - SCR","Sierra Leone - SLL","Singapore - SGD","Sovakia - SK","","Slovenia - SIT","Somalia - SOD","South Africa - ZAR","Spain - EUR","Sri Lanka - LKR","St. Helena ","St. Pierre and Miquelon- EUR","Sudan - SDD","Suriname - SRG","Svalbard and Jan Mayen Islands - NOK","Swaziland - SZL","Sweden - SEK","Switzerland - CHF","Syria - SYP","Tajikistan - TJR","Tanzania - TZS","Thailand - THB","Togo - XOF","Tokelau - NZD","Tonga - TOP","Trinidad and Tobago - TTD","Tunisia - TND","Turkey - TRL","Turkmenistan - TMM","Turks and Caicos Islands - USD","Tuvalu - AUD","Uganda - UGS","Ukraine - UAG","United Arab Emirates - AED","United Kingdom - GBP","United States of America - USD","Uruguay - UYP","Uzbekistan - UZS","Vanuatu - VUV","Vatican City - EUR","Venezuela - VUB","Vietnam - VND","Virgin Islands - USD","Wallis and Futuna Islands - XPF","Western Sahara - MAD","Yemen - YER","Yugoslavia (Former) - YUN","Zaire - CDF","Zambia - ZMK","Zimbabwe - ZWD");
	$star= array("Anuradha / Anusham / Anizham","Ardra / Thiruvathira","Ashlesha / Ayilyam","Ashwini / Ashwathi","Bharani","Chitra / Chitha","Dhanista / Avittam","Hastha / Atham","Jyesta / Kettai","Krithika / Karthika","Makha / Magam","Moolam / Moola","Mrigasira / Makayiram","Poorvabadrapada / Puratathi","Poorvapalguni / Puram / Pubbhe","Poorvashada / Pooradam","Punarvasu / Punarpusam","Pushya / Poosam / Pooyam","Revathi","Rohini","Shatataraka / Sadayam / Satabishek","Shravan / Thiruvonam","Swati / Chothi","Uttarabadrapada / Uthratadhi","Uttarapalguni / Uthram","Uttarashada / Uthradam","Vishaka /Vishakam");	
	$rasi= array("Mesh (Aries)","Vrishabh (Taurus)","Mithun (Gemini)","Kark (Cancer)","Simha (Leo)","Kanya (Virgo)","Thul (Libra)","Vrishchik (Scorpio)","Dhanu (Sagittarius)","Makar (Capricorn)","Kumbh (Aquarius)","Meen (Pisces)");	
	$noc= array("0","1","2","3","4","5","5+");	
	
if(($_REQUEST['action']=='edit') || ($_REQUEST['action']=='view'))
{
	$matrimony=new matrimony();
	$condition=" where ProfileId='".$_GET['Id']."'";
	$matrimony->switchqry('tm_profile','SELECT',$condition,'*');
	$value=mysql_fetch_array($matrimony->qry_result);
	$disabled='disabled';
	 for($i=0; $i<sizeof($crby); $i++) { if($value['CreatedBy']==$crby[$i]) { $srby[$i]='selected';  } else { $srby[$i]=''; } }
	 for($i=0; $i<sizeof($pcat); $i++) { if($value['ProfileCategory']==$pcat[$i]) { $spcat[$i]='selected';  } else { $spcat[$i]=''; } }
	 for($i=0; $i<sizeof($month); $i++) { if($value['DOB']==$month[$i]) { $smonth[$i]='selected';  } else { $smonth[$i]=''; } }
	 for($i=0; $i<sizeof($date); $i++) { if($value['DOB']==$date[$i]) { $sdate[$i]='selected';  } else { $sdate[$i]=''; } }
	 for($i=0; $i<sizeof($cat); $i++) { if($value['MaritialStatus']==$cat[$i]) { $selc[$i]='selected';  } else { $selc[$i]=''; } }
	 for($i=0; $i<sizeof($reli); $i++) { if($value['Religion']==$reli[$i]) { $sreli[$i]='selected';  } else { $sreli[$i]=''; } }	
	 for($i=0; $i<sizeof($hight); $i++) { if($value['Height']==$hight[$i]) { $shight[$i]='selected';  } else { $shight[$i]=''; } }	
	 for($i=0; $i<sizeof($wight); $i++) { if($value['Weight']==$wight[$i]) { $swight[$i]='selected';  } else { $swight[$i]=''; } }
	 for($i=0; $i<sizeof($laps); $i++) { if($value['WeightLBS']==$laps[$i]) { $slaps[$i]='selected';  } else { $slaps[$i]=''; } }	
	 for($i=0; $i<sizeof($phy); $i++) { if($value['PhysicalStatus']==$phy[$i]) { $sphy[$i]='selected';  } else { $sphy[$i]=''; } }
	 for($i=0; $i<sizeof($blood); $i++) { if($value['BloodGroup']==$blood[$i]) { $sblood[$i]='selected';  } else { $sblood[$i]=''; } }
	 for($i=0; $i<sizeof($educ); $i++) { if($value['EducationCat']==$educ[$i]) { $sedu[$i]='selected';  } else { $sedu[$i]=''; } }	
	 for($i=0; $i<sizeof($occ); $i++) { if($value['Occupation']==$occ[$i]) { $socc[$i]='selected';  } else { $socc[$i]=''; } }
	 for($i=0; $i<sizeof($emp); $i++) { if($value['Employementtype']==$emp[$i]) { $semp[$i]='selected';  } else { $semp[$i]=''; } }
	 for($i=0; $i<sizeof($icom); $i++) { if($value['AnnCurrency']==$icom[$i]) { $sicom[$i]='selected';  } else { $sicom[$i]=''; } }
	 for($i=0; $i<sizeof($star); $i++) { if($value['Star']==$star[$i]) { $sstar[$i]='selected';  } else { $sstar[$i]=''; } }
	 for($i=0; $i<sizeof($rasi); $i++) { if($value['Raasi']==$rasi[$i]) { $srasi[$i]='selected';  } else { $srasi[$i]=''; } }
	 for($i=0; $i<sizeof($noc); $i++) { if($value['NoofChildren']==$noc[$i]) { $snoc[$i]='selected';  } else { $snoc[$i]=''; } }
}
?>

<h2><? if($action=="edit"){echo "Edit";}else if($action=="view"){echo "View"; }else{echo "Add";}?> User </h2>
<b><a href="<? echo $link;?>">Go Back</a> </b>
<form action="" method="post" name="frmPost" enctype="multipart/form-data" class="box">
<div id="pickId" style="position:absolute; top:150px;  left:279px; display:none; z-index:1000" ></div> 
  <table class="postad" width="100%" border="0">
<tbody>
<tr>
		<td width="16%"><b>User Id :</b><span class="marker">*</span></td>
		<input type="hidden" id="profileid" name="profileid" value="<? echo $value['ProfileId']; ?>" size="40" maxlength="15" />
		<td width="84%">
			<input name="txtLogin" id="txtLogin" type="text" class="textfield" maxlength="15" size="40"  value="<? echo $value['LoginId']; ?>" <? echo $disabled; ?> onblur="txt_empty('txtLogin','useridError','Enter your LoginId');if(document.getElementById('txtLogin').value != ''){ return showlogin(txtLogin.value,'login','LoginId','tm_profile','useridError'); }" onChange="capWords('txtLogin');"  >
			<input name="logintextfield" type="hidden" id="logintextfield"  value="" />
			<div style="width:25.5%; float:left; color:red" id="useridError" ></div>
		<!--<input type="text" id="userid" name="userid" value="<? echo $value['LoginId']; ?>" <? echo $disabled; ?> size="40" maxlength="15" />--></td>
</tr>

<tr>
	 <td><b>EmailId :</b> <span class="marker">*</span></td>
	 <td>
		<input name="txtEmail" id="txtEmail" type="text" class="textfield" value="<? echo $value['EmailId']; ?>" <?  echo $disabled;?> maxlength="40" size="40" onBlur="if(document.getElementById('txtEmail').value==''){txt_empty('txtEmail','emailError','Enter your EmailId');}else{email_validation('txtEmail','emailError','Enter your valid EmailId','EmailId','tm_profile');}" />
		<input name="emailtextfield" type="hidden" id="emailtextfield"  />
		<div style="width:25.5%; float:left; color:red" id="emailError" ></div>
		<!--<input name="useremail" id="useremail" size="40" maxlength="100" value="<? echo $value['EmailId']; ?>" <?  echo $disabled;?> type="text">&nbsp;
	 <input type="hidden" name="emailtextfield" id="emailtextfield" />--></td>
  </tr>
  
  <tr>
	 <td><b>Password: <span class="marker">*</span></b></td>
	 <td><input name="userpassword" type="password" id="userpassword" value="<? echo $value['Password']; ?>" <? echo $disabled; ?> size="40" maxlength="15"></td>
  </tr>
<? if($_REQUEST['action']!='view') { ?>
 <tr>
	 <td><b>Confirm Password: <span class="marker">*</span></b></td>
	 <td><input name="conpassword" type="password" id="conpassword" value="<? echo $value['Password']; ?>" <? echo $disabled; ?> size="40" maxlength="15"></td>
  </tr>
  <? }?>
  <tr>
	 <td height="22" valign="top"><b>Created By :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlProfile" id="ddlProfile" class="textfield" style="height:18px; width:215px;" <? echo $disabled; ?> >
	<option>- Select -</option>
	<? for($i=0; $i<count($crby); $i++) { echo '<option value="'.$crby[$i].'"'.$srby[$i].'>'.$crby[$i].'</option>'; } ?>
	</select>	 
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Profile Category :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlPrefer" id="ddlPrefer" class="textfield" style="height:18px; width:215px;" <? echo $disabled; ?> >
	<option>- Select - </option>
	<? for($i=0; $i<count($pcat); $i++) { echo '<option value="'.$pcat[$i].'"'.$spcat[$i].'>'.$pcat[$i].'</option>'; } ?>
	</select>
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>First Name :</b> <span class="marker">*</span></td>
	<td>
	<input type="text" id="fname" name="fname" value="<? echo $value['FirstName']; ?>" <? echo $disabled; ?> size="40" maxlength="15" onChange="capWords('fname');" /></td>
	<div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Middle Name :</b> </td>
	<td>
	<input type="text" id="mname" name="mname" value="<? echo $value['MiddleName']; ?>" <? echo $disabled; ?> onChange="capWords('mname');" size="40" maxlength="15" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Last Name :</b> <span class="marker">*</span></td>
	<td>
	<input type="text" id="lname" name="lname" value="<? echo $value['LastName']; ?>" <? echo $disabled; ?> size="40" maxlength="15" onChange="capWords('lname');"/></td>
	<div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Gender :</b> <span class="marker">*</span></td>
	<td>
<input type="radio" name="type" id="type" value="M" <?  if($value['Gender']=='M') { echo "checked"; } ?> <? echo $disabled; ?> onClick="gender_year('ddlYear','21','50')" checked="checked">Male
<input type="radio" name="type" id="type1" value="F" <? if($value['Gender']=='F') { echo "checked"; } ?> <? echo $disabled; ?> onClick="gender_year('ddlYear','18','53')" >Female
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Date Of Birth :</b> <span class="marker">*</span></td>
	<td>
	
	<input name="jscal_field_date_start" id="jscal_field_date_start" type="text" readonly="readonly" value="<? echo $value['DOB']; ?>" style="width:215px;" <? echo $disabled; ?>  onchange="getval('<? echo Date('Y'); ?>','jscal_field_date_start','age');" />
	<? if($_REQUEST['action']!='view') { ?>
      <span class="whiteTextBold"><img src="../images/calendar.gif" title="Select Date" id="jscal_trigger_date_start" align="bottom" style="cursor:pointer;"/> </span>
	  <? } ?>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Age :</b> <span class="marker">*</span></td>
	<td>
	<input onkeypress ="return numbersonly(this,event)" type="text" id="age" name="age" value="<? echo $value['Age']; ?>" <? echo $disabled; ?> 
	 size="10" maxlength="2" onKeyUp="return char_val(this,'0123456789');"/></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Maritial Status :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlMarital" id="ddlMarital" class="textfield" style="height:18px; width:215px;" onChange="ddl_enable('ddlMarital','ddlChildren','childError','radioL','radioNL');ddlClear('ddlMarital','maritalError');if(document.getElementById('ddlChildren').disabled == true){ddlClear('ddlChildren','childError');}" <? echo $disabled; ?>>
	<option>- Select -</option>
	<? for($i=0; $i<count($cat); $i++) { echo '<option value="'.$cat[$i].'"'.$selc[$i].'>'.$cat[$i].'</option>'; } ?>
	</select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>No Of Children :</b> </td>
	<td>
	 <select name="ddlChildren" id="ddlChildren" class="textfield" style="width:215px; height:18px;" <? echo $disabled; ?> onChange="rad_enable('ddlChildren','radioL','radioNL');ddlClear('ddlMarital','maritalError');ddlClear('ddlChildren','childError')" disabled="true" >
	 <option>- Select -</option>
	 <? for($i=0; $i<count($noc); $i++) { echo '<option value="'.$noc[$i].'"'.$snoc[$i].'>'.$noc[$i].'</option>'; } ?>
	 </select>
	 </td><div id="maritalError" style="display:none;"> </div><div id="childError" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Children Living Status :</b> </td>
	<td>
	<input name="radioChildStatus" id="radioL" type="radio" value="Living" <? echo $disabled; ?> disabled="disabled" >Living with me
	<input name="radioChildStatus" id="radioNL" type="radio" value="Not Living" <? echo $disabled; ?> disabled="disabled"> Not living with me
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Citizenchip :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlCitizen" id="ddlCitizen" class="textfield" style="width:215px; height:18px;" onBlur="gethdValue('ddlCitizen','citizenHd');ddlEmptyChk('ddlCitizen','citizenError','Select your Citizenship');"  onchange="ddlClear('ddlCitizen','citizenError')" <? echo $disabled; ?>>
		<?php
		$country=explode("|",$countryValue);
		$countCountry=count($country);				    									   					    
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>' <? if($value['Citizenchip']==$country[$i]) { echo 'selected';  } ?> ><? echo $country[$i];?></option>
		<?
		}
		?>
		</select>
		<input type="hidden" name="citizenHd" id="citizenHd" value="<?=$value['Citizenchip']?>">
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Residing Country :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlCountry" id="ddlCountry" class="textfield" style="width:215px; height:18px;" onChange="gethdValue('ddlCountry','countryHd');getLocation('',this.value,'','statediv','second','state','');FillCcode_ph('tele_country','ddlCountry');" <? echo $disabled; ?> >
		<?php
		for($i=0;$i<count($country);$i++)
		{
		?>
		<option style="width:112px;" value='<?=$i;?>' <? if($value['ResidingCountry']==$country[$i]) { echo 'selected';  } ?> ><? echo $country[$i];?></option>
		<?
		}
		?>
		</select>
		<input type="hidden" name="countryHd" id="countryHd"  value="<?=$value['ResidingCountry']?>">
		</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Religion :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlReligion" id="ddlReligion" class="textfield" style="height:18px; width:215px;" onChange="FillCommunity('ddlReligion','ddlCommunity');ddl_disable('ddlReligion','ddlCommunity','communityError');"<? echo $disabled; ?>>
	<option>- Select -</option>
	<? for($i=0; $i<count($reli); $i++) { echo '<option value="'.$reli[$i].'"'.$sreli[$i].'>'.$reli[$i].'</option>'; } ?>
    </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>CastDivision :</b> <span class="marker">*</span></td>
	<td>
	  <select name="ddlCommunity" id="ddlCommunity" class="textfield" style="height:18px; width:215px;" <? echo $disabled; ?>>
		<option>- Select -</option>
		<option selected="selected"><? echo $value['CastDivision']; ?></option>
	  </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Subcaste :</b> </td>
	<td>
	<input type="text" id="subcaste" name="subcaste" value="<? echo $value['Subcaste']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="40" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>State :</b> <span class="marker">*</span></td>
	<td>
	<div id="statediv" class="form_31_red" style="height:20px; ">
		<select name="ddlstate" id="ddlstate" class="textfield" style="height:18px; width:215px;" <? echo $disabled; ?>>
		<? if($action=="edit" || $action=="view"){ ?>
		<option>- Select -</option>
		<option selected="selected"><? echo $value['State']; ?></option>
		<? }else{?>
		<option>- Select -</option>
		<? } ?>
		</select>
		<input type="hidden" name="stateHd" id="stateHd" value="<?=$value['State'];?>">
		</div>
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>City :</b> <span class="marker">*</span></td>
	<td>
	<input type="text" id="city" name="city" value="<? echo $value['City']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="40" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Zip :</b> </td>
	<td>
	<input type="text" id="zip" name="zip" value="<? echo $value['Zip']; ?>" <? echo $disabled; ?> size="40" maxlength="15" onKeyUp="document.getElementById('zip').value=document.getElementById('zip').value.toUpperCase();"/></td>
	<div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Country Code :</b> <span class="marker">*</span></td>
	<td>
	<input type="text" id="tele_country" name="tele_country" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Tele_country']; ?>" <? echo $disabled; ?> 
	 size="10" maxlength="5" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Std Code :</b> <span class="marker">*</span></td>
	<td>
	<input type="text" id="tele_std" name="tele_std" onKeyUp="return char_val(this,'0123456789');" value="<? echo $value['Tele_std']; ?>" <? echo $disabled; ?> 
	 size="10" maxlength="5" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Phone Number :</b> <span class="marker">*</span></td>
	<td>
	<input onKeyUp="return char_val(this,'0123456789');" type="text" id="tele_Phone" name="tele_Phone" value="<? echo $value['Tele_Phone']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="15" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Mobile Number :</b> <span class="marker">*</span></td>
	<td>
	<input  type="text" id="tee_mobile" name="tee_mobile" value="<? echo $value['Tee_mobile']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="15" onKeyUp="return char_val(this,'0123456789');"/></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Food :</b> <span class="marker">*</span></td>
	<td>
	<input type="radio" name="rfood" id="food" value="Vegetarian" <?  if($value['Food']=='Vegetarian') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Vegetarian
	&nbsp;&nbsp;<input type="radio" name="rfood" id="food1" value="Non-Vegetatrian" <? if($value['Food']=='Non-Vegetatrian') { echo "checked"; } ?> <? echo $disabled; ?>  >Non-Vegetatrian
	<input type="radio" name="rfood" id="food2" value="Eggetarian" <? if($value['Food']=='Eggetarian') { echo "checked"; } ?> <? echo $disabled; ?>  >Eggetarian
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Smoking :</b> <span class="marker">*</span></td>
	<td>
	<input type="radio" name="smoke" id="smoke" value="Non-Smoker" <?  if($value['Smoking']=='Non-Smoker') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Non-Smoker
	<input type="radio" name="smoke" id="smoke1" value="Regular" <? if($value['Smoking']=='Regular') { echo "checked"; } ?> <? echo $disabled; ?> >Regular 
	<input type="radio" name="smoke" id="smoke2" value="Occasionally" <? if($value['Smoking']=='Occasionally') { echo "checked"; } ?> <? echo $disabled; ?> >Occasionally
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Drinking :</b> <span class="marker">*</span></td>
	<td>
	<input type="radio" name="drink" id="drink" value="Non-liquor" <?  if($value['Drinking']=='Non-Smoker') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Non-liquor
	&nbsp;&nbsp;&nbsp;<input type="radio" name="drink" id="drink1" value="Regular" <? if($value['Drinking']=='Regular') { echo "checked"; } ?> <? echo $disabled; ?> >Regular  
	<input type="radio" name="drink" id="drink2" value="Occasionally" <? if($value['Drinking']=='Occasionally') { echo "checked"; } ?> <? echo $disabled; ?> >Occasionally
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Complaexion :</b> <span class="marker">*</span></td>
	<td>
	<input type="radio" name="rcomplex" id="rcomplex" value="Very Fair" <?  if($value['Complaexion']=='Very Fair') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Very Fair
	<input type="radio" name="rcomplex" id="rcomplex1" value="Fair" <? if($value['Complaexion']=='Fair') { echo "checked"; } ?> <? echo $disabled; ?> >Fair   
	<input type="radio" name="rcomplex" id="rcomplex2" value="Wheatish" <? if($value['Complaexion']=='Wheatish') { echo "checked"; } ?> <? echo $disabled; ?> >Wheatish 
	<input type="radio" name="rcomplex" id="rcomplex3" value="Brown" <? if($value['Complaexion']=='Brown') { echo "checked"; } ?> <? echo $disabled; ?> >Wheatish Brown
	<input type="radio" name="rcomplex" id="rcomplex4" value="Dark" <? if($value['Complaexion']=='Dark') { echo "checked"; } ?> <? echo $disabled; ?> >Dark
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Body Type :</b> <span class="marker">*</span></td>
	<td>
	<input type="radio" name="rbody" id="rbody" value="Average" <?  if($value['BodyType']=='Average') { echo "checked"; } ?> <? echo $disabled; ?> checked="checked" >Average 
	<input type="radio" name="rbody" id="rbody1" value="Athletic" <? if($value['BodyType']=='Athletic') { echo "checked"; } ?> <? echo $disabled; ?> >Athletic    
	<input type="radio" name="rbody" id="rbody2" value="Slim" <? if($value['BodyType']=='Slim') { echo "checked"; } ?> <? echo $disabled; ?> >Slim  
	<input type="radio" name="rbody" id="rbody3" value="Heavy" <? if($value['BodyType']=='Heavy') { echo "checked"; } ?> <? echo $disabled; ?> >Heavy
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <tr>
	 <td height="22" valign="top"><b>Height :</b> <span class="marker">*</span></td>
	<td> 
		<select name="ddlfeet" id="ddlfeet" class="textfield" style="height:18px; width:215px;" onChange="ddlClear('ddlfeet','heightError');" <? echo $disabled; ?> >
		<option>- Feet/Inch/Cm -</option>
		<? for($i=0; $i<count($hight); $i++) { echo '<option value="'.$hight[$i].'"'.$shight[$i].'>'.$hight[$i].'</option>'; } ?>
		</select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Weight :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlkgs" id="ddlkgs" class="textfield"  style="height:18px; width:215px;" onChange="ddlClear('ddlkgs','weightError');" <? echo $disabled; ?>>
	<option>- Kgs -</option>
	<? for($i=0; $i<count($wight); $i++) { echo '<option value="'.$wight[$i].'"'.$swight[$i].'>'.$wight[$i].'</option>'; } ?>
    </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  <!-- <tr>
	 <td height="22" valign="top"><b>WeightLBS :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddllbs" id="ddllbs" class="textfield" style="height:18px; width:215px;" onChange="ddlClear('ddllbs','weightError');" <? echo $disabled; ?>>
	<option >- Lbs -</option>
	<? //for($i=0; $i<count($laps); $i++) { echo '<option value="'.$laps[$i].'"'.$slaps[$i].'>'.$laps[$i].'</option>'; } ?>
	</select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>-->
  
   <tr>
	 <td height="22" valign="top"><b>Physical Status :</b> <span class="marker">*</span></td>
	<td>
	<select name="ddlphysical" id="ddlphysical" class="textfield" style="height:18px; width:215px;" onChange="ddlClear('ddlphysical','statusError');" <? echo $disabled; ?>>
	<option>- Select - </option>
	<? for($i=0; $i<count($phy); $i++) { echo '<option value="'.$phy[$i].'"'.$sphy[$i].'>'.$phy[$i].'</option>'; } ?>
    </select> 
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>BloodGroup :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddlblood" id="ddlblood" class="textfield" style="height:18px; width:215px;" onChange="ddlClear('ddlblood','bloodError');" <? echo $disabled; ?>>
	 <option>- Select - </option>
	 <? for($i=0; $i<count($blood); $i++) { echo '<option value="'.$blood[$i].'"'.$sblood[$i].'>'.$blood[$i].'</option>'; } ?>
	 </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Education Catacary :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddle_category" id="ddle_category" class="textfield"  style="height:18px; width:215px;"  onchange="FillQualification('ddle_category','ddle_qual');ddlClear('ddle_category','categoryError'); Edu('ddle_category','ddle_qual','qualError')" <? echo $disabled; ?>>
	<option>- Select -</option>
	<? for($i=0; $i<count($educ); $i++) { echo '<option value="'.$educ[$i].'"'.$sedu[$i].'>'.$educ[$i].'</option>'; } ?>
    </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Education Qualification :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddle_qual" id="ddle_qual" class="textfield"  style="width:215px; height:18px;" onChange="ddlClear('ddle_qual','qualError');" onFocus="setcolor('edu');" <? echo $disabled; ?>>
	 <option>- Select -</option>
	 <option selected="selected"><? echo $value['EducationQual']; ?></option>
	 </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Education Specialization :</b> </td>
	<td>
	<input type="text" id="eduspecialization" name="eduspecialization" value="<? echo $value['EducationSpecialization']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="15" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Occupation :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddlocc" id="ddlocc" class="textfield" style="height:18px; width:215px;" onChange="ddl_enable1('ddlocc','ddlemptype','ddlincome','txtincome','emptypeError','incomeError');" <? echo $disabled; ?>>
	 <option>- Select - </option>
	 <? for($i=0; $i<count($occ); $i++) { echo '<option value="'.$occ[$i].'"'.$socc[$i].'>'.$occ[$i].'</option>'; } ?>
	 </select>
	 </td><div id="emptypeError" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Employement type :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddlemptype" id="ddlemptype" class="textfield" style="height:18px; width:215px;" <? echo $disabled; ?>>
	 <option>- Select -</option>
	 <? for($i=0; $i<count($emp); $i++) { echo '<option value="'.$emp[$i].'"'.$semp[$i].'>'.$emp[$i].'</option>'; } ?>
	 </select>
	 </td><div id="incomeError" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Currency :</b></td>
	<td>
	 <select name="ddlincome" id="ddlincome" class="textfield" style="width:95px; height:18px;" onChange="ddlClear('ddlincome','incomeError');ddl_enablefun(this,'txtincome');"onfocus="setcolor('occ');" <? echo $disabled; ?>>
	<option>- Select -</option>
	<? for($i=0; $i<count($icom); $i++) { echo '<option value="'.$icom[$i].'"'.$sicom[$i].'>'.$icom[$i].'</option>'; } ?>
	</select>
	
	<input name="txtincome" id="txtincome"  type="text" maxlength="10" style="height:18px;" class="textfield" size="20" onKeyUp="return char_val(this,'0123456789');" <? echo $disabled; ?>/> 	</td>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Gothram :</b> <span class="marker"></span></td>
	<td>
	<input type="text" id="gothram" name="gothram" value="<? echo $value['Gothram']; ?>" <? echo $disabled; ?> 
	 size="40" maxlength="20" /></td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Star :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddlstar" id="ddlstar" class="textfield" style=" height:18px; width:215px;" <? echo $disabled; ?>>
	 <option> - Star -</option>
	 <? for($i=0; $i<count($star); $i++) { echo '<option value="'.$star[$i].'"'.$sstar[$i].'>'.$star[$i].'</option>'; } ?>
	 </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Raasi :</b> <span class="marker">*</span></td>
	<td>
	 <select name="ddlrassi" id="ddlrassi" class="textfield" style="height:18px; width:215px;" onChange="ddlClear('ddlrassi','rassiError');" <? echo $disabled; ?>>
	 <option>- Rassi -</option>
	 <? for($i=0; $i<count($rasi); $i++) { echo '<option value="'.$rasi[$i].'"'.$srasi[$i].'>'.$rasi[$i].'</option>'; } ?>
	 </select>
	 </td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>KujaDhosam :</b></td>
	<td>
		<input type="radio" name="rdosham" id="dosham" value="Yes" <?  if($value['KujaDhosam']=='Yes') { echo "checked"; } ?> <? echo $disabled; ?> >Yes
		<input type="radio" name="rdosham" id="dosham1" value="No" checked="checked" <? if($value['KujaDhosam']=='No') { echo "checked"; } ?> <? echo $disabled; ?>  >No
		<input type="radio" name="rdosham" id="dosham2" value="Dont Know" <? if($value['KujaDhosam']=='Dont Know') { echo "checked"; } ?> <? echo $disabled; ?>  >Don't know
	</td><div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>Address :</b> <span class="marker">*</span></td>
	<td>
	<textarea id="address" name="address" value="" <? echo $disabled; ?> maxlength="250" cols="60" rows="5" /><? echo $value['Address']; ?></textarea></td>
	<div id="dbvalue" style="display:none;"> </div>
  </tr>
  
   <tr>
	 <td height="22" valign="top"><b>AboutMe :</b></td>
	<td>
	<textarea id="aboutme" name="aboutme" value="" <? echo $disabled; ?> maxlength="250" cols="60" rows="5" /><? echo $value['AboutMe']; ?></textarea></td>
	<div id="dbvalue" style="display:none;"> </div>
  </tr>
  
  </tbody>
  </table>
  <table border="0">
  <tr>
  <td>
  <? if(($_REQUEST['action']!='edit') && ($_REQUEST['action']!='view')) { ?>
<br><span id="savespan"  style="display:;"> <button  type="submit" name="submit_list" id="submit_list" value="2" onClick="return validate()">Save</button></span>
<? } if($_REQUEST['action']=='edit') {?>
<span id="editspanid" style="display:block;"><button type="button" onClick="TXTEnable('txtLogin|txtEmail|userpassword|conpassword|ddlProfile|ddlPrefer|fname|mname|lname|type|type1|jscal_field_date_start|age|ddlMarital|ddlChildren|radioL|radioNL|ddlCitizen|ddlCountry|ddlReligion|ddlCommunity|subcaste|ddlstate|city|zip|tele_country|tele_std|tele_Phone|tee_mobile|food|food1|food2|smoke|smoke1|smoke2|drink|drink1|drink2|rcomplex|rcomplex1|rcomplex2|rcomplex3|rcomplex4|rbody|rbody1|rbody2|rbody3|ddlfeet|ddlkgs|ddlphysical|ddlblood|ddle_category|ddle_qual|eduspecialization|ddlocc|ddlemptype|ddlincome|txtincome|gothram|ddlstar|ddlrassi|dosham|dosham1|dosham2|address|aboutme');DISStyle('updatespanid');DISStylenone('editspanid');" >Edit</button></span>
<span id="updatespanid" style="display:none"><button type="submit" onClick="return update();">Update</button></span>
</td>
<!--<td>
<span id="delspanid" style="display:"><button type="submit" onClick="TXTEnable('userid');document.frmPost.action='postUser.php?action=delete'">Delete</button></span>
</td>-->
<!--<td>
<input name="verify" value="Verify" class="button" onclick="return check('Verify')" type="submit" style="cursor:pointer">
</td><td>
<input name="active" type="submit" class="button" id="active" value="Active" onclick="return check('Activate')" style="cursor:pointer"></td><td>
<input name="pending" type="submit" class="button" id="pending" value="Pending" onclick="return check('Pending')" style="cursor:pointer"></td><td>
<input name="suspend" value="Blocked" class="cautionbutton" onClick="return check('Block')" type="submit" style="cursor:pointer"></td><td>
<? //} if(($_REQUEST['action']!='view')&&($_REQUEST['action']!='edit')) {?>
<input type="button" value="RESET" class="button" onClick="TXTClear('username|useremail|userpassword|usercpassword|usercontactnumber'); TXTEnable('username|useremail|userpassword|usercpassword|usercontactnumber');" style="cursor:pointer">
<?// } if(($_REQUEST['action']!='view')&&($_REQUEST['action']=='edit')) {?>
<input type="button" value="RESET" class="button" onClick="TXTClear('username|useremail|userpassword|usercpassword|usercontactnumber'); TXTEnable('username|useremail|userpassword|usercpassword|usercontactnumber');DISStylenone('editspanid');DISStyle('updatespanid');" style="cursor:pointer"> 

</td>--><? } ?></tr></table>
</td>
</form>
<script language="javascript" type="text/javascript">
function checkall(state) { 
	var n = frmAds.elements.length; for (i=0; i<n; i++) { if (frmAds.elements[i].name == "ad[]") frmAds.elements[i].checked = state; } }

function validate() {
var frm = document.frmPost;
	var error = new Array();
	var errorMessage = "";
	var i,j,k;
	error[0] = checkText(frm.txtLogin) ? "" : "User Name is empty"; 
	error[1] = checkText(frm.txtEmail) ? "" : "MailID is empty";
	error[2] = checkText(frm.userpassword) ? "" : "Password is empty";
	error[3] = checkText(frm.conpassword) ? "" : "Confirm Password is empty";
	error[4] = checkSelected(frm.ddlProfile) ? "" : "Please Select Profile Status";
	error[5] = checkSelected(frm.ddlPrefer) ? "" : "Please Select Creadtedby";
	error[6] = checkText(frm.fname) ? "" : "First Name is empty";
	error[7] = checkText(frm.lname) ? "" : "Last Name is empty";
	error[8] = checkText(frm.jscal_field_date_start) ? "" : "Please select Date Of Birth";
	error[9] = checkSelected(frm.ddlMarital) ? "" : "Marital Status is empty";
	error[10] = checkSelected(frm.ddlCitizen) ? "" : "Please select citizenchip";
	error[11] = checkSelected(frm.ddlCountry) ? "" : "Country  is empty";
	error[12] = checkSelected(frm.ddlReligion) ? "" : "Religion is empty";
	error[13] = checkSelected(frm.ddlCommunity) ? "" : "castdivision is empty";
	error[14] = checkSelected(frm.ddlstate) ? "" : "state is empty";
	error[15] = checkText(frm.city) ? "" : "city is empty"; 
	error[16] = checkText(frm.tele_country) ? "" : "country code is empty";
	error[17] = checkText(frm.tele_std) ? "" : "std code is empty";
	error[18] = checkText(frm.tele_Phone) ? "" : "phone no is citizenchip";
	error[19] = checkText(frm.tee_mobile) ? "" : "Mobil number  is empty";
	error[20] = checkSelected(frm.ddlfeet) ? "" : "Hight is empty";
	error[21] = checkSelected(frm.ddlkgs) ? "" : "Wight is empty";
	error[22] = checkSelected(frm.ddlphysical) ? "" : "Physical status is empty";
	error[23] = checkSelected(frm.ddlblood) ? "" : "Blood Group is empty";
	error[24] = checkSelected(frm.ddle_category) ? "" : "Educational category is empty";
	error[25] = checkSelected(frm.ddle_qual) ? "" : "Educational qualification is empty";
	error[26] = checkSelected(frm.ddlocc) ? "" : "Occpation is empty";
	if(document.getElementById('ddlemptype').disabled==false){
		error[27] = checkSelected(frm.ddlemptype) ? "" : "Employee type is empty";
	}
	error[28] = checkSelected(frm.ddlstar) ? "" : "Star is empty";
	error[29] = checkSelected(frm.ddlrassi) ? "" : "Rassi type is empty";
	error[30] = checkText(frm.address) ? "" : "Address is empty"; 
	if(frm.userpassword.value!=frm.conpassword.value){
	error[31] ="New Password & Confirm Password Should be same" ;
	}
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postUser.php';  }
	else { alert(errorMessage); return false; } 

	var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(document.getElementById('txtEmail').value.match(email))
	{
	return true;
	}
	else 
	{
		alert("Please enter a valid email address");
		//document.getElementById('err7').innerHTML="Please enter a valid email address";
		document.getElementById('txtEmail').focus();
		return false;
	}
}
	
	
function update() {
	var frm = document.frmPost;
	var error = new Array();
	var errorMessage = "";
	var i,j,k;
	error[0] = checkText(frm.txtLogin) ? "" : "User Name is empty"; 
	error[1] = checkText(frm.txtEmail) ? "" : "MailID is empty";
	error[2] = checkText(frm.userpassword) ? "" : "Password is empty";
	error[3] = checkText(frm.conpassword) ? "" : "Confirm Password is empty";
	error[4] = checkSelected(frm.ddlProfile) ? "" : "Please Select Profile Status";
	error[5] = checkSelected(frm.ddlPrefer) ? "" : "Please Select Creadtedby";
	error[6] = checkText(frm.fname) ? "" : "First Name is empty";
	error[7] = checkText(frm.lname) ? "" : "Last Name is empty";
	error[8] = checkText(frm.jscal_field_date_start) ? "" : "Please select Date Of Birth";
	error[9] = checkSelected(frm.ddlMarital) ? "" : "Marital Status is empty";
	error[10] = checkSelected(frm.ddlCitizen) ? "" : "Please select citizenchip";
	error[11] = checkSelected(frm.ddlCountry) ? "" : "Country  is empty";
	error[12] = checkSelected(frm.ddlReligion) ? "" : "Religion is empty";
	error[13] = checkSelected(frm.ddlCommunity) ? "" : "castdivision is empty";
	error[14] = checkSelected(frm.ddlstate) ? "" : "state is empty";
	error[15] = checkText(frm.city) ? "" : "city is empty"; 
	error[16] = checkText(frm.tele_country) ? "" : "country code is empty";
	error[17] = checkText(frm.tele_std) ? "" : "std code is empty";
	error[18] = checkText(frm.tele_Phone) ? "" : "phone no is citizenchip";
	error[19] = checkText(frm.tee_mobile) ? "" : "Mobil number  is empty";
	error[20] = checkSelected(frm.ddlfeet) ? "" : "Hight is empty";
	error[21] = checkSelected(frm.ddlkgs) ? "" : "Wight is empty";
	error[22] = checkSelected(frm.ddlphysical) ? "" : "Physical status is empty";
	error[23] = checkSelected(frm.ddlblood) ? "" : "Blood Group is empty";
	error[24] = checkSelected(frm.ddle_category) ? "" : "Educational category is empty";
	error[25] = checkSelected(frm.ddle_qual) ? "" : "Educational qualification is empty";
	error[26] = checkSelected(frm.ddlocc) ? "" : "Occpation is empty";
	if(document.getElementById('ddlemptype').disabled==false){
		error[27] = checkSelected(frm.ddlemptype) ? "" : "Employee type is empty";
	}
	error[28] = checkSelected(frm.ddlstar) ? "" : "Star is empty";
	error[29] = checkSelected(frm.ddlrassi) ? "" : "Rassi type is empty";
	error[30] = checkText(frm.address) ? "" : "Address is empty"; 
	if(frm.userpassword.value!=frm.conpassword.value){
	error[31] ="New Password & Confirm Password Should be same" ;
	}
	for(i= 0 ;i<error.length; ++i) {
		if (error[i] != undefined) { errorMessage+= error[i] != "" ? " * " +error[i]+"\n" : ""; } }
	if(errorMessage == "") { frm.action='postUser.php?action=update';  }
	else { alert(errorMessage); return false; }
	
	var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(document.getElementById('txtEmail').value.match(email))
	{
	return true;
	}
	else 
	{
		alert("Please enter a valid email address");
		//document.getElementById('err7').innerHTML="Please enter a valid email address";
		document.getElementById('txtEmail').focus();
		return false;
	}
 }
	
	function check(id) 
		{frm = document.frmPost;
		var tick = frm.userid;
		var flag = 0;
		if(tick.value) {
		flag = 1;
		if(id=='Pending') 
		{if(confirm('Are you sure you want to move Selected User to Pending'))
		{document.frmPost.action; document.frmPost.submit();
		return true; }
		else { return false;  }	}else {
		if(confirm(id+' Selected User'))
		{document.frmPost.action; document.frmPost.submit(); return true; }
		else { return false; } } }
		if(flag == 0) { alert("Select a User to "+id); return false; } }
		
		
		function getval(id1,id2,results)
		{
		var a2=document.getElementById(id2).value;
		sp = a2.split("-",3);
		var add1=parseInt(id1);
		var add2=parseInt(sp[0]);
		var result=add1-add2;
		document.getElementById(results).value=result;
		}
		


</script>

<script type="text/javascript">
function dateInRange1(dateIn){
	var inputDate = dateIn;
	var today = new Date();
	var compareToday = compareDatesOnly(inputDate, today);
	if (compareToday > 0) {
		return(true);
	}
}
function compareDatesOnly(date1, date2) {
	var year1 = date1.getYear();
	var year2 = date2.getYear();
	var month1 = date1.getMonth();
	var month2 = date2.getMonth();
	var day1 = date1.getDate();
	var day2 = date2.getDate();

	if (year1 < year2) {
		return -1;
	}
	if (year2 < year1) {
		return -1;
	}

	//years are equal
	if (month1 < month2) {
		return -1;
	}
	if (month2 < month1) {
		return -1;
	}

	//years and months are equal
	if (day1 < day2) {
		return -1;
	}
	if (day2 < day1) {
		return -1;
	}

	//days are equal
	return -1;
}
</script>

<script type="text/javascript">
Calendar.setup ({
	inputField : "jscal_field_date_start", ifFormat : "%Y-%m-%d", showsTime : false, button : "jscal_trigger_date_start", singleClick : true, step : 1, dateStatusFunc : dateInRange1
})

</script>