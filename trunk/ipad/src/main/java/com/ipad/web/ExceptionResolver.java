/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.builder.ToStringBuilder;
import org.apache.commons.lang.builder.ToStringStyle;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.jdbc.CannotGetJdbcConnectionException;
import org.springframework.jdbc.datasource.lookup.DataSourceLookupFailureException;
import org.springframework.stereotype.Component;
import org.springframework.web.servlet.HandlerExceptionResolver;
import org.springframework.web.servlet.ModelAndView;

/**
 * Global exception resolver to trap exceptions raised<br>
 * by various classes in the application.
 * <p>
 * Connection failure exceptions are logged as with level FATAL.
 * <p>
 * @return ModelAndView - Error response Xml is generated and returned as ModelAndView.
 */
@Component
public class ExceptionResolver implements HandlerExceptionResolver {
  private static Log logger = LogFactory.getLog(ExceptionResolver.class);

  WebHelper webHelper = WebHelper.getInstance();

  @Override
  public ModelAndView resolveException(HttpServletRequest request, HttpServletResponse response, Object handler, Exception e) {
    if ((e instanceof CannotGetJdbcConnectionException) || (e instanceof DataSourceLookupFailureException)) {
      logger.fatal("Failed to get database connection : " + e.getMessage(), e);
    } else {
      logger.error("Caught exception while processing request : " + request.getMethod() + " : " + request.getRequestURL(), e);
    }
    return webHelper.buildModelAndViewWithResponse(ToStringBuilder.reflectionToString(e, ToStringStyle.MULTI_LINE_STYLE));
  }

}
