/*
 * @author Sandeep.Maloth
 */
package com.ipad.common;

public interface Constants {

  //messages
  String MESSAGE_BRANCH_CREATED = "Pdf created successfully.";
  String MESSAGE_BRANCH_UPDATED = "Update was successful.";
  String MESSAGE_BRANCH_DELETED = "Deletion was successful.";

  //Database constants
  String SQL_TABLE_BRANCHES_COLUMN_BRANCH_XML = "BRANCH_XML";
  
  String SQL_IN_PARAM_BRANCH_XML = "p_xml";
  String SQL_IN_PARAM_BRANCH_ID = "p_pdf_id";
  String SQL_IN_PARAM_COMPANY_NAME = "p_companyname";
  String SQL_IN_PARAM_POSTCODE = "p_postcode";
  
  String SQL_OUT_PARAM_BRANCH_ID = "p_pdf_id";
  String SQL_OUT_PARAM_TRANSACTION_ID = "p_transaction_id";
  String SQL_OUT_PARAM_ERROR_CODE = "p_error_code";
  String SQL_OUT_PARAM_ERROR_DESC = "p_error_desc";
  String SQL_OUT_PARAM_BRANCH_XML = "p_out_pdf";
  String SQL_OUT_PARAM_MATCHES_XML = "p_out_matches";
  
  //error codes
  String ERROR_CODE_400="400";
  String ERROR_CODE_404="404";
  String ERROR_CODE_500="500";
  
  //string constants
  String WEB_XML_VIEW = "xmlView";
  String WEB_RESPONSE = "message";

  String WEB_ERROR_RESPONSE = "message";
  String EMPTY_STRING = "";
  char CHAR_LESS_THAN = '<';
  char CHAR_GREATER_THAN = '>';
  char CHAR_FORWARD_SLASH = '/';
  String CDATA_OPEN = "<![CDATA[";
  String CDATA_END="]]>";
  String XML_DECLARATION="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  String ENCODING_UTF_8="utf-8";
  String XML_CONTENT_TYPE = "text/xml";
  String VIEW_XML_CONTENT_TYPE = "text/xml; charset=UTF-8";
  String TAB = "\t";
  String NEW_LINE = System.getProperty("line.separator");
  
}
