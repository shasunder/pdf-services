/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.io.IOException;

import org.apache.commons.httpclient.HttpClient;
import org.apache.commons.httpclient.HttpException;
import org.apache.commons.httpclient.methods.DeleteMethod;
import org.apache.commons.httpclient.methods.GetMethod;
import org.apache.commons.httpclient.methods.PostMethod;
import org.apache.commons.httpclient.methods.PutMethod;
import org.apache.commons.httpclient.methods.RequestEntity;
import org.apache.commons.httpclient.methods.StringRequestEntity;
import org.apache.commons.io.IOUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.junit.Ignore;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.*;

import com.ipad.DefaultMockBuilder;
import com.ipad.dao.DAOTestHelper;


@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfControllerHTTPClientIntegrationTest {

  private static Log logger = LogFactory.getLog(PdfControllerHTTPClientIntegrationTest.class);

  public static final String HOST_NAME = "spark";

  public static final String PORT = "18081";

  @Autowired
  DAOTestHelper testHelper;
  
  @Test
  public void testGetByIdWhenPdfFound() throws Exception {
    // given
    // a pdf with id 1 exists in the database.
    String pdfId="1";
    
    HttpClient client = new HttpClient();
    // ensure a pdf with id 1 exists in the database.
    getExistingPdfAndCreateIfNoneFound(pdfId, client);
    GetMethod method = new GetMethod(getHost() + "/pdf-service/pdfid/1");
    // when
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());

    // then
    assertThat(method.getStatusCode(), is(200));
    logger.info(response);
    
    //cleanup
    testHelper.deletePdf(pdfId);

  }

  @Test
  public void testGetByIdWhenPdfNotFound() throws Exception {
    // given
    // a pdf with id 999999999 does not exist in the database.
    HttpClient client = new HttpClient();
    GetMethod method = new GetMethod(getHost() + "/pdf-service/pdfid/999999999");
    // when
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());

    // then
    assertThat(method.getStatusCode(), is(404));
    logger.info(response);

  }

  /**
   * Not implemented for this sprint.Ignoring hence!
   */
  @Ignore
  public void testGetByCompanyNameAndPostCode() throws Exception {
    HttpClient client = new HttpClient();
    GetMethod method = new GetMethod(getHost() + "/pdf-service/companyname/ipad/RG1");
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());

    logger.info(response);

  }

  @Test
  public void testPost() throws Exception {
    // given
    // a pdf with random id does not exist in the database.
    HttpClient client = new HttpClient();
    PostMethod method = new PostMethod(getHost() + "/pdf-service/");
    Pdf mockPdf = DefaultMockBuilder.getInstance().getMockPdfRandom();
    RequestEntity requestEntity = new StringRequestEntity(mockPdf.getPdfXml());
    method.setRequestEntity(requestEntity);
    // when
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());

    // then
    assertThat(method.getStatusCode(), is(201));
    logger.info(response);
    
    //cleanup
    testHelper.deletePdf(mockPdf.getPdfId());

  }

  @Test
  public void testPut() throws Exception {
    // given
    // a pdf with id 1 exists in the database.
    String pdfId="1";
    HttpClient client = new HttpClient();
    String pdfXml = getExistingPdfAndCreateIfNoneFound(pdfId, client);

    PutMethod method = new PutMethod(getHost() + "/pdf-service/1");
    RequestEntity requestEntity = new StringRequestEntity(pdfXml);
    method.setRequestEntity(requestEntity);

    // when
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());

    // then
    assertThat(method.getStatusCode(), is(200));
    logger.info(response);
    
    //cleanup
    testHelper.deletePdf(pdfId);

  }


  @Test
  public void testDeleteWhenPdfFound() throws Exception {
    // given
    String pdfId="1";
    HttpClient client = new HttpClient();
    // ensure a pdf with id 1 exists in the database.
    String pdfXml = getExistingPdfAndCreateIfNoneFound(pdfId, client);
    DeleteMethod method = new DeleteMethod(getHost() + "/pdf-service/"+pdfId);
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());
    
    // then
    assertThat(method.getStatusCode(), is(200));
    
    logger.info(response);

  }
  
  @Test
  public void testDeleteWhenPdfNotFound() throws Exception {
    // given
    String pdfId="99999999";
    HttpClient client = new HttpClient();
    DeleteMethod method = new DeleteMethod(getHost() + "/pdf-service/"+pdfId);
    client.executeMethod(method);
    String response = IOUtils.toString(method.getResponseBodyAsStream());
    
    // then
    assertThat(method.getStatusCode(), is(400));
    
    logger.info(response);

  }


  private String getExistingPdfAndCreateIfNoneFound(String pdfId, HttpClient client) throws IOException, HttpException {
    GetMethod readMethod = new GetMethod(getHost() + "/pdf-service/pdfid/"+pdfId);
    client.executeMethod(readMethod);
    String pdfXml = IOUtils.toString(readMethod.getResponseBodyAsStream());
    //create pdf with id 1 if not found.
    if(pdfXml==null || readMethod.getStatusCode()!=200){
      testHelper.createPdf(pdfId);
      client.executeMethod(readMethod);
      pdfXml = IOUtils.toString(readMethod.getResponseBodyAsStream());
    }
    return pdfXml;
  }
  
  private String getHost() {
    return "http://" + HOST_NAME + ":" + PORT;
  }

}
