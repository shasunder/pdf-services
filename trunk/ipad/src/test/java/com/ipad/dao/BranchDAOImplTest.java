/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao;

import org.junit.Ignore;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

import com.ipad.DefaultMockBuilder;
import com.ipad.common.PdfException;


import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfDAOImplTest {

  @Autowired
  private PdfDAO pdfDAO;

  @Autowired
  DAOTestHelper daoHelper;

  DefaultMockBuilder defaultMockBuilder = DefaultMockBuilder.getInstance();

  @Test
  public void testCreateWhenSuccess() throws Exception {
    // given
    Pdf pdf = new Pdf();
    String pdfXml = defaultMockBuilder.getMockPdfXmlRandom();
    pdf.setPdfXml(pdfXml);
    // when
    pdfDAO.create(pdf);
    // then
    assertThat(pdf.getPdfId(), is(notNullValue()));

    // cleanup
    daoHelper.deletePdf(pdf.getPdfId());
  }

  @Test
  public void testCreateWhenPdfCreationFailure() throws Exception {
    Pdf pdf = new Pdf();
    String pdfXml = "bad xml <?xml ";
    pdf.setPdfXml(pdfXml);
    try {
      pdfDAO.create(pdf);
      fail("pdf creation exception should be thrown");
    } catch (Exception e) {
      // should throw
      assertThat(e, instanceOf(PdfException.class));
    }
  }

  @Test
  public void testDeleteWhenPdfExists() {
    // given
    Pdf pdfCreated = daoHelper.createPdfObj();
    String pdfId=pdfCreated.getPdfId();
    // when
    pdfDAO.delete(pdfCreated);
    // then
    try{
      pdfDAO.readById(pdfId);
      fail("Must throw exception");
    }catch(PdfException be){
      // expected as pdf is deleted
    }
  }

  @Test
  public void testDeleteWhenPdfDoesNotExist() {
    // given
    String pdfId="999999999999";
    Pdf pdf=new Pdf();
    pdf.setPdfId(pdfId);
    // when
    try{
    pdfDAO.delete(pdf);
    // then
     fail("Must throw exception");
    }catch(PdfException be){
      // expected
    }
  }
  
  @Test
  public void testReadByIdWhenPdfReadSuccess() throws Exception {
    // given
    Pdf pdfCreated = daoHelper.createPdfObj();

    // when
    Pdf pdf = pdfDAO.readById(pdfCreated.getPdfId());

    // then
    assertThat(pdf, is(notNullValue()));
    //Note: Oracle is replacing \r\n with \n. 
    //assertThat(pdf.getPdfXml().replaceAll("\r\n", "\n"), is(pdfCreated.getPdfXml()));

    // cleanup
    daoHelper.deletePdf(pdfCreated.getPdfId());
  }

  @Test
  public void testReadByIdWhenPdfReadFailure() throws Exception {
    String pdfId = "-1";
    try {
      Pdf result = pdfDAO.readById(pdfId);
      fail("pdf exception should be thrown on read failure");
    } catch (Exception e) {
      // should throw
      assertThat(e, instanceOf(PdfException.class));
    }
  }
  
  @Test
  public void testReadByIdWhenConnectionFailure() throws Exception {
    String pdfId = "-1";
    try {
      
      Pdf result = pdfDAO.readById(pdfId);
      fail("pdf exception should be thrown on read failure");
    } catch (Exception e) {
      // should throw
      assertThat(e, instanceOf(PdfException.class));
    }
  }

  @Ignore
  public void testReadByCompanyPostCodeWhenSuccess() throws Exception {
    // given
    String company = "ipad";
    String postCode = "RG1";
    // when
    String matches = pdfDAO.readByCompanyNameAndPostCode(company, postCode);
    //TODO: This feature is ignored for current sprint.
  }

  @Test
  public void testReadByCompanyPostCodeWhenReadFailure() throws Exception {
    // given
    String company = "ipad";
    String postCode = "RG1";
    // when
    try {
      String matches = pdfDAO.readByCompanyNameAndPostCode(company, postCode);
      fail("pdf exception should be thrown on read failure");
    } catch (Exception e) {
      // should throw
      assertThat(e, instanceOf(PdfException.class));
    }
  }

  @Test
  public void testUpdateWhenSuccess() throws Exception {
    // given
    Pdf pdfCreated = daoHelper.createPdfObj();
    Pdf pdf = new Pdf();
    String pdfXml = pdfCreated.getPdfXml();
    pdf.setPdfXml(pdfXml);
    pdf.setPdfId(pdfCreated.getPdfId());
    // when
    pdfDAO.update(pdf);
    // then
    assertThat(pdf.getPdfId(), is(notNullValue()));

    // cleanup
    daoHelper.deletePdf(pdfCreated.getPdfId());
  }

  @Test
  public void testUpdateWhenPdfCreationFailure() throws Exception {
    Pdf pdfCreated = daoHelper.createPdfObj();
    Pdf pdf = new Pdf();
    pdf.setPdfId(pdfCreated.getPdfId());
    String pdfXml = "bad xml <?xml ";
    pdf.setPdfXml(pdfXml);
    try {
      pdfDAO.update(pdf);
      fail("pdf update exception should be thrown");
    } catch (Exception e) {
      // should throw
      assertThat(e, instanceOf(PdfException.class));
    }
    
    // cleanup
    daoHelper.deletePdf(pdfCreated.getPdfId());
  }

}
