/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.CoreMatchers.notNullValue;
import static org.junit.Assert.assertThat;

import org.junit.Test;
import org.springframework.mock.web.MockHttpServletRequest;
import org.springframework.mock.web.MockHttpServletResponse;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.common.Constants;

public class PdfExceptionResolverTest {

  @Test
  public void testResolveException() {
   
  //given
  ExceptionResolver pdfExceptionResolver = new ExceptionResolver();
  MockHttpServletRequest request = new MockHttpServletRequest();
  MockHttpServletResponse response = new MockHttpServletResponse();
  Object handler=null;
  Exception e= new RuntimeException();

  //when
  ModelAndView modelAndView = pdfExceptionResolver.resolveException(request, response, handler, e);
  
  //then
  assertThat(modelAndView, is(notNullValue()));
  assertThat(modelAndView.getModel().get(Constants.WEB_XML_RESPONSE), is(notNullValue()));
  }
}
