/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import static org.easymock.EasyMock.expect;
import static org.easymock.classextension.EasyMock.createMock;
import static org.easymock.classextension.EasyMock.replay;
import static org.hamcrest.CoreMatchers.is;
import static org.junit.Assert.assertThat;

import org.junit.After;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mock.web.MockHttpServletRequest;
import org.springframework.mock.web.MockHttpServletResponse;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.TestExecutionListeners;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.support.DependencyInjectionTestExecutionListener;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.DefaultMockBuilder;
import com.ipad.common.PdfException;
import com.ipad.common.Constants;

import com.ipad.service.PdfService;
import com.ipad.service.PdfServiceImpl;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
@TestExecutionListeners({DependencyInjectionTestExecutionListener.class})

public class PdfControllerIntegrationTest {
  DefaultMockBuilder mockBuilder = DefaultMockBuilder.getInstance();

  @Autowired
  PdfController pdfController;

  @Autowired
  PdfService pdfService;

  @Autowired 
  PdfExceptionResolver pdfExceptionResolver;
  
  @After
  public void tearDown() {
    pdfController.setPdfService(pdfService);
  }

  @Test
  public void testGetByIdWhenServerError() throws Exception{
    // given
    MockHttpServletRequest request = new MockHttpServletRequest();
    MockHttpServletResponse response = new MockHttpServletResponse();
    String pdfId = "1";
    PdfService mockPdfService = new PdfServiceImpl() {
      @Override
      public Pdf readById(String pdfId) throws PdfException {
        throw new RuntimeException("Connection failure");
      }
    };
    pdfController.setPdfService(mockPdfService);
    
    // when
    try{
      pdfController.getById(pdfId, response);
    }catch (Exception e) {
      ModelAndView resolveException = pdfExceptionResolver.resolveException(request, response, null, e);
      assertThat(resolveException.getViewName(),is( Constants.WEB_XML_VIEW));
      assertThat((String)resolveException.getModel().get(Constants.WEB_XML_RESPONSE), is("<?xml version=\"1.0\" encoding=\"UTF-8\"?><response id=\"\"><errorcode>-1</errorcode><error><![CDATA[Connection failure]]></error></response>"));
    }
  }
  
  @Test
  public void testGetByIdWhenPdfFound() throws Exception {
    // given
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setParameter("pdfId", pdfId);

    PdfService mockPdfService = createMock(PdfService.class);
    expect(mockPdfService.readById(pdfId)).andReturn(pdf);
    replay(mockPdfService);

    pdfController.setPdfService(mockPdfService);

    // when
    pdfController.getById(pdfId, mockResponse);

    // then
    assertThat(mockResponse.getStatus() + "", is("200"));

  }
}
