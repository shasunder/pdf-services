/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import static org.easymock.EasyMock.expect;
import static org.easymock.classextension.EasyMock.createMock;
import static org.easymock.classextension.EasyMock.replay;
import static org.hamcrest.CoreMatchers.instanceOf;
import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.assertThat;
import static org.junit.Assert.fail;

import java.io.IOException;

import org.junit.Test;
import org.springframework.mock.web.MockHttpServletRequest;
import org.springframework.mock.web.MockHttpServletResponse;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.DefaultMockBuilder;
import com.ipad.common.PdfException;
import com.ipad.common.Constants;

import com.ipad.service.PdfService;
import com.ipad.service.PdfServiceImpl;

public class PdfControllerTest {

  DefaultMockBuilder mockBuilder = DefaultMockBuilder.getInstance();

  @Test
  public void testGetByIdWhenPdfFound() throws Exception {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);
    expect(pdfService.readById(pdfId)).andReturn(pdf);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    ModelAndView modelAndView = pdfController.getById(pdfId, mockResponse);
    String responseXml = (String) modelAndView.getModel().get(Constants.WEB_XML_RESPONSE);

    // then
    assertThat(responseXml, is(pdf.getPdfXml()));

  }

  @Test
  public void testGetByIdWhenPdfNotFound() throws Exception {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);

    PdfException pdfException = mockBuilder.getMockPdfException();
    pdfException.setHttpErrorCode("404");

    WebHelper.getInstance().buildErrorResponse(pdfException, mockResponse);

    expect(pdfService.readById(pdfId)).andThrow(pdfException);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.getById(pdfId, mockResponse);
      fail("Must throw PdfException");
    } catch (Exception e) {//then
      assertThat(e, instanceOf(PdfException.class));
    }

  }

  @Test
  public void testGetByIdWhenServerError() throws Exception {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    mockRequest.setParameter("pdfId", pdfId);
    final RuntimeException exception = new RuntimeException("DB connection failure");

    PdfService pdfService = new PdfServiceImpl() {
      @Override
      public Pdf readById(String pdfId) {
        throw exception;
      }
    };

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.getById(pdfId, mockResponse);
      fail("Must throw IllegalStateException");
    } catch (Exception e) { // then
      assertThat(e, instanceOf(RuntimeException.class));
    }

  }

  @Test
  public void testPostWhenCreationSuccessful() throws IOException {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setContent(pdf.getPdfXml().getBytes());
    String transactionId = "1";
    String expectedResponse = WebHelper.getInstance().buildSuccessResponse(transactionId, Constants.MESSAGE_BRANCH_CREATED);
    pdf.setTransactionId(transactionId);

    PdfService pdfService = createMock(PdfService.class);
    expect(pdfService.create(pdf.getPdfXml())).andReturn(pdf);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    ModelAndView modelAndView = pdfController.post(mockRequest, mockResponse);
    String responseXml = (String) modelAndView.getModel().get(Constants.WEB_XML_RESPONSE);

    // then
    assertThat(expectedResponse, is(responseXml));
    assertThat(mockResponse.getStatus() + "", is("201"));

  }

  @Test
  public void testPostWhenCreationFailure() throws IOException {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setContent(pdf.getPdfXml().getBytes());
    String transactionId = "1";
    pdf.setTransactionId(transactionId);

    final RuntimeException exception = new RuntimeException("DB connection failure");
    String expectedResponse = WebHelper.getInstance().buildErrorResponse(exception, mockResponse);

    PdfService pdfService = new PdfServiceImpl() {
      @Override
      public Pdf create(String pdfXml) {
        throw exception;
      }
    };

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.post(mockRequest, mockResponse);
      fail("Must throw PdfException");
    } catch (Exception e) {//then
      assertThat(e, instanceOf(RuntimeException.class));
    }

  }

  @Test
  public void testGetByCompanyNamePostCodeWhenMatchFound() throws PdfException {
    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);
    String companyName = "Test company";
    String postCode = "postcode";
    String matches = "<matched><pdf/></matches>";
    expect(pdfService.readByCompanyNameAndPostCode(companyName, postCode)).andReturn(matches);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    ModelAndView modelAndView = pdfController.getByCompanyNamePostCode(companyName, postCode, mockResponse);
    String responseXml = (String) modelAndView.getModel().get(Constants.WEB_XML_RESPONSE);

    // then
    assertThat(responseXml, is(matches));

  }

  @Test
  public void testGetByCompanyNamePostCodeWhenMatchNotFound() throws PdfException {
    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);
    String companyName = "Test company";
    String postCode = "postcode";
    PdfException pdfException = mockBuilder.getMockPdfException();
    pdfException.setHttpErrorCode("404");

    String expected = WebHelper.getInstance().buildErrorResponse(pdfException, mockResponse);

    expect(pdfService.readByCompanyNameAndPostCode(companyName, postCode)).andThrow(pdfException);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.getByCompanyNamePostCode(companyName, postCode, mockResponse);
      fail("Must throw PdfException");
    } catch (Exception e) {//then
      assertThat(e, instanceOf(PdfException.class));
    }

  }

  @Test
  public void testPutWhenUpdateSuccessful() throws IOException {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setContent(pdf.getPdfXml().getBytes());

    String transactionId = "1";
    String expectedResponse = WebHelper.getInstance().buildSuccessResponse(transactionId, Constants.MESSAGE_BRANCH_UPDATED);
    pdf.setTransactionId(transactionId);

    PdfService pdfService = createMock(PdfService.class);
    expect(pdfService.update(pdf.getPdfId(), pdf.getPdfXml())).andReturn(pdf);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    ModelAndView modelAndView = pdfController.put(pdf.getPdfId(), mockRequest, mockResponse);
    String responseXml = (String) modelAndView.getModel().get(Constants.WEB_XML_RESPONSE);

    // then
    assertThat(expectedResponse, is(responseXml));
    assertThat(mockResponse.getStatus() + "", is("200"));
  }

  @Test
  public void testPutWhenUpdateFailed() throws IOException {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setContent(pdf.getPdfXml().getBytes());
    String transactionId = "1";
    pdf.setTransactionId(transactionId);

    final PdfException pdfException = mockBuilder.getMockPdfException();
    pdfException.setHttpErrorCode("404");
    String expectedResponse = WebHelper.getInstance().buildErrorResponse(pdfException, mockResponse);

    PdfService pdfService = new PdfServiceImpl() {
      @Override
      public Pdf update(String pdfId, String pdfXml) throws PdfException {
        throw pdfException;
      }
    };

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.put(pdf.getPdfId(), mockRequest, mockResponse);
      fail("Must throw PdfException");
    } catch (Exception e) {//then
      assertThat(e, instanceOf(PdfException.class));
    }
  }

  @Test
  public void testDeleteWhenPdfFound() throws PdfException {
    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    Pdf pdf = mockBuilder.getMockPdf();
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);
    expect(pdfService.delete(pdfId)).andReturn(pdf);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    ModelAndView modelAndView = pdfController.delete(pdfId, mockResponse);
    String responseXml = (String) modelAndView.getModel().get(Constants.WEB_XML_RESPONSE);

    // then
    assertThat(responseXml, is(notNullValue()));
  }

  @Test
  public void testDeleteWhenPdfNotFound() throws PdfException {

    // given
    PdfBoxPdf2ImageController pdfController = new PdfBoxPdf2ImageController();
    MockHttpServletRequest mockRequest = new MockHttpServletRequest();
    MockHttpServletResponse mockResponse = new MockHttpServletResponse();
    String pdfId = "1";
    mockRequest.setParameter("pdfId", pdfId);

    PdfService pdfService = createMock(PdfService.class);

    PdfException pdfException = mockBuilder.getMockPdfException();
    pdfException.setHttpErrorCode("404");
    String expected = WebHelper.getInstance().buildErrorResponse(pdfException, mockResponse);

    expect(pdfService.delete(pdfId)).andThrow(pdfException);
    replay(pdfService);

    pdfController.setPdfService(pdfService);

    // when
    try {
      pdfController.delete(pdfId, mockResponse);
      fail("Must throw PdfException");
    } catch (Exception e) {//then
      assertThat(e, instanceOf(PdfException.class));
    }

  }
}
