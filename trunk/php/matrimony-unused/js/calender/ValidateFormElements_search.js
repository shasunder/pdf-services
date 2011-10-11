// JavaScript Document

/*........................List of functions......................

trimLeftRightSpaces()
trimLeftSpaces()
trimRightSpaces()
trimInteriorintoOne()
trimInteriorintoNo()
isNumberofCharsEqual()
isNumberofCharsMore()
isNumberofCharsLess()
checkAll()
unCheckAll()
isSelected()
isEmpty()
getSelectedValues()
selectAll()
deSelectAll()

......................***************...........................*/



//trims the unwanted spaces on both the left and right sides

function trimLeftRightSpaces(obj)
 {
	 
	strToTrim = obj.value;
	strTrim = strToTrim.replace(/^(\s*)|(\s*)$/g,"");
	return(strTrim);
 }
 
 //trims the unwanted spaces on the left side
 function trimLeftSpaces(obj)
  {
 	strToTrim = obj.value;
	strTrim = strToTrim.replace(/^(\s*)/g,"");
	return(strTrim); 
  }
  
   //trims the unwanted spaces on the right side
   function trimRightSpaces(obj)
  {
 	strToTrim = obj.value;
	strTrim = strToTrim.replace(/(\s*)$/g,"");
	return(strTrim); 
  }
  
//  trims the interior right unwanted spaces.
function trimInteriorintoOne(obj)
 {
 	strToTrim = obj.value;
	strTrim = strToTrim.replace(/\s{2,}/g," ");
	return(strTrim);
 }
 
 //  trims the interior right unwanted spaces.
function trimInteriorintoNo(obj)
 {
 	strToTrim = obj.value;
	strTrim = strToTrim.replace(/\s{2,}/g,"");
	return(strTrim);
 }
 
 // checks whether the number of chars in an object is equal to any given value
 function isNumberOfCharsEqual(obj,len1)
  {
  	isValid = false;
	var str = obj.value;
	var len2 = str.length;
	if (len1 == len2)
	{isValid = true;}
	return isValid;
  }
   
 // checks whether the number of chars in an object is more than the any given value
  function isNumberOfCharsMore(obj,len1)
   {
    isValid = false;
	var str = obj.value;
	var len2 = str.length;
	if (len2 > len1)
	{isValid = true;}
	return isValid; 
   }
 
  // checks whether the number of chars in an object is less than the any given value
   function isNumberOfCharsLess(obj,len1)
   {
    isValid = false;
	var str = obj.value;
	var len2 = str.length;
	if (len2 < len1)
	{isValid = true;}
	return isValid; 
   }
  function isOnlyAlphaNumeric(string)
 {
	if(string == "" ) return false;
 	var invalidCharRegExp = /[^a-z\d ]/i;
	var isValid = !(invalidCharRegExp.test(string));
	return isValid;
 }
  //check all checkboxes in a form
  function checkAll(frm)
   {
   	var frm_elements = frm.elements;	
	for(i = 0; i < frm_elements.length; i++)
	 {
	 	if(frm_elements[i].type == "checkbox")
		 {
		 	frm_elements[i].checked = "true";
		 }
	 }
   }
     
// uncheck all checkboxes in a form
  function unCheckAll(frm)
   {
   	var frm_elements = frm.elements;	
	for(i=0;i<frm_elements.length;i++)
	 {
	 	if(frm_elements[i].type == "checkbox")
		 {
		 	frm_elements[i].checked = "";
		 }
	 }
   }
 
// check and uncheck all checkboxes in a form
  function checkAndUnCheckAll(frm,obj)
   {
   	var frm_elements = frm.elements;	
	for(i=0;i<frm_elements.length;i++)
	 {
	 	if(frm_elements[i].type == "checkbox")
		 {
		 	if(frm_elements[i].name != "chk")
			 {
			 	frm_elements[i].checked = obj.checked;
			 }
		 }
	 }
   }
 
 
//to check whether a value is selected or not in a listbox
  function isSelected(obj)
   {
   	isValid = false;	
	var selIndex = obj.selectedIndex;
	if(selIndex != -1)
	 {
	 	isValid = true;
	 }
	 return isValid;
   }
   
// to check whether a text box or textarea is empty or not
   function isEmpty(obj)
    {
		isValid = false;
		if(trimLeftRightSpaces(obj)=="")
		 {
		 	isValid = true;
		 }
		return isValid; 
	}
	
//to get the selected values from a select type of from a list box...
function getSelectedValues(obj)
 {
 	var selectedValues = new Array();
	var j = 0;
	for(i = 0 ; i < obj.options.length ; i++)
	 {
		optionElement = obj.options[i];
	 	if(optionElement.selected)
		 {
		 	selectedValues[j] = optionElement.value;
			j++;
		 }
	 }
	 return selectedValues;
 }
 
 //to select all items in a listbox
 function selectAll(obj)
  {
  	for(i=0;i<obj.options.length;i++)
	 {
	 	obj.options[i].selected="true";
	 }	
  }
   
 //to deselect all items in a listbox 
 function deSelectAll(obj)
  {
  	for(i=0;i<obj.options.length;i++)
	 {
	 	obj.options[i].selected="";
	 }	
  }
  
  function getChecked(frm)
   {
   	var checkedValues =  new Array();
	var j = 0;
   	var frm_elements = frm.elements;	
	for(i=0;i<frm_elements.length;i++)
	 {
	 	if((frm_elements[i].type == "checkbox") & (frm_elements[i].checked == true))
			 {
		 		checkedValues[j] = frm_elements[i].name;
				j++;
	    	 }
	 }
	 return checkedValues;
   }