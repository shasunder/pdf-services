/*OnLoad Files
*Star onload values
*RAssi onload values
*Profile onload values
*FillDate onload values
*Star onload values
*RAssi onload values
*Profile onload values
*FillDate onload values
*/
function FillStar(ddlControl){
			var starString="Select|Anuradha / Anusham / Anizham|Ardra / Thiruvathira|Ashlesha / Ayilyam|Ashwini / Ashwathi|Bharani|Chitra / Chitha|Dhanista / Avittam|Hastha / Atham|Jyesta / Kettai|Krithika / Karthika|Makha / Magam|Moolam / Moola|Mrigasira / Makayiram|Poorvabadrapada / Puratathi|Poorvapalguni / Puram / Pubbhe|Poorvashada / Pooradam|Punarvasu / Punarpusam|Pushya / Poosam / Pooyam|Revathi|Rohini|Shatataraka / Sadayam / Satabishek|Shravan / Thiruvonam|Swati / Chothi|Uttarabadrapada / Uthratadhi|Uttarapalguni / Uthram|Uttarashada / Uthradam|Vishaka /Vishakam"
			document.getElementById(ddlControl).options.length=0
			for(i=0;i<starString.split("|").length;i++)
			{
            	document.getElementById(ddlControl).options[i]=new Option(starString.split("|")[i])
            }
 }   
