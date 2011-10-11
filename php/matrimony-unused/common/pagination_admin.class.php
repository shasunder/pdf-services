<?php
@session_start(); @ob_start();

class Pagination
{
    var $output = '';    
    var $options = array(
        'urlscheme' => '',
        'perpage' => '',
        'page' => '',
        'total' => '',
        'numlinks' => '',
        'nexttext' => 'Next',
        'prevtext' => 'Previous',
        'focusedclass' => '',
        'delimiter' => ','
    );
   
   function Pagination() {
	   echo $this->options['page'];
	    $this->options['page'] = max(1,intval($_GET['page']));
		$this->options['nexttext'] = '<span style="font-size:8px;font-weight:bold">Next ></span>';
		$this->options['prevtext'] = '<span style="font-size:8px;font-weight:bold">< Previous</span>';
		$this->options['lasttext'] = '<span style="font-size:8px;font-weight:bold">Last >></span>';
		$this->options['firsttext'] = '<span style="font-size:8px;font-weight:bold"><< First</span>';
		$this->options['focusedclass'] = '';
		$this->options['delimiter'] = '&nbsp;';
		$this->options['numlinks'] = '10';
   }
   function set($who,$what){
       $this->output = '';
       $this->options[$who] = $what;
   }
   
   function checkValues(){
       $errors = array();
       if($this->options['perpage']=='') $errors[] = 'Invalid perpage value';
       if($this->options['page']=='') $errors[] = 'Invalid page value';
       if($this->options['total']=='') $errors[] = 'Invalid total value';
       if($this->options['numlinks']=='') $errors[] = 'Invalid numlinks value';
   }
   function display($return = false){
       $this->checkValues();
       if($this->output=='') $this->generateOutput();
       if(!$return)  echo $this->output;
       else return $this->output;
   }
   function generateOutput(){
       $elements = array();

if($this->options['perpage']=='')
	   {
	$num_pages='1';
	   }
	   else
	   {
       $num_pages = ceil($this->options['total']/$this->options['perpage']);
	   }
       $front_links = ceil($this->options['numlinks']/2);
       $end_links = floor($this->options['numlinks']/2);
       if($this->options['page'] > $num_pages){ $this->set('page',1); }
       $start_page = max(1,($this->options['page']-$front_links+1));
       $end_page = min($this->options['numlinks'] + $start_page-1,$num_pages);
	  if($this->options['page'] > 1){
		   $elements[] = $this->generate_link(1,$this->options['firsttext']);
           $elements[] = $this->generate_link($this->options['page']-1,$this->options['prevtext']);
       }
        for($i=$start_page;$i<=$end_page;$i++){
           $elements[] = $this->generate_link($i);
       }
        if($this->options['page'] < $num_pages){
           $elements[] = $this->generate_link($this->options['page']+1,$this->options['nexttext']);
		   $elements[] = $this->generate_link($num_pages,$this->options['lasttext']);
       }
     $this->output = implode($this->options['delimiter'],$elements);
   }
   function generate_link($page,$label='')
   {
  	$fname = basename($_SERVER['PHP_SELF'],".php");

  		$url = str_replace('%page%',$page,$this->options['urlscheme']);

		if($page>1) 
		{
			$sno = (($page-1)*$this->options['perpage']);
			$url .="&b=".$sno."&verified=".$_REQUEST['verified']."&status=".$_REQUEST['status']."&sortorder=".$_REQUEST['sortorder']."&sortby=".$_REQUEST['sortby']."&searchname=".$_REQUEST['searchname']."&fromdate=".$_REQUEST['fromdate']."&todate=".$_REQUEST['todate']."&userID=".$_REQUEST['userID']."&city=".$_REQUEST['city']."&area=".$_REQUEST['area']."&alpha=".$_REQUEST['alpha'];
		}
		else if($page == 1) 
		{
			$url .="&verified=".$_REQUEST['verified']."&status=".$_REQUEST['status']."&sortorder=".$_REQUEST['sortorder']."&sortby=".$_REQUEST['sortby']."&searchname=".$_REQUEST['searchname']."&fromdate=".$_REQUEST['fromdate']."&todate=".$_REQUEST['todate']."&userID=".$_REQUEST['userID']."&city=".$_REQUEST['city']."&area=".$_REQUEST['area']."&alpha=".$_REQUEST['alpha'];
		}
		if($label=='') $label=$page;
		if($page==$this->options['page']) {
			$html = "{$label}";
		}
		else {
		if($fname == 'ManageUser') {
			$link = 'ManageUser.php'; }
		if($fname == 'ManageFamily') {
			$link = 'ManageFamily.php'; }
		if($fname == 'ManagePartner') {
			$link = 'ManagePartner.php'; }
		if($fname == 'ManageMessage') {
			$link = 'ManageMessage.php'; }
		if($fname == 'ManageInterest') {
			$link = 'ManageInterest.php'; }
		if($fname == 'InterestMessage') {
			$link = 'InterestMessage.php'; }
		if($fname == 'ManageImage') {
			$link = 'ManageImage.php'; }
			
		$html ="<span class='login' onclick=classified_ajax('".$link.$url."') style='border:0px solid blue;width:5px;font-size:9px;color:blue;padding:3px;cursor:pointer;'>{$label}</span>";
		}
		return $html;
   }
  function show_info() {
		if($this->options['offset'] >= $this->options['total'] || $this->options['offset'] < 0) return false;
		$_from = $this->options['offset'] + 1;
		$this->options['offset'] + $this->options['perpage'] >= $this->options['total'] ? $_to = $this->options['total'] : $_to = $this->options['offset'] + $this->options['perpage'];
		$return .= "Displaying results " . $_from . " - " . $_to . " of " .$this->options['total'];
		return $return;
	}

	function selectRecords($arguments,$page,$condition,$search,$orderBy,$limit,$WebPage)
	{
		if(($condition=="")&&($search==""))
		{
			$this->query=mysql_query("select ".$arguments." from ".$page." ".$orderBy.$limit);
			//echo "select ".$arguments." from ".$page." ".$orderBy.$limit;
		}
		else
		{
			$this->query=mysql_query("select ".$arguments." from ".$page." where ".$condition." ".$search." ".$orderBy." ".$limit);
			//echo "select ".$arguments." from ".$page." where ".$condition." ".$search." ".$orderBy." ".$limit;
		}
	}
}
?>