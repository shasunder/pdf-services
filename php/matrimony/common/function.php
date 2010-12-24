<?php
class matrimony
{	
	function bgautoId($Id,$tname,$bgid,$cat){/*---------- for MarryBanjara profile autoid generate -----------*/
		$arg1 = " WHERE ProfileCategory ='$cat'";
		$arg2 = "Max(".$Id.")";
		$this->switchqry($tname,'SELECT',$arg1,$arg2);
		$res = mysql_fetch_array($this->qry_result);
		return $this->id =$res['Max('.$Id.')']+1;
	}
	function postarrfn(){/*---------- for getting allposted values for all pages -----------*/
			foreach ($_POST as $field=>$value){
				$postarr[$field] = mysql_real_escape_string($value);	
			}return $postarr;
	}
	public function RegSession_Register(){/*---------- for session register-----------*/
		session_register('valid');
		session_register('LoginId');
		session_register('EmailId');
		session_register('ProfileId');
		session_register('Gender');
		session_register('ProfileStatus');
		session_register('lng');
		session_register('rel');
	}	
	function exploadhdn($argfield){/*---------- for explode the posted hidden textboxes values and getting as a string for search in contition-----------*/
		$strctrl = "";
		$exarr = $argfield;
		$exstrloop = explode(",",$exarr);
		$sizeexe = sizeof($exstrloop);
		for($i=0; $i < $sizeexe; $i++){
			if($exstrloop[$i] != ""){
				if($strctrl!=''){
					$strctrl .=",'".$exstrloop[$i]."'";
				}else{ $strctrl ="'".$exstrloop[$i]."'"; }			
			}
		}return $strctrl;	
	}
	function getheightcm($argddl){/*---------- for explode the posted heightddlctrl as cm for insertion and search-----------*/
			$localarg = $argddl;			
			$exstrddl = explode(" ",$localarg);
			return $exstrddl[2];
	}
	function switchqry($tname,$action,$arg1,$arg2){/*---------- for all querys insertion,updation,select and deletion-----------*/
	  if($action=="INSERT"){ 
		$query="insert into $tname($arg1) values($arg2)"; }
	  else if($action=="UPDATE"){ 
		$query="update $tname SET ".$arg1; }
	  else if($action=="DELETE"){ 
		$query="delete from $tname".$arg1; }
	  else if($action=="SELECT"){ 
		$query="select $arg2 from $tname".$arg1; }
		
      $this->qry_result = mysql_query($query) or die("could not execute query".mysql_error());
	}
	function commonsrc($cmnarr){/*---------- for getting general and advance search common criteria where condition as string-----------*/
			$retctzn = $this->exploadhdn($cmnarr[citizenhd]);
			$retcmty = $this->exploadhdn($cmnarr[communityhd]);
			$retcntry = $this->exploadhdn($cmnarr[countryhd]);
			$retctgry = $this->exploadhdn($cmnarr[categoryhd]);
			$retmothr = $this->exploadhdn($cmnarr[motherhd]);
			$retstar = $this->exploadhdn($cmnarr[starhd]);
			$retocc = $this->exploadhdn($cmnarr[occhd]);
			$retemptyp = $this->exploadhdn($cmnarr[emptypeHd]);			
			$rethfrmcm = $this->getheightcm($cmnarr[ddlheightfrm]);
			$rethtocm = $this->getheightcm($cmnarr[ddlheightto]);
			if($_SESSION['ProfileId']){
				$whrctn .= " WHERE tmp.ProfileId != '".$_SESSION['ProfileId']."' AND tmp.ProfileId = tmf.ProfileId AND tmp.Gender = '$cmnarr[gender]' AND tmp.Age BETWEEN '$cmnarr[txtagefrm]' AND '$cmnarr[txtageto]' AND tmp.Adminstatus = 'A'";
			} else {
				$whrctn.=" WHERE tmp.ProfileId = tmf.ProfileId AND tmp.Gender = '$cmnarr[gender]' AND tmp.Age BETWEEN '$cmnarr[txtagefrm]' AND '$cmnarr[txtageto]' AND tmp.Adminstatus = 'A'";
			}
			$rethdarr = array("1"=>$retctzn,"2"=>$retcmty,"3"=>$retcntry,"4"=>$retctgry,"5"=>$retmothr,"6"=>$retstar,"7"=>$retocc,"8"=>$retemptyp);
			$dbfldsarr = array("1"=>Citizenchip,"2"=>CastDivision,"3"=>ResidingCountry,"4"=>EducationCat,"5"=>ProfileCategory,"6"=>Star,"7"=>Occupation,"8"=>Employementtype);
			for($i=1;$i<9;$i++){
				if($rethdarr[$i]!=""){
					$whrctn .= " AND tmp.".$dbfldsarr[$i]." IN (".$rethdarr[$i].")"; } 
			}
			if($cmnarr[chkany] != "DM"){
			$whrloop = "";			
			$chkarr = array("1"=>$cmnarr[chkunmarried],"2"=>$cmnarr[chkwidow],"3"=>$cmnarr[chkdivorced],"4"=>$cmnarr[chkseperated]);
			$whrin .= " AND tmp.MaritialStatus IN (";
			for($i=1;$i<5;$i++){
				if($chkarr[$i]!=""){
					if($whrloop!=''){
						$whrloop .= ",'".$chkarr[$i]."'";
					}else{ $whrloop .="'".$chkarr[$i]."'"; }			
				}
			}if($whrloop != ''){ $whrctn .= $whrin.$whrloop.")"; }
			}
			if($cmnarr[ddlReligion] != "" && $cmnarr[ddlReligion] != "- Select Religion -"){ $whrctn .= " AND tmp.Religion = '$cmnarr[ddlReligion]'"; }
			if($cmnarr[txtsubcaste] != ""){ $whrctn .= " AND tmp.Subcaste = '$cmnarr[txtsubcaste]'"; }
			if($rethfrmcm != "" && $rethtocm != ""){ $whrctn .= " AND tmp.Height BETWEEN '$rethfrmcm' AND '$rethtocm'"; }
			if($cmnarr[ddlphysical] != "" && $cmnarr[ddlphysical] != "Select"){ $whrctn .= " AND tmp.PhysicalStatus = '$cmnarr[ddlphysical]'"; }
			if($cmnarr[chkphoto] == "Photo"){ $whrctn .= " AND tmp.ProfileId = tmi.Profile_ID"; }
			if($cmnarr[jscal_field_date_start] != ""){ $whrctn .= " AND tmp.DOJ >= '$cmnarr[jscal_field_date_start]'"; }

			if($_SESSION['ProfileId']){
				$whr = " where ProfileId = '".$_SESSION['ProfileId']."'";
				if($cmnarr[rsearchby] == "LastLogin"){ 
					$this->switchqry('tm_profile','SELECT',$whr,'LastVisted');
					$res=mysql_fetch_array($this->qry_result);
					$date = $_SESSION['LastVisted'];
					$whrctn .= " AND tmp.DOJ >= '$date'";
				}
				if($cmnarr[rsearchby] == "DateUpdated"){ 
					$this->switchqry('tm_profile','SELECT',$whr,'LastVisted');
					$res=mysql_fetch_array($this->qry_result);
					$date = $_SESSION['DOM'];
					$whrctn .= " AND tmp.DOJ >= '$date'";
				}
			}
			return $whrctn;
	}
	function pagination($argnumres){/*---------- for all search result common pagination-----------*/
			$this->total_items = $argnumres;
			$this->pagename = basename($_SERVER['PHP_SELF']);		
			$this->limit = $_GET['limit'];
			$this->page = $_GET['page'];
			if ((!$this->limit) || (is_numeric($this->limit) == false) || ($this->limit < 10) ||
			($this->limit > 50)) {
				$this->limit = 5;
			}
			if ((!$this->page) || (is_numeric($this->page) == false) || ($this->page < 0) ||
			($this->page > $this->total_items)) {
				$this->page = 1;
			}
			$this->total_pages = ceil($this->total_items / $this->limit);
			$this->set_limit = $this->page * $this->limit - ($this->limit);
			$this->sql_limit = " LIMIT $this->set_limit, $this->limit";
			$this->whrlimit = $this->whrarg.$this->sql_limit;
			$this->switchqry($this->tbname,'SELECT',$this->whrlimit,$this->dbfldarg);
			$this->prev_page = $this->page - 1;

			$this->pageval = $this->set_limit + 1;
			if ($this->total_items >= 5) {
			$this->endval = $this->set_limit + 5;
			if ($this->endval > $this->total_items) {
				$this->remval = $this->endval - $this->total_items;
				$this->endval = $this->pageval + (4 - $this->remval);}
			} else {
				$this->endval = $this->set_limit + $this->total_items;
			}
			$this->totalval = $this->total_items;
			$this->next_page = $this->page + 1;
			$i=0;
			while($pageres = mysql_fetch_assoc($this->qry_result)){
				$this->page_val[$i][FirstName] = $pageres[FirstName];
				$this->page_val[$i][MiddleName] = $pageres[MiddleName];
				$this->page_val[$i][LastName] = $pageres[LastName];
				$this->page_val[$i][ProfileId] = $pageres[ProfileId];
				$this->page_val[$i][Age] = $pageres[Age];
				$this->page_val[$i][Gender] = $pageres[Gender];			
				$this->page_val[$i][Height] = $pageres[Height];
				$this->page_val[$i][Religion] = $pageres[Religion];
				$this->page_val[$i][CastDivision] = $pageres[CastDivision];
				$this->page_val[$i][Subcaste] = $pageres[Subcaste];
				$this->page_val[$i][Star] = $pageres[Star];
				$this->page_val[$i][Raasi] = $pageres[Raasi];
				$this->page_val[$i][City] = $pageres[City];
				$this->page_val[$i][State] = $pageres[State];
				$this->page_val[$i][ResidingCountry] = $pageres[ResidingCountry];
				$this->page_val[$i][EducationQual] = $pageres[EducationQual ];
				$this->page_val[$i][EducationSpecialization] = $pageres[EducationSpecialization];
				$i++;}
	}
	function sendmsg($fromid,$toid,$intid){/*---------- for search result sendmessage button display-----------*/
		$whr = " where Interest_From = '".$fromid."' and Interest_To= '".$toid."' and Interest_Cstatus='A' and Int_id='$intid'";
		$this->switchqry('tm_interest','SELECT',$whr,'Interest_msgid');
		$this->msgnum = mysql_num_rows($this->qry_result);
	}
	function image_fetch($profile_id,$pg){/*---------- for all pages image-----------*/
		if($pg=='sr'){
			$arg1 = " WHERE Profile_ID = '".$profile_id."' AND Image_Status='A'";
		} else {
			$arg1 = " WHERE Profile_ID = '".$profile_id."'";
		}
		$this->switchqry('tm_image','SELECT',$arg1,'*');
		$this->imgnum = mysql_num_rows($this->qry_result);
		if($this->imgnum != 0){$j=0;
		while ($imgresult = mysql_fetch_array($this->qry_result)){
			$this->img_data[$j][Profile_ID] = $imgresult[Profile_ID];
			$this->img_data[$j][Image_Name] = $imgresult[Image_Name];
			if($imgresult[Image_Content]=='new'){
				$this->img_data[$j][image_thumb] = $imgresult[image_thumb];
			}else{
				$this->img_data[$j][image_thumb] = $imgresult[image_thumb];
			}
			$this->img_data[$j][image_small] = $imgresult[image_small];
			$this->img_data[$j][Image_Status] = $imgresult[Image_Status];
			$this->img_data[$j][Image_ID] = $imgresult[Image_ID];
			$j++;}
		}
	}
	function uploadImage(){/*---------- for all pages image upload-----------*/
		$imageName=$_FILES['file']['name'];
		$tmpName=$_FILES['file']['tmp_name'];
		$this->imageName=addslashes($imageName);
		$name=explode(".",$this->imageName); 
		$name[0]=$_SESSION['ProfileId']."_".$name[0]."_".rand(1000,10000);
		$str=array($name[0],$name[1]); 
		$this->imageName=implode(".",$str);
		move_uploaded_file($tmpName,"./member_image/".$this->imageName);
		return $this->imageName;
	}
	function uploadImages(){/*---------- for all pages image upload admin-----------*/
		$imageName=$_FILES['file']['name'];
		$tmpName=$_FILES['file']['tmp_name'];
		$this->imageName=addslashes($imageName);
		$name=explode(".",$this->imageName); 
		$name[0]=$_REQUEST['Id']."_".$name[0]."_".rand(1000,10000);
		$str=array($name[0],$name[1]); 
		$this->imageName=implode(".",$str);
		move_uploaded_file($tmpName,"../member_image/".$this->imageName);
		return $this->imageName;
	}
	function seturl(){/*---------- for all pages header settings-----------*/
		if($_SESSION['count'] != 1){
			if($_REQUEST['lng']){
				$reqlng = $_REQUEST['lng'] ? $_REQUEST['lng'] : "Tamil";
			} else if($_REQUEST['rel']) {
				$reqlng = $_REQUEST['rel']? $_REQUEST['rel'] : "Hindu";
			}
			$_SESSION['count'] = 1;
			$_SESSION['lng'] = $reqlng;
		} else {
			if($_REQUEST['lng']){
				$reqlng = $_REQUEST['lng'] ? $_REQUEST['lng'] : $_SESSION['lng'];
			} else if($_REQUEST['rel']) {
				$reqlng = $_REQUEST['rel']? $_REQUEST['rel'] : $_SESSION['lng'];
			}else{
				$reqlng = $_SESSION['lng'];
			}
			$_SESSION['lng'] = $reqlng;
		}
	}
}
$matrimony=new matrimony();
if($_REQUEST['lng'] || $_REQUEST['rel']){
	$matrimony->seturl();
}
?>