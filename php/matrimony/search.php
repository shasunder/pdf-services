<?php
session_start(); @ob_start();
include("common/config.inc.php");
include("common/function.php");
$matrimony = new matrimony();
$matrimony->seturl();

class commonsearch extends matrimony
{
	function search_case($argcase){/*---------- for all search-----------*/
		$this->dbfldarg = "distinct tmp.FirstName,tmp.MiddleName,tmp.LastName,tmp.ProfileId,tmp.Gender,tmp.Age,tmp.Height,tmp.Religion,tmp.CastDivision,tmp.Subcaste,tmp.Star,tmp.Raasi,tmp.City,tmp.State,tmp.ResidingCountry,tmp.EducationQual,tmp.EducationSpecialization";
		switch($argcase){
			case "generalsrc":{
				$rpsrcgarr = $this->postarrfn();
				$gnrlwhr = $this->commonsrc($rpsrcgarr);
				if($rpsrcgarr['chkphoto'] == "Photo"){
					$this->tbname = "tm_profile tmp,tm_image tmi,tm_family tmf";
				} else {
					$this->tbname = "tm_profile tmp,tm_family tmf";
				}
				if($rpsrcgarr){
				$this->whrarg = $gnrlwhr;
				$_SESSION['whrarg'] = $this->whrarg;
				}else{ $this->whrarg = $_SESSION['whrarg']; }
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);			
				break;
			}
			case "advancesrc":{
				$rpsrcadarr = $this->postarrfn();
				$adwhrctn = $this->commonsrc($rpsrcadarr);
				$radioarr = array("1"=>$rpsrcadarr[radioChildStatus],"2"=>$rpsrcadarr[rmang],"3"=>$rpsrcadarr[rfood],"4"=>$rpsrcadarr[radiosmoke],"5"=>$rpsrcadarr[rdrink]);
				$dbarray = array("1"=>ChildrenLivingStatus,"2"=>KujaDhosam,"3"=>Food,"4"=>Smoking,"5"=>Drinking);
				for($i=1;$i<6;$i++){
					if($radioarr[$i] != "" && $radioarr[$i] != "DM"){
						$adwhrctn .= " AND tmp.".$dbarray[$i]." = '".$radioarr[$i]."'"; }
				}
				if($rpsrcadarr['chkphoto'] == "Photo"){
					$this->tbname = "tm_profile tmp,tm_image tmi,tm_family tmf";
				} else {
					$this->tbname = "tm_profile tmp,tm_family tmf";
				}
				if($rpsrcadarr){
				$this->whrarg = $adwhrctn;
				$_SESSION['whrarg'] = $this->whrarg;
				}else{ $this->whrarg = $_SESSION['whrarg']; }
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);			
				break;
			}		
			case "profileidsrc":{
				$rpsrcparr = $this->postarrfn();
				$this->tbname = "tm_profile tmp,tm_family tmf";
				if($rpsrcparr[txtproid]){
				$this->whrarg = " WHERE tmp.ProfileId != '".$_SESSION['ProfileId']."' AND tmp.ProfileId = '$rpsrcparr[txtproid]' AND tmp.ProfileId = tmf.ProfileId AND tmp.Adminstatus = 'A'";
				$_SESSION['whrarg'] = $this->whrarg;
				}else{ $this->whrarg = $_SESSION['whrarg']; }
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);			
				break;
			}
			case "keywordsrc":{
				$rpsrckarr = $this->postarrfn();
				if($rpsrckarr['chkphoto'] == "Photo"){
					$this->tbname = "tm_profile tmp,tm_family tmf,tm_image tmi";
				} else {
				$this->tbname = "tm_profile tmp,tm_family tmf";
				}

				$whrctnchk = $this->commonsrc($rpsrckarr);
				if($rpsrckarr){
				$this->whrarg = $whrctnchk." AND (tmp.LoginId like '%$rpsrckarr[txtkeyword]%' OR tmp.FirstName like '%$rpsrckarr[txtkeyword]%' OR tmp.Citizenchip like '%$rpsrckarr[txtkeyword]%' OR tmp.CastDivision like '%$rpsrckarr[txtkeyword]%' OR tmp.ResidingCountry like '%$rpsrckarr[txtkeyword]%' OR tmp.EducationCat like '%$rpsrckarr[txtkeyword]%' OR tmp.ProfileCategory like '%$rpsrckarr[txtkeyword]%' OR tmp.Star like '%$rpsrckarr[txtkeyword]%' OR tmp.Occupation like '%$rpsrckarr[txtkeyword]%' OR tmp.Employementtype like '%$rpsrckarr[txtkeyword]%' OR tmp.MaritialStatus like '%$rpsrckarr[txtkeyword]%' OR tmp.Religion like '%$rpsrckarr[txtkeyword]%' OR tmp.Subcaste like '%$rpsrckarr[txtkeyword]%' OR tmp.PhysicalStatus like '%$rpsrckarr[txtkeyword]%' OR tmp.ChildrenLivingStatus like '%$rpsrckarr[txtkeyword]%' OR tmp.KujaDhosam like '%$rpsrckarr[txtkeyword]%' OR tmp.Food like '%$rpsrckarr[txtkeyword]%' OR tmp.Smoking like '%$rpsrckarr[txtkeyword]%' OR tmp.Drinking like '%$rpsrckarr[txtkeyword]%' OR tmf.Familyvalue like '%$rpsrckarr[txtkeyword]%' OR tmf.Familytype like '%$rpsrckarr[txtkeyword]%' OR tmf.Familystatus like '%$rpsrckarr[txtkeyword]%' OR tmf.Aboutfamily like '%$rpsrckarr[txtkeyword]%')";
				$_SESSION['whrarg'] = $this->whrarg;
				}else{ $this->whrarg = $_SESSION['whrarg']; }
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);
				break;
			}
			case "similar":{
				$this->tbname = "tm_profile tmp,tm_family tmf";
				if($_REQUEST[gender]){		
				$this->whrarg = " WHERE tmp.Gender = '$_REQUEST[gender]' AND tmp.Age = '$_REQUEST[age]' AND tmp.Height = '$_REQUEST[height]' AND tmp.Religion like '%$_REQUEST[religion]%' AND tmp.CastDivision like '%$_REQUEST[caste]%' AND tmp.Subcaste like '%$_REQUEST[subcaste]%' AND tmp.Star like '%$_REQUEST[star]%' AND tmp.Raasi like '%$_REQUEST[raasi]%' AND tmp.City like '%$_REQUEST[city]%' AND tmp.State like '%$_REQUEST[state]%' AND tmp.ResidingCountry like '%$_REQUEST[country]%' AND tmp.EducationQual like '%$_REQUEST[eduquali]%' AND tmp.EducationSpecialization like '%$_REQUEST[eduspl]%' AND tmp.Adminstatus = 'A'";
				$_SESSION['whrarg'] = $this->whrarg;
				}else{ $this->whrarg = $_SESSION['whrarg']; }
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);
			}		
			/*case "home":{
				$this->tbname = "tm_profile tmp,tm_family tmf";
				if($_REQUEST[rel]){
					$ctn = " AND tmp.Religion = '$_REQUEST[rel]'";
				}elseif($_REQUEST[cst]){
					$ctn = " AND tmp.CastDivision = '$_REQUEST[cst]'";
				} else if($_REQUEST[lng]){
					$ctn = " AND tmp.ProfileCategory = '$_REQUEST[lng]'";
				}
				$_SESSION['whrarg'] = " WHERE tmp.Gender = 'F' AND tmp.Age BETWEEN '18' AND '40' AND tmp.ProfileId = tmf.ProfileId AND tmp.Adminstatus = 'A'".$ctn;
				$this->whrarg = $_SESSION['whrarg'];
				$this->switchqry($this->tbname,'SELECT',$this->whrarg,$this->dbfldarg);
				$srcnum = mysql_num_rows($this->qry_result);
				$this->pagination($srcnum);
			} */		
		}
	}
}
$commonsearch = new commonsearch();
$searchcase = $_REQUEST['searchindex'];
$searchType = $_REQUEST['type'] ? $_REQUEST['type'] : 'gs';
if($_REQUEST['searchindex'] != ""){
	$commonsearch->search_case($searchcase);
	include("templates/homeheader.template.php");
	include("templates/search_result.php");
	include("templates/homefooter.template.php");
} else {
	include("templates/homeheader.template.php");
	if($searchType == 'gs')
		include("templates/general_search.php");
		$_SESSION['whrarg'] = "";
	if($searchType == 'as')
		include("templates/advanced_search.php");
		$_SESSION['whrarg'] = "";
	if($searchType == 'ps')
		include("templates/profile_id_search.php");
		$_SESSION['whrarg'] = "";
	if($searchType == 'kes')
		include("templates/keyword_search.php");
		$_SESSION['whrarg'] = "";
	include("templates/homefooter.template.php");
}
?>