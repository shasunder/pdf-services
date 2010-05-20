/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.StringUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.web.servlet.HandlerInterceptor;
import org.springframework.web.servlet.ModelAndView;
import static com.ipad.common.Constants.*;
/**
 * Implements springs Controller interceptor to log request and response. 
 */
public class LoggingInterceptor implements HandlerInterceptor {

  private static Log logger = LogFactory.getLog(LoggingInterceptor.class);

  @Override
  public void afterCompletion(HttpServletRequest request, HttpServletResponse response, Object handler, Exception ex)
      throws Exception {
    if (ex != null) {
      logger.error("Exception while handling request : " + request.getMethod() + " " + request.getRequestURI(), ex);
    }
  }

  @Override
  public void postHandle(HttpServletRequest request, HttpServletResponse response, Object handler, ModelAndView modelAndView)
      throws Exception {
    if (logger.isInfoEnabled()) {
      logger.info("Completed handling request : " + request.getMethod() + " " + request.getRequestURI());
    }
  }

  @SuppressWarnings("unchecked")
  @Override
  public boolean preHandle(HttpServletRequest request, HttpServletResponse response, Object handler) throws Exception {
    if (logger.isInfoEnabled()) {
      logger.info("Received request for : " + request.getMethod() + " " + request.getRequestURI());
    }
    if (logger.isDebugEnabled()) {
      StringBuilder builder = new StringBuilder();
      builder.append(NEW_LINE);
      builder.append("Request details : ").append(NEW_LINE);
      builder.append(TAB + "client IP : " + request.getRemoteAddr() + "( Host : " + request.getRemoteHost() + ")").append(NEW_LINE);
      builder.append(TAB + "parameters : ").append(NEW_LINE);
      for (Object entry : request.getParameterMap().entrySet()) {
        Map.Entry entryMap = (Map.Entry) entry;
        Object value = entryMap.getValue();
        String valueStr[]= value!=null? (String[])value:null;
        builder.append(TAB + TAB + entryMap.getKey() + " = " + StringUtils.join(valueStr)).append(NEW_LINE);

      }
      builder.append(TAB + "request URI :" + request.getRequestURI()).append(NEW_LINE);
      builder.append(TAB + "request method :" + request.getMethod()).append(NEW_LINE);
      builder.append(TAB + "request headers :").append(NEW_LINE);
      java.util.Enumeration names = request.getHeaderNames();
      while (names.hasMoreElements()) {
        String name = (String) names.nextElement();
        String value = request.getHeader(name);
        builder.append(TAB + TAB + name + " = " + value).append(NEW_LINE);
      }

      logger.debug(builder.toString());
    }

    return true;
  }

}
