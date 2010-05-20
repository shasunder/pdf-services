/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import org.junit.Test;
import org.springframework.mock.web.MockHttpServletRequest;
import org.springframework.mock.web.MockHttpServletResponse;

public class LoggingInterceptorTest {

  @Test
  public void testAfterCompletion() throws Exception {
    LoggingInterceptor interceptor=new LoggingInterceptor();
    
    MockHttpServletRequest request = new MockHttpServletRequest();
    MockHttpServletResponse response = new MockHttpServletResponse();
    Exception ex=new RuntimeException();
    
    try{
    interceptor.afterCompletion(request, response, null, ex);
    }catch (Exception e) {
      //then no exceptions
    }
  }

  @Test
  public void testPostHandle() {
    LoggingInterceptor interceptor=new LoggingInterceptor();
    MockHttpServletRequest request = new MockHttpServletRequest();
    MockHttpServletResponse response = new MockHttpServletResponse();
    
    try{
    interceptor.postHandle(request, response,null, null);
    }catch (Exception e) {
      //then no exceptions
    }

  }

  @Test
  public void testPreHandle() {
    LoggingInterceptor interceptor=new LoggingInterceptor();
    MockHttpServletRequest request = new MockHttpServletRequest();
    MockHttpServletResponse response = new MockHttpServletResponse();
    
    try{
    interceptor.preHandle(request, response,null);
    }catch (Exception e) {
      //then no exceptions
    }
  }

}
