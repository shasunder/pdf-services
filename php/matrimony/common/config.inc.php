<?php
if($_SERVER['SERVER_NAME'] == $_SERVER['SERVER_NAME'])
{
	$Db_Hostname = $_SERVER['SERVER_NAME'];
	$Db_Username = "root";
	$Db_Password = "sandeep";
	$Db_Name = "matrimony";
}
else
if($_SERVER['SERVER_NAME'] ==$_SERVER['SERVER_NAME'])
{
	$Db_Hostname = $_SERVER['SERVER_NAME'];
	$Db_Username = "root";
	$Db_Password = "sandeep";
	$Db_Name = "matrimony";
}
$db = mysql_connect($Db_Hostname, $Db_Username, $Db_Password) or die(" Error in database connection".mysql_error());
mysql_select_db($Db_Name, $db) or die("Database Error in MTRMY: ".mysql_error($db));

//"tbls"=>array("tm_profile"=>"tm_profile","tm_partnerpreference"=>"tm_partnerpreference","tm_family"=>"tm_family");
/*............................................Country Values..................................*/
$countryValue="Select|Afghanistan|Albania|Algeria|Andorra|American Samoa|Angola|Anguilla|Antartica|Antigua and Barbuda|Argentina|Armenia|Aruba|Ashmore and Cartier Island|Australia|Austria|Azerbaijan|Bahamas|Bahrain|Bangladesh|Barbados|Belarus|Belgium|Belize|Benin|Bermuda|Bhutan|Bolivia|Bosnia and Herzegovina|Botswana|Brazil|British Virgin Islands|Brunei|Bulgaria|Burkina Faso|Burma|Burundi|Cambodia|Cameroon|Canada|Cape Verde|Cayman Islands|Central African Republic|Chad|Chile|China|Christmas Island|Clipperton Island|Cocos (Keeling) Islands|Colombia|Comoros|Congo|Cook Islands|Costa Rica|Cote d'Ivoire|Croatia|Cuba|Cyprus|Czeck Republic|Denmark|Djibouti|Dominica|Dominican Republic|Ecuador|Egypt|El Salvador|Equatorial Guinea|Eritrea|Estonia|Ethiopia|Europa Island|Falkland Islands (Islas Malvinas)|Faroe Islands|Fiji|Finland|France|French Guiana|French Polynesia|French Southern and Antarctic Lands|Gabon|Gambia|Gaza Strip|Georgia|Germany|Ghana|Gibraltar|Glorioso Islands|Greece|Greenland|Grenada|Guadeloupe|Guam|Guatemala|Guernsey|Guinea|Guinea-Bissau|Guyana|Haiti|Heard Island and McDonald Islands|Holy See (Vatican City)|Honduras|Hong Kong|Howland Island|Hungary|Iceland|India|Indonesia|Iran|Iraq|Ireland|Israel|Italy|Jamaica|Jan Mayen|Japan|Jarvis Island|Jersey|Johnston Atoll|Jordan|Juan de Nova Island|Kazakhstan|Kenya|Kiribati|Korea North|Korea South|Kuwait|Kyrgyzstan|Laos|Latvia|Lebanon|Lesotho|Liberia|Libya|Liechtenstein|Lithuania|Luxembourg|Macau|Macedonia|Madagascar|Malawi|Malaysia|Maldives|Mali|Malta|Man Isle of|Marshall Islands|Martinique|Mauritania|Mauritius|Mayotte|Mexico|Micronesia|Midway Islands|Moldova|Monaco|Mongolia|Montserrat|Morocco|Mozambique|Namibia|Nauru|Nepal|Netherlands|Netherlands Antilles|New Caledonia|New Zealand|Nicaragua|Niger|Nigeria|Niue|Norfolk Island|No Man`s Island|Northern Mariana Islands|Norway|Oman|Pakistan|Palau|Panama|Papua New Guinea|Paraguay|Peru|Philippines|Pitcaim Islands|Poland|Portugal|Puerto Rico|Qatar|Reunion|Romainia|Russia|Rwanda|Saint Helena|Saint Kitts and Nevis|Saint Lucia|Saint Pierre and Miquelon|Saint Vincent and the Grenadines|Samoa|San Marino|Sao Tome and Principe|Saudi Arabia|Scotland|Senegal|Serbia and Monterago|Seychelles|Sierra Leone|Singapore|Slovakia|Slovenia|Solomon Islands|Somalia|South Africa|South Georgia and the South Sandwich Islandss|Spain|Spratly Islands|SriLanka|Sudan|Suriname|Svalbard|Swaziland|Sweden|Switzerland|Syria|Taiwan|Tajikistan|Tanzania|Thailand|Trinidad and Tobago|Toga|Tokelau|Tonga|Tunisia|Turkey|Turkmenistan|Turks and Caicos Island|Tuvalu|Uganda|Ukraine|United Arab Emirates|United Kingdom|Uruguay|United States|Uzbekistan|Vanuatu|Venezuela|Vietnam|Virgin Islands|Wales|Wallis and Futuna|West Bank|Western Sahara|Yemen|Yugoslavia|Zambia|Zimbabwe|Others|Doesn't Matter";
/*.................................Annual Income............................*/
$incomeString="- Select -|Afghanistan - AFA|Albania - ALL|Algeria - DZD|American Samoa - USD|Andorra - EUR|Anguilla - XCD|Antarctica - XCD|Antigua and Barbuda - XCD|Argentina - ARS|Armenia - AMD|Aruba - AWG|Australia - AUD|Austria - EUR|Azerbaijan - AZM|Bahamas - BSD|Bahrain - BHD|Bangladesh - BDT|Barbados - BBD|Belarus - BYB|Belgium - EUR|Belize - BZD|Benin - XOF|Bermuda - BMD|Bhutan - BTN|Bolivia - BOB|Bosnia and Herzegovina - BAM|Botswana - BWP|Bouvet Island - NOK|Brazil - BRL|British Indian Ocean Territory - USD|British Virgin Islands - USD|Brunei - BND|Bulgaria - BGL|Burkina Faso - XOF|Burundi - BI|Cambodia - KHR|Cameroon - XAF|Canada - CAD|Cape Verde - CVE|Cayman Islands - KYD|Central African Republic - XAF|Chad - XAF|Chile - CLP|China - CNY|Christmas Island - AUD|Cocos Islands - AUD|Colombia - COP|Comoros - KMF|Congo - XAF|Cook Islands - NZD|Costa Rica - CRC|Croatia - HRK|Cuba - CUP|Cyprus - CYP|Czech Republic - CZK|Denmark - DKK|Djibouti - DJF|Dominica - XCD|Dominican Republic - DOP|East Timor - TPE|Ecuador - ECS|Egypt - EGP|El Salvador - SVC|Equatorial Guinea - XAF|Eritrea - ERN|Estonia - EEK|Ethiopia - ETB|Falkland Islands - FKP|Faroe Islands - DKK|Fiji - FJD|Finland - EUR|France - EUR|French Guiana - EUR|French Polynesia - XPF|French Southern Territories - EUR|Gabon - XAF|Gambia - GMD|Georgia - GEL|Germany - EUR|Ghana - GHC|Gibraltar - GIP|Greece - EUR|Greenland - DKK|Grenada - XCD|Guadeloupe - EUR|Guam - USD|Guatemala - QTQ|Guinea - GNF|Guinea-Bissau - GWP|Guyana - GYD|Haiti - HTG|Heard and McDonald Islands - AUD|Honduras - HNL|Hong Kong - HKD|Hungary - HUF|Iceland - ISK|India - Rs.|Indonesia - IDR|Iran - IRR|Iraq - IQD|Ireland - EUR|Israel - ILS|Italy - EUR|Ivory Coast - XOF|Jamaica - JMD|Japan - JPY|Jordan - JOD|Kazakhstan - KZT|Kenya - KES|Kiribati - AUD|Korea, North - KPW|Korea, South - KRW|Kuwait - KWD|Kyrgyzstan - KGS|Laos - LAK|Latvia - LVL|Lebanon - LBP|Lesotho - LSL|Liberia - LRD|Libya - LYD|Liechtenstein - CHF|Lithuania - LTL|Luxembourg - EUR|Macau - MOP|Macedonia, Former Yugoslav Republic of - MKD|Madagascar - MGF|Malawi - MWK|Malaysia - MYR|Maldives - MVR|Mali - XOF|Malta - MTL|Marshall Islands - USD|Martinique - EUR|Mauritania - MR|Mauritius - MUR|Mayotte - EUR|Mexico - MXN|Micronesia, Federated States of - USD|Moldova - MDL||Monaco - EUR|Mongolia - MNT|Montserrat - XCD|Morocco - MAD|Mozambique - MZM|Myanmar - MMK|Namibia - NAD|Nauru - AUD|Nepal - NPR|Netherlands - EUR|Netherlands Antilles - ANG|New Caledonia - XPF|New Zealand - NZD|Nicaragua - NIC|Niger - XOF|Nigeria - NGN|Niue - NZD|Norfolk Island - AUD|Northern Mariana Islands - USD|Norway - NOK|Oman - OMR|Pakistan - PKR|Palau - USD|Panama - PAB|Papua New Guinea - PGK|Paraguay - PYG|Peru - PEN|Philippines - PHP|Pitcairn Island - NZD|Poland - PLZ|Portugal - EUR|Puerto Rico - USD|Qatar - QAR|Reunion - EUR|Romania - ROL|Russia - RUR|Rwanda - RWF|S. Georgia and S. Sandwich Isls. - GBP|Saint Kitts & Nevis - XCD|Saint Lucia - XCD|Saint Vincent and The Grenadines - XCD|Samoa - WST|San Marino - ITL|Sao Tome and Principe - STD|Saudi Arabia - SAR|Senegal - XOF|Seychelles - SCR|Sierra Leone - SLL|Singapore - SGD|Sovakia - SK||Slovenia - SIT|Somalia - SOD|South Africa - ZAR|Spain - EUR|Sri Lanka - LKR|St. Helena |St. Pierre and Miquelon- EUR|Sudan - SDD|Suriname - SRG|Svalbard and Jan Mayen Islands - NOK|Swaziland - SZL|Sweden - SEK|Switzerland - CHF|Syria - SYP|Tajikistan - TJR|Tanzania - TZS|Thailand - THB|Togo - XOF|Tokelau - NZD|Tonga - TOP|Trinidad and Tobago - TTD|Tunisia - TND|Turkey - TRL|Turkmenistan - TMM|Turks and Caicos Islands - USD|Tuvalu - AUD|Uganda - UGS|Ukraine - UAG|United Arab Emirates - AED|United Kingdom - GBP|United States of America - USD|Uruguay - UYP|Uzbekistan - UZS|Vanuatu - VUV|Vatican City - EUR|Venezuela - VUB|Vietnam - VND|Virgin Islands - USD|Wallis and Futuna Islands - XPF|Western Sahara - MAD|Yemen - YER|Yugoslavia (Former) - YUN|Zaire - CDF|Zambia - ZMK|Zimbabwe - ZWD";
?>