function FillRassi(ddlControl){
			var rassiString="Select|Mesh (Aries)|Vrishabh (Taurus)|Mithun (Gemini)|Kark (Cancer)|Simha (Leo)|Kanya (Virgo)|Thul (Libra)|Vrishchik (Scorpio)|Dhanu (Sagittarius)|Makar (Capricorn)|Kumbh (Aquarius)|Meen (Pisces)"
			document.getElementById(ddlControl).options.length=0
			for(i=0;i<rassiString.split("|").length;i++)
			{
            	document.getElementById(ddlControl).options[i]=new Option(rassiString.split("|")[i])
            }
}
function FillProfile(ddlControl){
   	 var typeString = 'Select|Self|Father|Mother|Friend|Siblings|Relation|Others'
    document.getElementById(ddlControl).options.length=0;
    for(i=0;i<typeString.split("|").length;i++)
	{
        	document.getElementById(ddlControl).options[i]=new Option(typeString.split("|")[i]);
    }
}
function FillDate(ddlControl1){
  	var dayString = "Date|01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31"
   	document.getElementById(ddlControl1).options.length=0;
   	for(i=0;i<dayString.split("|").length;i++)
   {
		document.getElementById(ddlControl1).options[i]=new Option(dayString.split("|")[i])
		document.getElementById(ddlControl1).options[i].value=i;
   }
}
function FillMonth(ddlControl2){
 	 var monthString ="Month|Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec";
     document.getElementById(ddlControl2).options.length=0;
     for(i=0;i<monthString.split("|").length;i++)
	 {
      	document.getElementById(ddlControl2).options[i]=new Option(monthString.split("|")[i])
      	document.getElementById(ddlControl2).options[i].value=i;
     }
}
function FillYears(ddlYear){
	var today=new Date()
 	var ddlyear=document.getElementById(ddlYear)
	var thisyear=today.getFullYear()-17;
	for (var y=1; y<=60-17; y++)
	{
		ddlyear.options[y]=new Option(thisyear, thisyear)
		ddlyear.options[y]=new Option(thisyear);
		thisyear-=1
	}
} 
function FillMarital(ddlControl){
    	document.getElementById(ddlControl).options.length=0;
		for(i=0;i<maritalString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(maritalString.split("|")[i])
        }
}
var maritalString = "Select|Single|Married|Divorced|Separated|Widow/Widower"		
function FillChild(ddlControl){
	var childString = "Select|0|1|2|3|4|5|5+"		
   	document.getElementById(ddlControl).options.length=0;
	for(i=0;i<childString.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(childString.split("|")[i])
    }
}
function FillBlood(ddlControl){
	var bloodString = "Select|O +ve|O -ve|A +ve|A -ve|B +ve|B -ve|A1 +ve|A1 -ve|A2 +ve|A2 -ve|AB +ve|AB -ve|A1B +ve|A1B -ve|A2B +ve|A2B -ve"
	document.getElementById(ddlControl).options.length=0
	for(i=0;i<bloodString.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(bloodString.split("|")[i])
    }
}
function FillFeet(ddlControl){
	var feetString = " Feet/Inch/Cm |4ft 5in 134cm|4ft  6in  137cm|4ft  7in  139cm|4ft  8in  142cm|4ft  9in  144cm|4ft  10in  147cm|4ft  11in  149cm|5ft  0in  152cm|5ft  1in  154cm|5ft  2in  157cm|5ft  3in  160cm|5ft  4in  162cm|5ft  5in  165cm|5ft  6in  167cm|5ft  7in  170cm|5ft  8in  172cm|5ft  9in  175cm|5ft  10in  177cm|5ft  11in  180cm|6ft  0in  182cm|6ft  1in  185cm|6ft  2in  187cm|6ft  3in  190cm|6ft  4in  193cm|6ft  5in  195cm|6ft  6in  198cm|6ft  7in  200cm|6ft  8in  203cm|6ft  9in  205cm|6ft  10in  208cm|6ft  11in  210cm|7ft  0in  213cm"
	document.getElementById(ddlControl).options.length=0
	for(i=0;i<feetString.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(feetString.split("|")[i])
   	}
}
function FillKgs(ddlControl){
	var kgsString = "- Kgs -|41kg|42kg|43kg|44kg|45kg|46kg|47kg|48kg|49kg|50kg|51kg|52kg|53kg|54kg|55kg|56kg|57kg|58kg|59kg|60kg|61kg|62kg|63kg|64kg|65kg|66kg|67kg|68kg|69kg|70kg|71kg|72kg|73kg|74kg|75kg|76kg|77kg|78kg|79kg|80kg|81kg|82kg|83kg|84kg|85kg|86kg|87kg|88kg|89kg|90kg|91kg|92kg|93kg|94kg|95kg|96kg|97kg|98kg|99kg|100kg|101kg|102kg|103kg|104kg|105kg|106kg|107kg|108kg|109kg|110kg|111kg|112kg|113kg|114kg|115kg|116kg|117kg|118kg|119kg|120kg|121kg|122kg|123kg|124kg|125kg|126kg|127kg|128kg|129kg|130kg|131kg|132kg|135kg|136kg|137kg|138kg|139kg|140kg"
	document.getElementById(ddlControl).options.length=0
	for(i=0;i<kgsString.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(kgsString.split("|")[i])
    }
}
function FillLbs(ddlControl){
var lbsString=" - Lbs -|90 lbs|91 lbs|92 lbs|93 lbs|94 lbs|95 lbs|96 lbs|97 lbs|98 lbs|99 lbs|100 lbs|101 lbs|102 lbs|103 lbs|104 lbs|105 lbs|106 lbs|107 lbs|108 lbs|109 lbs|110 lbs|111 lbs|112 lbs|113 lbs|114 lbs|115 lbs|116 lbs|117 lbs|118 lbs|119 lbs|120 lbs|121 lbs|122 lbs|123 lbs|124 lbs|125 lbs|126 lbs|127 lbs|128 lbs|129 lbs|130 lbs|131 lbs|132 lbs|133 lbs|134 lbs|135 lbs|136 lbs|137 lbs|138 lbs|139 lbs|140 lbs|141 lbs|142 lbs|143 lbs|144 lbs|145 lbs|146 lbs|147 lbs|148 lbs|149 lbs|150 lbs|151 lbs|152 lbs|153 lbs|154 lbs|155 lbs|156 lbs|157 lbs|158 lbs|159 lbs|160 lbs|161 lbs|162 lbs|163 lbs|164 lbs|165 lbs|166 lbs|167 lbs|168 lbs|169 lbs|170 lbs|171 lbs|172 lbs|173 lbs|173 lbs|174 lbs|175 lbs|175 lbs|176 lbs|177 lbs|178 lbs|179 lbs|180 lbs|181 lbs|182 lbs|183 lbs|184 lbs|185 lbs|186 lbs|187 lbs|188 lbs|189 lbs|190 lbs|191 lbs|192 lbs|193 lbs|194 lbs|195 lbs|196 lbs|197 lbs|198 lbs|199 lbs|200 lbs|201 lbs|202 lbs|203 lbs|204 lbs|205 lbs|206 lbs|207 lbs|208 lbs|209 lbs|210 lbs|211 lbs|212 lbs|213 lbs|214 lbs|215 lbs|216 lbs|217 lbs|218 lbs|219 lbs|220 lbs|221 lbs|222 lbs|223 lbs|224 lbs|225 lbs|226 lbs|227 lbs|228 lbs|229 lbs|230 lbs|231 lbs|232 lbs|233 lbs|234 lbs|235 lbs|236 lbs|237 lbs|238 lbs|239 lbs|240 lbs|241 lbs|242 lbs|243 lbs|244 lbs|245 lbs|246 lbs|247 lbs|248 lbs|249 lbs|250 lbs|251 lbs|252 lbs|253 lbs|254 lbs|255 lbs|256 lbs|257 lbs|258 lbs|259 lbs|260 lbs|261 lbs|262 lbs|263 lbs|264 lbs|265 lbs|266 lbs|267 lbs|268 lbs2169 lbs2170 lbs2171 lbs|272 lbs|273 lbs|273 lbs|274 lbs|275 lbs|275 lbs|276 lbs|277 lbs|278 lbs|279 lbs|280 lbs|281 lbs|282 lbs|283 lbs|284 lbs|285 lbs|286 lbs|287 lbs|288 lbs|289 lbs|290 lbs|291 lbs|292 lbs|293 lbs|294 lbs|295 lbs|296 lbs|297 lbs|298 lbs|299 lbs|300 lbs"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<lbsString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(lbsString.split("|")[i])
       	}	

}
function FillEducation(ddlControl){
		var eduString="Select|Bachelors - Engineering/ Computers|Masters - Engineering/ Computers|Bachelors - Arts/ Science/Commerce/ Others|Masters - Arts/ Science/ Commerce/ Others|Finanace & Accounts|Management - BBA/ MBA/ Others|Medicine - General/ Dental/ Surgeon/ Others|Legal - BL/ ML/ LLB/ LLM/ Others|Service - IAS/ IPS/ Others|PhD|Diploma|Higher Secondary/Secondary/Schooling|Uneducated"
    	document.getElementById(ddlControl).options.length=0
	    for(i=0;i<eduString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(eduString.split("|")[i])
        }
}
function FillEducations(ddlControl){
		var eduString="Doesn't Matter|Bachelors - Engineering/ Computers|Masters - Engineering/ Computers|Bachelors - Arts/ Science/Commerce/ Others|Masters - Arts/ Science/ Commerce/ Others|Finanace & Accounts|Management - BBA/ MBA/ Others|Medicine - General/ Dental/ Surgeon/ Others|Legal - BL/ ML/ LLB/ LLM/ Others|Service - IAS/ IPS/ Others|PhD|Diploma|Higher Secondary/Secondary/Schooling|Uneducated"
    	document.getElementById(ddlControl).options.length=0
	    for(i=0;i<eduString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(eduString.split("|")[i])
        }
}
function FillQualification(ddle_category,ddle_qual){
    document.getElementById(ddle_qual).options.length=0;
  	for(i=0;i<qualString[document.getElementById(ddle_category).selectedIndex].split("|").length;i++)
	{
     	document.getElementById(ddle_qual).options[i]=new Option(qualString[document.getElementById(ddle_category).selectedIndex].split("|")[i]);
    }
}
					  var qualString= new Array();
 					   qualString[0]="Select"
 					  /* qualString[1]="Select|Doesnt Matter"*/
                       qualString[1]="Select|B.E|B.Tech|B.Arch|Undergraduate|Others"
					   qualString[2]="Select|M.E|M.Tech|M.S|Post graduate|Others"  
					   qualString[3]="Select|B.A|B.Com|B.Ed|B.Pharm|B.Sc|BCA|BHM|Undergraduate|Others" 
					   qualString[4]="Select|M.Com|M.Ed|M.Pharm|M.Phil|M.Sc|MCA|M.A|Post graduate|Others"
					   qualString[5]="Select|CA|ICWA|Others"
					   qualString[6]="Select|BBA|BBM|CS|MBA|PGDM|PGDBM|Others"  
					   qualString[7]="Select|BDS|MBBS|MD|MS|Others" 
					   qualString[8]="Select|BL|LLB|LLB|ML|LLM|Others"
					   qualString[9]="Select|IAS|IPS|IFS|IRS|Others"
					   qualString[10]="Select|PhD Doctorate|Others"
					   qualString[11]="Select|Diploma|Others"
					   qualString[12]="Select|HSC/Intermediate|S.S.L.C|Elementry|Primary"
					   qualString[13]="Select";
				

