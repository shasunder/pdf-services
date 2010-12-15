 <?php
class commonCls {
/*-- CommonCls Class Starts --*/
	function commonCls(){
		$this->page = $_REQUEST['lng'] ? $_REQUEST['lng'] : $_SESSION['lng'];
		$this->getHeader($this->page);
	}//function commonCls()
	function getHeader($page){
		switch ($page){
			case 'main':$this->getHeaderPage();break;
			case 'Assameme':$this->getHeaderLanguage($page);break;
			case 'Bengali':$this->getHeaderLanguage($page);break;
			case 'Gujarati':$this->getHeaderLanguage($page);break;
			case 'Hindi':$this->getHeaderLanguage($page);break;
			case 'Kannada':$this->getHeaderLanguage($page);break;
			case 'Malayalee':$this->getHeaderLanguage($page);break;
			case 'Marathi':$this->getHeaderLanguage($page);break;
			case 'Marwadi':$this->getHeaderLanguage($page);break;
			case 'oriya':$this->getHeaderLanguage($page);break;
			case 'Parsi':$this->getHeaderLanguage($page);break;
			case 'Punjabi':$this->getHeaderLanguage($page);break;
			case 'Sindhi':$this->getHeaderLanguage($page);break;
			case 'Tamil':$this->getHeaderLanguage($page);break;
			case 'Telugu':$this->getHeaderLanguage($page);break;
			case 'Urdu':$this->getHeaderLanguage($page);break;
			case 'Hindu':$this->getHeaderLanguage($page);break;
			case 'Chrisitian':$this->getHeaderLanguage($page);break;
			case 'Muslim':$this->getHeaderLanguage($page);break;
			case 'Jain':$this->getHeaderLanguage($page);break;
			case 'Buddhist':$this->getHeaderLanguage($page);break;
			case 'Bahais':$this->getHeaderLanguage($page);break;
			case 'Chinese Folks':$this->getHeaderLanguage($page);break;
			case 'Confucianist':$this->getHeaderLanguage($page);break;
			case 'Ethnoreligionist':$this->getHeaderLanguage($page);break;
			case 'Jewish':$this->getHeaderLanguage($page);break;
			case 'Neoreligionist':$this->getHeaderLanguage($page);break;
			case 'Shintoist':$this->getHeaderLanguage($page);break;
			case 'Sikh':$this->getHeaderLanguage($page);break;
			case 'Spiritist':$this->getHeaderLanguage($page);break;
			case 'Taoist':$this->getHeaderLanguage($page);break;
			case 'Zorastrian':$this->getHeaderLanguage($page);break;

			case 'Adi Dravida':$this->getHeaderLanguage($page);break;
			case 'Agarwal':$this->getHeaderLanguage($page);break;
			case 'Ansari':$this->getHeaderLanguage($page);break;
			case 'Brahmin - Barendra':$this->getHeaderLanguage($page);break;
			case 'Bengali':$this->getHeaderLanguage($page);break;
			case 'Chettiar':$this->getHeaderLanguage($page);break;
			case 'Dheevara':$this->getHeaderLanguage($page);break;
			case 'Gounder':$this->getHeaderLanguage($page);break;
			case 'Gulf Muslims':$this->getHeaderLanguage($page);break;
			case 'Gujarati':$this->getHeaderLanguage($page);break;
			case 'Iyengar':$this->getHeaderLanguage($page);break;
			case 'Iyer':$this->getHeaderLanguage($page);break;
			case 'Kalar':$this->getHeaderLanguage($page);break;
			case 'Kesadhari':$this->getHeaderLanguage($page);break;
			case 'Kongu Vellala Gounder':$this->getHeaderLanguage($page);break;
			case 'Labbai':$this->getHeaderLanguage($page);break;
			case 'Maharashtrian':$this->getHeaderLanguage($page);break;
			case 'Mudaliyar':$this->getHeaderLanguage($page);break;
			case 'Nair - Vilakkithala':$this->getHeaderLanguage($page);break;
			case 'Nadar':$this->getHeaderLanguage($page);break;
			case 'Naidu':$this->getHeaderLanguage($page);break;
			case 'Naicker':$this->getHeaderLanguage($page);break;
			case 'Pillai':$this->getHeaderLanguage($page);break;
			case 'Punjabi':$this->getHeaderLanguage($page);break;
			case 'Reddy':$this->getHeaderLanguage($page);break;
			case 'Shia':$this->getHeaderLanguage($page);break;
			case 'Sunni Muslim':$this->getHeaderLanguage($page);break;
			case 'Thevar':$this->getHeaderLanguage($page);break;
			case 'Udayar':$this->getHeaderLanguage($page);break;
			case 'Vanniyar':$this->getHeaderLanguage($page);break;
			case 'Vysya':$this->getHeaderLanguage($page);break;
			case 'Yadav/Konar':$this->getHeaderLanguage($page);break;
			default :$this->getHeaderPage();break;
		}
	}
	function getHeaderPage(){
		$this->title="Matrimonials, Matrimonial, Indian Bride &amp; Groom, Marriage - Bride&amp;Groom.com";
		$this->keywords="Matrimonial, Matrimony, Indian Matrimonial - India Matrimonials";
		$this->desc="Matrimonials - Indian Matrimonial - Marriage -Bride &amp; Groom, The No.1 Matrimonial Services Provider. Add your Free Matrimonial Profile Now! and Contact Partners for FREE!";
	}

	function getHeaderLanguage($page){
			$this->title=$page." Matrimonials, ".$page." Matrimonial, ".$page." Bride &amp; Grooms - Bride&amp;Groom.com";
			$this->keywords=$page." Matrimonial, ".$page." Matrimonials, ".$page." Matrimony";
			$this->desc=$page." Matrimony, Exclusive Matrimony Portal for ".$page." from  Bride&amp;Groom.com";
	}

/*-- CommonCls Class Ends --*/
}
$commonCls = new commonCls();

?>