/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.io.IOUtils;
import org.apache.commons.lang.builder.ToStringBuilder;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.common.PdfException;
import com.ipad.common.Constants;
import com.ipad.common.util.XMLUtils;

import static com.ipad.common.Constants.*;
/**
 * Helper class to generate responses. 
 *
 */
public class WebHelper {
  private static XMLUtils xmlUtils = XMLUtils.getInstance();
  private static WebHelper instance = new WebHelper();

  private WebHelper() { // singleton
  }

  public static WebHelper getInstance() {
    return instance;
  }

  public String buildErrorResponse(Exception e, HttpServletResponse response) {
    if (e instanceof PdfException) {
      PdfException be = (PdfException) e;
      response.setStatus(be.getHttpErrorCode()!=null ? Integer.parseInt(be.getHttpErrorCode()) : HttpServletResponse.SC_BAD_REQUEST);
      return buildErrorResponse(be.getTransactionId(), be.getErrorCode(), be.getErrorMessage());
    } else {
      String errorMessage = e.getMessage() == null ? ToStringBuilder.reflectionToString(e.getStackTrace()) : e.getMessage();
      response.setStatus(HttpServletResponse.SC_INTERNAL_SERVER_ERROR);
      return buildErrorResponse("", "-1", errorMessage);
    }
  }

  public String buildErrorResponse(String transactionId, String errorCode, String errorMessage) {
    StringBuilder sb = new StringBuilder(XML_DECLARATION);
    sb.append("<response id=\"").append(transactionId).append("\">")
      .append(xmlUtils.getTag("errorcode", errorCode))
      .append(xmlUtils.getTagCData("error", errorMessage))
      .append("</response>");
    return sb.toString();
  }
  
  public String buildSuccessResponse(String transactionId, String message) {
    StringBuilder sb = new StringBuilder(XML_DECLARATION);
    sb.append("<response id=\"").append(transactionId).append("\">")
      .append(xmlUtils.getTagCData("message", message))
      .append("</response>");
    return sb.toString();
  }
  
  public String getContentBody(HttpServletRequest request) throws IOException {
    return IOUtils.toString(request.getInputStream(), Constants.ENCODING_UTF_8);
  }
  
  public Map<String, String> buildModelWithResponse(String message) {
    Map<String, String> model = new HashMap<String, String>();
    model.put(Constants.WEB_RESPONSE, message);
    return model;
  }
  
  public ModelAndView buildModelAndViewWithResponse(String message) {
    return new ModelAndView("message", buildModelWithResponse(message));
  }
}