function FillPhysical(ddlControl){
	var phyString="Select|Normal|Physically challenged |Mentally challenged"
	document.getElementById(ddlControl).options.length=0
	for(i=0;i<phyString.split("|").length;i++)
	{
   		document.getElementById(ddlControl).options[i]=new Option(phyString.split("|")[i])
    }
}
function FillPhysicals(ddlControl){
	var phyString="Doesn't Matter|Normal|Physically challenged |Mentally challenged"
	document.getElementById(ddlControl).options.length=0
	for(i=0;i<phyString.split("|").length;i++)
	{
   		document.getElementById(ddlControl).options[i]=new Option(phyString.split("|")[i])
    }
}
function FillIncome(ddlControl){
var incomeString="Select|India - Rs|Afghanistan - AFA|Albania - ALL|Algeria - DZD|American Samoa - USD|Andorra - EUR|Anguilla - XCD|Antarctica - XCD|Antigua and Barbuda - XCD|Argentina - ARS|Armenia - AMD|Aruba - AWG|Australia - AUD|Austria - EUR|Azerbaijan - AZM|Bahamas - BSD|Bahrain - BHD|Bangladesh - BDT|Barbados - BBD|Belarus - BYB|Belgium - EUR|Belize - BZD|Benin - XOF|Bermuda - BMD|Bhutan - BTN|Bolivia - BOB|Bosnia and Herzegovina - BAM|Botswana - BWP|Bouvet Island - NOK|Brazil - BRL|British Indian Ocean Territory - USD|British Virgin Islands - USD|Brunei - BND|Bulgaria - BGL|Burkina Faso - XOF|Burundi - BI|Cambodia - KHR|Cameroon - XAF|Canada - CAD|Cape Verde - CVE|Cayman Islands - KYD|Central African Republic - XAF|Chad - XAF|Chile - CLP|China - CNY|Christmas Island - AUD|Cocos Islands - AUD|Colombia - COP|Comoros - KMF|Congo - XAF|Cook Islands - NZD|Costa Rica - CRC|Croatia - HRK|Cuba - CUP|Cyprus - CYP|Czech Republic - CZK|Denmark - DKK|Djibouti - DJF|Dominica - XCD|Dominican Republic - DOP|East Timor - TPE|Ecuador - ECS|Egypt - EGP|El Salvador - SVC|Equatorial Guinea - XAF|Eritrea - ERN|Estonia - EEK|Ethiopia - ETB|Falkland Islands - FKP|Faroe Islands - DKK|Fiji - FJD|Finland - EUR|France - EUR|French Guiana - EUR|French Polynesia - XPF|French Southern Territories - EUR|Gabon - XAF|Gambia - GMD|Georgia - GEL|Germany - EUR|Ghana - GHC|Gibraltar - GIP|Greece - EUR|Greenland - DKK|Grenada - XCD|Guadeloupe - EUR|Guam - USD|Guatemala - QTQ|Guinea - GNF|Guinea-Bissau - GWP|Guyana - GYD|Haiti - HTG|Heard and McDonald Islands - AUD|Honduras - HNL|Hong Kong - HKD|Hungary - HUF|Iceland - ISK|Indonesia - IDR|Iran - IRR|Iraq - IQD|Ireland - EUR|Israel - ILS|Italy - EUR|Ivory Coast - XOF|Jamaica - JMD|Japan - JPY|Jordan - JOD|Kazakhstan - KZT|Kenya - KES|Kiribati - AUD|Korea, North - KPW|Korea, South - KRW|Kuwait - KWD|Kyrgyzstan - KGS|Laos - LAK|Latvia - LVL|Lebanon - LBP|Lesotho - LSL|Liberia - LRD|Libya - LYD|Liechtenstein - CHF|Lithuania - LTL|Luxembourg - EUR|Macau - MOP|Macedonia, Former Yugoslav Republic of - MKD|Madagascar - MGF|Malawi - MWK|Malaysia - MYR|Maldives - MVR|Mali - XOF|Malta - MTL|Marshall Islands - USD|Martinique - EUR|Mauritania - MR|Mauritius - MUR|Mayotte - EUR|Mexico - MXN|Micronesia, Federated States of - USD|Moldova - MDL||Monaco - EUR|Mongolia - MNT|Montserrat - XCD|Morocco - MAD|Mozambique - MZM|Myanmar - MMK|Namibia - NAD|Nauru - AUD|Nepal - NPR|Netherlands - EUR|Netherlands Antilles - ANG|New Caledonia - XPF|New Zealand - NZD|Nicaragua - NIC|Niger - XOF|Nigeria - NGN|Niue - NZD|Norfolk Island - AUD|Northern Mariana Islands - USD|Norway - NOK|Oman - OMR|Pakistan - PKR|Palau - USD|Panama - PAB|Papua New Guinea - PGK|Paraguay - PYG|Peru - PEN|Philippines - PHP|Pitcairn Island - NZD|Poland - PLZ|Portugal - EUR|Puerto Rico - USD|Qatar - QAR|Reunion - EUR|Romania - ROL|Russia - RUR|Rwanda - RWF|S. Georgia and S. Sandwich Isls. - GBP|Saint Kitts & Nevis - XCD|Saint Lucia - XCD|Saint Vincent and The Grenadines - XCD|Samoa - WST|San Marino - ITL|Sao Tome and Principe - STD|Saudi Arabia - SAR|Senegal - XOF|Seychelles - SCR|Sierra Leone - SLL|Singapore - SGD|Sovakia - SK||Slovenia - SIT|Somalia - SOD|South Africa - ZAR|Spain - EUR|Sri Lanka - LKR|St. Helena |St. Pierre and Miquelon- EUR|Sudan - SDD|Suriname - SRG|Svalbard and Jan Mayen Islands - NOK|Swaziland - SZL|Sweden - SEK|Switzerland - CHF|Syria - SYP|Tajikistan - TJR|Tanzania - TZS|Thailand - THB|Togo - XOF|Tokelau - NZD|Tonga - TOP|Trinidad and Tobago - TTD|Tunisia - TND|Turkey - TRL|Turkmenistan - TMM|Turks and Caicos Islands - USD|Tuvalu - AUD|Uganda - UGS|Ukraine - UAG|United Arab Emirates - AED|United Kingdom - GBP|United States of America - USD|Uruguay - UYP|Uzbekistan - UZS|Vanuatu - VUV|Vatican City - EUR|Venezuela - VUB|Vietnam - VND|Virgin Islands - USD|Wallis and Futuna Islands - XPF|Western Sahara - MAD|Yemen - YER|Yugoslavia (Former) - YUN|Zaire - CDF|Zambia - ZMK|Zimbabwe - ZWD"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<incomeString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(incomeString.split("|")[i])
        }
}
function FillEmptype(ddlControl){
		var empString="Select|Government|Private|Business|Defence|Self-Employment|Not working"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<empString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(empString.split("|")[i])
        }
}
function FillEmptypes(ddlControl){
		var empString="Doesn't Matter|Government|Private|Business|Defence|Self-Employment|Not working"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<empString.split("|").length;i++)
		{
        	document.getElementById(ddlControl).options[i]=new Option(empString.split("|")[i])
        }
}
function FillLanguage(ddlControl){
		var languageString = "Select|Hindi|Assamese|Bengali|Bodo|Dogri|Gujarati|Kannada|Kashmiri|Konkani|Maithili|Malayali|Manipuri|Marathi|Marwari|Nepali|Oriya|Parsi|Punjabi|Sanskrit|Santhali|Sindhi|Tamil|Telugu|Urdu|Others"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<languageString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(languageString.split("|")[i])
		}
}
function FillMotherTongue(ddlControl){
		var motherString ="Select|Arunachali|Assamese|Awadhi|Bengali|Bhojpuri|Brij|Bihari|Dogri|English|French|Garo|Gujarati|Himachali/Pahari|Hindi|Kanauji|Kannada|Kashmiri|Khandesi|Khasi|Konkani|Koshali|Kumoani|Kutchi|Lepcha|Ladacki|Magahi|Maithili|Malayalam|Manipuri|Marathi|Marwari|Miji|Mizo|Monpa|Nicobarese|Nepali|Oriya|Punjabi|Rajasthani|Sanskrit|Santhali|Sindhi|Sourashtra|Tamil|Telugu|Tripuri|Tulu|Urdu"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<motherString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(motherString.split("|")[i])
		}
}
function FillMotherTongues(ddlControl){
		var motherString ="Doesn't Matter|Arunachali|Assamese|Awadhi|Bengali|Bhojpuri|Brij|Bihari|Dogri|English|French|Garo|Gujarati|Himachali/Pahari|Hindi|Kanauji|Kannada|Kashmiri|Khandesi|Khasi|Konkani|Koshali|Kumoani|Kutchi|Lepcha|Ladacki|Magahi|Maithili|Malayalam|Manipuri|Marathi|Marwari|Miji|Mizo|Monpa|Nicobarese|Nepali|Oriya|Punjabi|Rajasthani|Sanskrit|Santhali|Sindhi|Sourashtra|Tamil|Telugu|Tripuri|Tulu|Urdu"
		document.getElementById(ddlControl).options.length=0
		for(i=0;i<motherString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(motherString.split("|")[i])
		}
} 
function indexnum(ddlcontrol,index1){
	ddl = document.getElementById(ddlcontrol);
	var ddl1=ddl.options[ddl.selectedIndex].value;
	document.getElementById(index1).value = ddl1;
}
function FillCitizen(ddlControl){
	document.getElementById(ddlControl).options.length=0;
   	for(i=0;i<sCountryString.split("|").length;i++)
	{
		document.getElementById(ddlControl).options[i]=new Option(sCountryString.split("|")[i])
		document.getElementById(ddlControl).options[i].value=document.getElementById(ddlControl).options[i].text;		
	}		
}
var occuString = "Select|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others"	
function Fillfamilysoccupation(ddlControl){
		document.getElementById(ddlControl).options.length=0;
		for(i=0;i<occuString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(occuString.split("|")[i])			
		}
} 
var occuString = "Select|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others"	
function FillOccupation(ddlControl){
		document.getElementById(ddlControl).options.length=0;
		for(i=0;i<occuString.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(occuString.split("|")[i])			
		}
}
var occuStrings = "Doesn't Matter|Salaried|Labour|Unable to Work|Looking For Job|Not Working|Self-Employed|Others"	
function FillOccupations(ddlControl){
		document.getElementById(ddlControl).options.length=0;
		for(i=0;i<occuStrings.split("|").length;i++)
		{
			document.getElementById(ddlControl).options[i]=new Option(occuStrings.split("|")[i])			
		}
}
/*--Country code Function --*/
function FillCcode_ph(txt,ddlControl)
{
	var ctrlvalue=document.getElementById(txt);
	var ddl=document.getElementById(ddlControl).selectedIndex
	var ar=new Array("+91","+93","+335","+213","+376","+1-684","+244","+264","+672","+268","+54","+374","+297","+","+61","+43","+994","+242","+973","+880","+246","+375","+32","+501","+229","+441","+975","+591","+387","+267","+55","+1-284","+673","+359","+226","+95","+226","+855","+237","+1","+238","+345","+236","+235","+56","+86","+61","+","+61","+57","+269","+242","+682","+506","+225","+385","+53","+357","+420","+45","+253","+767","+809","+593","+20","+503","+240","+291","+372","+251","+","+500","+298","+679","+358","+33","+594","+689","+","+241","+220","+970","+995","+49","+233","+350","+","+30","+473","+299","+590","+671","+502","+44-1481","+245","+224","+592","+509","+","+379","+504","+852","+","+36","+354","+62","+98","+964","+353","+972","+39","+876","+","+81","+","+44-","+","+962","+","+7","+254","+686","+850","+82","+965","+996","+856","+371","+961","+266","+231","+218","+423","+370","+352","+853","+389","+261","+265","+60","+960","+223","+356","+44","+692","+596","+222","+230","+269","+52","+691","+","+373","+377","+976","+664","+212","+258","+264","+674","+31","+599","+977","+687","+64","+505","+234","+227","+683","+672","+","+1-670","+47","+968","+92","+680","+507","+675","+595","+51","+63","+64","+351","+351","+787","+974","+262","+40","+7","+250","+290","+1-869","+758","+508","+1-784","+685","+378","+239","+966","+44","+221","+","+248","+232","+65","+386","+421","+677","+252","+27","+","+34","+","+94","+249","+597","+47","+268","+46","+41","+963","+886","+992","+255","+66","+868","+228","+690","+676","+993","+649","+216","+1-649","+688","+256","+380","+971","+44","+598","+1","+998","+678","+58","+84","+1-340","+44","+681","+","+212","+967","+381","+260","+263","+");
	for(i=1;i<=254; i++) {
		if(ddl==i){a=ar[i-1];ctrlvalue.value=a; } 
	}
}         		               		
function FillReligion(ddlControl){

	document.getElementById(ddlControl).options.length=0;
	for(i=0;i<religion.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(religion.split("|")[i])
    }
}
function FillReligions(ddlControl){

	document.getElementById(ddlControl).options.length=0;
	for(i=0;i<religion.split("|").length;i++)
	{
    	document.getElementById(ddlControl).options[i]=new Option(religions.split("|")[i])
    }
}
function FillCommunity(ddlReligion,ddlCommunity){
    document.getElementById(ddlCommunity).options.length=0; 
    for(i=0;i<community[document.getElementById(ddlReligion).selectedIndex].split("|").length;i++)
	{
    document.getElementById(ddlCommunity).options[i]=new Option(community[document.getElementById(ddlReligion).selectedIndex].split("|")[i])
	
	}
}
      		var religion="- Select Religion -|Buddhist|Baha'is|Chinese Folks|Christian|Confucianist|Ethnoreligionist|Hindu|Jain|Jewish|Muslim|Neoreligionist|Shintoist|Sikh|Spiritist|Taoist|Zorastrian|Atheist|No Religion|Inter-Religion|Others"
			 var religions="Doesn't Matter|Buddhist|Baha'is|Chinese Folks|Christian|Confucianist|Ethnoreligionist|Hindu|Jain|Jewish|Muslim|Neoreligionist|Shintoist|Sikh|Spiritist|Taoist|Zorastrian|Atheist|No Religion|Inter-Religion|Others"
                		
                		var community=new Array()
                		community[0]="Select"
                		community[1]="Select|Caste No Bar|Mahayana|Nichiren|Pure Land|Tantrayana|Tendai|Theravada|Vajrayana/Tibetan|Zen|Intercast|Others"
                		community[2]="No Community"
                		community[3]="No Community"
                		community[4]="Select|Caste No Bar|Adventist|Anglican/Episcopal|Apostolic|Assembly of God (A.G.)|Assyrian|Baptist|Born Again|Brethren|Calvinist|Catholic|Church of God|CMS|CNI|Congregational|CSI|Evangelical|Goan|Jacobite|Jehovah's witnesses|Later Day Saints|Latin Catholic|Lutheran|Malankara|Marthoma|Melkite|Mennonite|Methodist|Moravian|Orthodox|Pentecostal|Presbyterian|Protestant|Seventh-day Adventist|Syrian Catholic|Syro Malabar|Intercast|Others"
						community[5]="No Community"
						community[6]="No Community"
                		community[7]="Select|Caste No Bar|96K Kokanastha|Adi Dravida|Agarwal|Agri|Ahom|Ambalavasi|Anavil Brahmin|Araya|Arora|Arunthathiyar|Arya Vysya|Aryasamaj|Audichya Brahmin|Bahi|Baidya|Balija Naidu|Banik|Bari|Barujibi|Bengali|Bengali Brahmin|Besta|Bhandari|Bhatia|Bhavsar|Bhovi|Billava|Boyer|Brahmin|Brahmin - 6000 Niyogi|Brahmin - Barendra|Brahmin - Bhumihar|Brahmin - Davadnya|Brahmin - Deshastha|Brahmin - Dhiman|Brahmin - Garhwali|Brahmin - Gaur|Brahmin - Goswami|Brahmin - Gowd Saraswat|Brahmin - Gurukkal|Brahmin - Havyaka|Brahmin - Iyengar|Brahmin - Iyer|Brahmin - Kanada Madhva|Brahmin - Kanyakubja|Brahmin - Karhade|Brahmin - Kashmiri Pandit|Brahmin - Kokanastha|Brahmin - Kulin|Brahmin - Kumaoni|Brahmin - Madhwa|Brahmin - Maharashtrian|Brahmin - Maithili|Brahmin - Nagar|Brahmin - Narmadiya|Brahmin - Niyogi Nandavariki|Brahmin - Punjabi|Brahmin - Pushkarna|Brahmin - Rarhi|Brahmin - Rigvedi|Brahmin - Rudraj|Brahmin - Sakaldwipiya|Brahmin - Sanadya|Brahmin - Saraswat|Brahmin - Saryuparin|Brahmin - Shivalli|Brahmin - Smartha|Brahmin - Telugu|Brahmin - Tyagi|Brahmin - Vaidiki|Brahmin - Viswa|Bunt|Chambhar|Chandraseniya Kayastha Prabhu|Chaurasia|Chettiar|Chhetri|Coorgi|Dawoodi Bhora|Devadiga|Devanga|Devendra Kula Vellalar|Dhaneshawat Vaish|Dhangar|Dheevara|Dhobi|Ediga|Ezhava|Ezhuthachan|Gandla|Ganiga|Ganigashetty|Garhwali|Garhwali Rajput|Gavali|Gavara|Ghumar|Goala|Gomantak Maratha|Goswami|Goud|Gounder|Gowda|Gujarati|Gupta|Gurjar|Hegde|Himachali|Hindu-Others|Iyengar|Iyer|Jaiswal|Jat|Jatav|Kaibarta|Kalar|Kalinga Vysya|Kamboj|Kamma|Kannada Mogaveera|Kapu|Kapu Munnuru|Kapu Naidu|Karana|Karmakar|Karuneekar|Kashyap|Kayastha|Keralite|Khandayat|Khandelwal|Khatik|Khatri|Khukhrain|Koli|Kongu Vellala Gounder|Kori|Koshti|Kshatriya|Kulalar|Kumaoni|Kumaoni Rajput|Kumawat|Kumbara|Kumbhakar|Kummari|Kunbi|Kurmi|Kuruba|Kurumbar|Kushwaha|Lambani|Leva Patidar|Leva Patil|Lingayat|Lohana|Lohar|Lubana|Madiga|Mahajan|Maharashtrian|Maheshwari|Mahisya|Mala|Malayalee|Malayalee - Namboodiri|Malayalee - Variar|Mali|Mallah|Mannuru Kapu|Maratha|Maruthuvar|Marvar|Marwari|Maurya|Meena|Meenavar|Menon|Meru|Meru Darji|Modak|Mogaveera|Monchi|Mudaliar|Mudaliar - Senguntha|Mudaliar - Arcot|Mudaliar - Saiva|Mudiraj|Mukulathur|Muthuraja|Nadar|Naicker|Naidu|Naik/Nayaka|Nair|Nair - Vaniya|Nair - Vilakkithala|Namasudra|Nambiar|Namboodiri|Napit|Nepali|OBC/Barber/Naayee|Oriya|Oswal|Padmashali|Panicker|Parkava Kulam|Patel|Patel - Desai|Patel - Dodia|Patel - Kadva|Patel - Leva|Patil|Patil - Leva|Patnaick|Perika|Pillai|Prajapati|Punjabi|Rajaka|Rajput|Rajput Rohella/Tank|Reddy|Sadgope|Saha|Sahu|Saini|Saliya|Saurashtra|Scheduled Caste|Scheduled Tribe|Senai Thalaivar|Sepahia|Setti Balija|Shah|Shetty|Shimpi|Sindhi|Somvanshi|Sonar|Sozhiya Vellalar|Srisayani|Sutar|Swarnakar|Tamboli|Tamil|Tamil Yadava|Tantubai|Tantuway|Telaga|Teli|Telugu|Thevar|Thigala|Thiyya|Udayar|Uppara|Vadagalai|Vaddera|Vaish/Baniya|Vaishnav|Vaishnav - Bhatia|Vaishnav - Vania|Vaishnav - Vanik|Valmiki|Vanjara|Vanjari|Vankar|Vannar|Vaniyakulla Kshatriya|Vanniyar|Varshney|Veera Saivam|Veerashaiva|Velethadathu Nair|Vellalar|Vellalar Devandra Kula|Vellama|Vishwakarma|Vokaliga|Vysya|Yadav/Konar|Intercast|Others"
						community[8]="Select|Caste No Bar|Agarwal|Digambar|Intercaste|Jaiswal|Khandelwal|Kutchi|Oswal|Porwal|Shewetember|Vaishya|Vania|Intercast|Others"
                		community[9]="Select|Caste No Bar|Ashkenazi|Sephardi|Mizrahi|Intercast|Others"
                		community[10]="Select|Caste No Bar|Ansari|Arain|Awan|Bengali|Dawoodi Bohra|Dekkani|Dudekula|Ehle-Hadith|Gulf Muslims|Khoja|Labbai|Mapila|Memon|Mughal|Pathan|Rowther|Salafi|Sheik|Shia|Shia Imami Ismaili|Siddiqui|Sunni - Hanabali|Sunni - Hanafi|Sunni - Maliki|Sunni - Shafi`i|Sunni Muslim|Syed|Qureshi|Intercast|Others"
                		community[11]="No Community"
                		community[12]="Select|Caste No Bar|Ko Shinto|Shrine Shinto|Sect Shinto|Folk Shinto|Intercast|Others"
                		community[13]="Select|Caste No Bar|Ahluwalia|Arora|Bhatia|Bhatra|Clean Shaven|Ghumar|Gursikh|Intercaste|Jat|Kambhoj|Kesadhari|Khatri|Kshatriya|Khatri|Kshatriya|Lubana|Majabi|Rajput|Ramdasia|Ramgharia|Ravidasia|Saini|Sikh-Others|Tonk Kshatriya|Intercast|Others"
						community[14]="No Community"
						community[15]="Select|Caste No Bar|Laozi|Zhuangzi|Zhang Daoling|Zhang Jiao|Ge Hong|Chen Tuan|Wang Chongyang|Intercast|Others"
						community[16]="Select|Caste No Bar|Parsi|Intercast|Others"
                		community[17]="No Community"
                		community[18]="No Community"
                		community[19]="No Community"
                		community[20]="No Community"