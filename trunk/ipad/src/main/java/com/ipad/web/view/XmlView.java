/*
 * @author Sandeep.Maloth
 */
package com.ipad.web.view;

import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.web.servlet.View;

import com.ipad.common.Constants;
import static com.ipad.common.Constants.*;

/**
 * Spring delegates to this view using BeanNameViewResolver<br>
 * using the view name available in ModelAndView.
 * <p>
 * The bean is named "xmlView" in spring context and returned<br>
 * in the ModelAndView by the Controller.
 * 
 */
public class XmlView implements View {
  static XmlView instance = new XmlView();

  public static XmlView getInstance() {
    return instance;
  }

  public String getContentType() {
    return Constants.VIEW_XML_CONTENT_TYPE;
  }

  @SuppressWarnings("unchecked")
  public void render(Map model, HttpServletRequest request, HttpServletResponse response) throws Exception {
    Object responseXml = model.get(Constants.WEB_RESPONSE);
    response.setContentType(XML_CONTENT_TYPE);
    response.setCharacterEncoding(ENCODING_UTF_8);
    response.setHeader("Cache-Control", "no-cache"); // HTTP 1.1
    response.setHeader("Pragma", "no-cache"); // HTTP 1.0
    response.setDateHeader("Expires", 0); // prevents caching at the proxy server
    response.getWriter().write(responseXml != null ? responseXml.toString() : Constants.EMPTY_STRING);
  }

}
