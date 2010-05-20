/*
 * @author Sandeep.Maloth
 */
package com.ipad.web.view;

import static org.hamcrest.CoreMatchers.is;
import static org.junit.Assert.assertThat;

import java.util.HashMap;
import java.util.Map;

import org.junit.Test;
import org.springframework.mock.web.MockHttpServletRequest;
import org.springframework.mock.web.MockHttpServletResponse;

import com.ipad.common.Constants;

public class XmlViewTest {

  @Test
  public void testRenderWhenNoResponseFound() throws Exception {
    
    //given
    XmlView xmlView = new XmlView();
    Map<String, Object> model = new HashMap<String, Object>();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();

    //when
    xmlView.render(model, mockRequest, mockResponse);
    
    //then
    String actual= mockResponse.getContentAsString();
    assertThat(actual, is(""));
  }

  @Test
  public void testRenderWhenResponseFound() throws Exception {
     
    //given
    XmlView xmlView = XmlView.getInstance();
    Map<String, Object> model = new HashMap<String, Object>();
    String testXml = "<test/>";
    model.put(Constants.WEB_XML_RESPONSE, testXml);
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    mockResponse.setContentType(Constants.XML_CONTENT_TYPE);
     
    //when
    xmlView.render(model, mockRequest, mockResponse);
    
    //then
    String actual= mockResponse.getContentAsString();
    assertThat(xmlView.getContentType(), is(Constants.VIEW_XML_CONTENT_TYPE));
    assertThat(actual, is(testXml));
    assertThat(mockResponse.getContentType(), is(Constants.XML_CONTENT_TYPE));
  }
}
